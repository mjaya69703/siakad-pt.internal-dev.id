<?php

namespace App\Traits;

use App\Models\Pengaturan\LogAktivitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use App\Models\Pengaturan\ActivityLogChange;
use App\Jobs\ProcessActivityLog;

trait HasLogAktivitas
{
    protected static function bootHasLogAktivitas()
    {
        static::created(function ($model) {
            static::logAktivitas($model, 'create');
        });

        static::updated(function ($model) {
            static::logAktivitas($model, 'update');
        });

        static::deleted(function ($model) {
            static::logAktivitas($model, 'delete');
        });
    }

    protected static function getClientIp()
    {
        $ip = null;
        
        if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_X_REAL_IP'])) {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    protected static function logAktivitas($model, $action)
    {
        $authenticatedUser = null;
        $authenticatedUserId = null;
        $authenticatedUserType = 'guest';

        $guardsToCheck = ['mahasiswa', 'dosen', 'web'];

        foreach ($guardsToCheck as $guardName) {
            if (Auth::guard($guardName)->check()) {
                $authenticatedUser = Auth::guard($guardName)->user();
                $authenticatedUserId = $authenticatedUser->id ?? null;
                $authenticatedUserType = $guardName;
                if ($authenticatedUserType === 'web') {
                    $authenticatedUserType = 'user';
                }
                break;
            }
        }

        if ($authenticatedUser === null) {
            return;
        }

        $changesToLog = [];

        if ($action === 'update') {
            $dirty = $model->getDirty();
            $original = $model->getOriginal();
            
            $attributesToLog = [];
            if ($model->getGuarded() === []) {
                $attributesToLog = $dirty;
            } else {
                $fillable = $model->getFillable();
                 foreach ($dirty as $key => $value) {
                     if (in_array($key, $fillable)) {
                           $attributesToLog[$key] = $value;
                     }
                 }
            }
            
            Log::info('HasLogAktivitas: Processing Update Changes', [
                'model' => get_class($model),
                'id' => $model->id ?? 'N/A',
                'dirty_keys' => array_keys($dirty),
                'attributes_to_log_count' => count($attributesToLog)
            ]);

            foreach ($attributesToLog as $key => $newValue) {
                $oldValue = $original[$key] ?? null;

                // Log details of each attribute change being processed
                Log::info('HasLogAktivitas: Processing Attribute Change', [
                    'model' => get_class($model),
                    'id' => $model->id ?? 'N/A',
                    'field' => $key,
                    'old_value_type' => gettype($oldValue),
                    'old_value_size' => is_string($oldValue) ? strlen($oldValue) : null,
                    'new_value_type' => gettype($newValue),
                    'new_value_size' => is_string($newValue) ? strlen($newValue) : null,
                ]);

                if ($oldValue != $newValue) {
                     $changesToLog[] = [
                        'field_name' => $key,
                        'old_value' => is_array($oldValue) ? json_encode($oldValue) : $oldValue,
                        'new_value' => is_array($newValue) ? json_encode($newValue) : $newValue,
                     ];
                }
            }

        } elseif ($action === 'create') {
             $attributesToLog = [];
             if ($model->getGuarded() === []) {
                  $attributesToLog = $model->getAttributes();
             } else {
                 $attributesToLog = array_intersect_key(
                     $model->getAttributes(),
                     array_flip($model->getFillable())
                 );
             }
             
              foreach ($attributesToLog as $key => $newValue) {
                  if (!in_array($key, [$model->getCreatedAtColumn(), $model->getUpdatedAtColumn(), $model->getDeletedAtColumn(), 'created_by', 'updated_by', 'deleted_by'])) {
                      $changesToLog[] = [
                         'field_name' => $key,
                         'old_value' => null,
                         'new_value' => is_array($newValue) ? json_encode($newValue) : $newValue,
                      ];
                  }
              }

        } elseif ($action === 'delete') {
             $attributesToLog = [];
              if ($model->getGuarded() === []) {
                  $attributesToLog = $model->getOriginal();
              } else {
                 $attributesToLog = array_intersect_key(
                     $model->getOriginal(),
                     array_flip($model->getFillable())
                 );
             }

             foreach ($attributesToLog as $key => $oldValue) {
                  if (!in_array($key, [$model->getCreatedAtColumn(), $model->getUpdatedAtColumn(), $model->getDeletedAtColumn(), 'created_by', 'updated_by', 'deleted_by'])) {
                       $changesToLog[] = [
                          'field_name' => $key,
                          'old_value' => is_array($oldValue) ? json_encode($oldValue) : $oldValue,
                          'new_value' => null,
                       ];
                   }
               }
        }

        if (!empty($changesToLog)) {
            ProcessActivityLog::dispatch(
                $authenticatedUserId,
                $authenticatedUserType,
                $action,
                get_class($model),
                $model->id,
                $changesToLog,
                static::getClientIp(),
                Request::userAgent(),
                static::getLogDescription($model, $action)
            );
        }
    }

    protected static function getLogDescription($model, $action)
    {
        $modelName = class_basename($model);
        $descriptions = [
            'create' => "Membuat data {$modelName} baru",
            'update' => "Mengubah data {$modelName}",
            'delete' => "Menghapus data {$modelName}"
        ];

        return $descriptions[$action] ?? '';
    }

    public function activityLogs()
    {
        return $this->morphMany(LogAktivitas::class, 'model', 'model_type', 'model_id');
    }

    public function recentActivity($limit = 10)
    {
        return LogAktivitas::where('user_id', $this->id)
            ->select(['id', 'user_id', 'user_type', 'action', 'model_type', 'model_id', 'description', 'created_at'])
            ->with('changesDetails')
            ->latest()
            ->take($limit)
            ->get();
    }
} 