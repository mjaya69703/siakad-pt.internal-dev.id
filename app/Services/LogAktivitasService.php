<?php

namespace App\Services;

use App\Models\Pengaturan\LogAktivitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LogAktivitasService
{
    /**
     * Log aktivitas manual
     */
    public static function log($action, $model, $description = null)
    {
        if (!Auth::check()) {
            return;
        }

        $user = Auth::user();
        $changes = [];

        if ($action === 'update') {
            $changes = [
                'old' => array_intersect_key($model->getOriginal(), $model->getDirty()),
                'new' => $model->getDirty()
            ];
        } elseif ($action === 'create') {
            $changes = [
                'new' => $model->getAttributes()
            ];
        } elseif ($action === 'delete') {
            $changes = [
                'old' => $model->getOriginal()
            ];
        }

        if (!empty($changes)) {
            return LogAktivitas::create([
                'user_id' => $user->id,
                'user_type' => $user->type === 0 ? 'user' : ($user->type === 1 ? 'mahasiswa' : 'dosen'),
                'action' => $action,
                'model_type' => get_class($model),
                'model_id' => $model->id,
                'changes' => $changes,
                'ip_address' => Request::ip(),
                'user_agent' => Request::userAgent(),
                'description' => $description
            ]);
        }

        return null;
    }

    /**
     * Log aktivitas custom
     */
    public static function logCustom($description, $data = [])
    {
        if (!Auth::check()) {
            return;
        }

        $user = Auth::user();

        return LogAktivitas::create([
            'user_id' => $user->id,
            'user_type' => $user->type === 0 ? 'user' : ($user->type === 1 ? 'mahasiswa' : 'dosen'),
            'action' => 'custom',
            'model_type' => null,
            'model_id' => null,
            'changes' => $data,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'description' => $description
        ]);
    }

    /**
     * Get logs by user type
     */
    public static function getByUserType($type)
    {
        return LogAktivitas::byUserType($type)->latest()->get();
    }

    /**
     * Get logs by action
     */
    public static function getByAction($action)
    {
        return LogAktivitas::byAction($action)->latest()->get();
    }

    /**
     * Get logs by model
     */
    public static function getByModel($modelType)
    {
        return LogAktivitas::byModel($modelType)->latest()->get();
    }

    /**
     * Get logs by date range
     */
    public static function getByDateRange($startDate, $endDate)
    {
        return LogAktivitas::byDateRange($startDate, $endDate)->latest()->get();
    }
} 