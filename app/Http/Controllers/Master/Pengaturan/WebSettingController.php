<?php

namespace App\Http\Controllers\Master\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// USE SYSTEM
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Env;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
// USE MODELS
use App\Models\Pengaturan\WebSetting;
// USE PLUGINS
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use RealRashid\SweetAlert\Facades\Alert;

class WebSettingController extends Controller
{
    public function renderIndex()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Web Settings";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        
        return view('master.pengaturan.web-setting-index', $data, compact('user'));
    }

    public function handleSettings(Request $request)
    {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                // Identity
                'school_apps' => 'required|string|max:255',
                'school_name' => 'required|string|max:255',
                'school_head' => 'required|string|max:255',
                'school_link' => 'required|url|max:255',
                'school_desc' => 'required|string',
                'school_logo_vert' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'school_logo_hori' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

                // Contact
                'school_email' => 'nullable|email|max:255',
                'school_phone' => 'nullable|string|max:20',
                'school_address' => 'nullable|string',
                'school_longitude' => 'nullable|string|max:20',
                'school_latitude' => 'nullable|string|max:20',

                // Social Media
                'social_fb' => 'nullable|url|max:255',
                'social_ig' => 'nullable|url|max:255',
                'social_in' => 'nullable|url|max:255',
                'social_tw' => 'nullable|url|max:255',

                // System
                'taka_now' => 'nullable|integer',
                'maintenance_mode' => 'nullable|in:0,1',
                'enable_captcha' => 'nullable|in:0,1',
                'max_login_attempts' => 'required|integer|min:1|max:10',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $settings = WebSetting::first();
            $data = $validator->validated();

            // Handle vertical logo upload
            if ($request->hasFile('school_logo_vert')) {
                // Delete old logo if exists
                if ($settings->school_logo_vert && $settings->school_logo_vert !== 'logo-vert.png') {
                    Storage::disk('public')->delete('images/logo/' . $settings->school_logo_vert);
                }
            
                // Compress and save vertical logo
                $logoVertName = 'logo-vert-' . time() . '.jpg';
                
                // Create ImageManager instance with GD driver
                $manager = new ImageManager(new Driver());
                
                // Read and compress image
                $image = $manager->read($request->school_logo_vert->getRealPath());
                
                // Resize if too large
                if ($image->height() > 800) {
                    $image->scaleDown(height: 800); 
                }
                
                // Save with high quality (90%)
                Storage::disk('public')->put('images/logo/' . $logoVertName, $image->toJpeg(90));
                
                $data['school_logo_vert'] = $logoVertName;
            }

            // Handle horizontal logo upload
            if ($request->hasFile('school_logo_hori')) {
                // Delete old logo if exists
                if ($settings->school_logo_hori && $settings->school_logo_hori !== 'logo-hori.png') {
                    Storage::disk('public')->delete('images/logo/' . $settings->school_logo_hori);
                }
            
                // Compress and save horizontal logo
                $logoHoriName = 'logo-hori-' . time() . '.jpg';
                
                // Create ImageManager instance with GD driver
                $manager = new ImageManager(new Driver());
                
                // Read and compress image
                $image = $manager->read($request->school_logo_hori->getRealPath());
                
                // Resize if too large
                if ($image->height() > 800) {
                    $image->scaleDown(height: 800); 
                }
                
                // Save with high quality (90%)
                Storage::disk('public')->put('images/logo/' . $logoHoriName, $image->toJpeg(90));
                
                $data['school_logo_hori'] = $logoHoriName;
            }

            // Handle boolean values
            $data['maintenance_mode'] = $request->has('maintenance_mode') ? true : false;
            
            // Check TURNSTILE configuration before enabling captcha
            $turnstileSiteKey = env('TURNSTILE_SITE_KEY');
            $turnstileSecretKey = env('TURNSTILE_SECRET_KEY');
            
            if ($request->has('enable_captcha')) {
                // Check if keys are empty, default values, or invalid format
                if (empty($turnstileSiteKey) || 
                    empty($turnstileSecretKey) || 
                    $turnstileSiteKey === '2x00000000000000000000AB' || 
                    $turnstileSecretKey === '2x0000000000000000000000000000000AA' ||
                    !preg_match('/^[a-zA-Z0-9_-]{40,}$/', $turnstileSiteKey) ||
                    !preg_match('/^[a-zA-Z0-9_-]{40,}$/', $turnstileSecretKey)) {
                    
                    Alert::error('Error', 'TURNSTILE configuration is not set properly. Please configure valid TURNSTILE_SITE_KEY and TURNSTILE_SECRET_KEY in .env file first.');
                    return redirect()->back()->withInput();
                }
                $data['enable_captcha'] = true;
            } else {
                $data['enable_captcha'] = false;
            }

            $settings->update($data);
            Alert::success('Success', 'Web settings updated successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to update web settings: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function exportDatabase()
    {
        try {
            // Get database configuration
            $host = env('DB_HOST');
            $database = env('DB_DATABASE');
            $username = env('DB_USERNAME');
            $password = env('DB_PASSWORD');

            // Validate database configuration
            if (empty($host) || empty($database) || empty($username)) {
                throw new \Exception('Database configuration is incomplete');
            }

            // Create backup directory if not exists
            $backupPath = storage_path('app/backups');
            if (!File::exists($backupPath)) {
                File::makeDirectory($backupPath, 0755, true);
            }

            // Generate filename with timestamp
            $filename = 'backup-' . date('Y-m-d-H-i-s') . '.sql';
            $filePath = $backupPath . '/' . $filename;

            // Get all tables
            $tables = DB::select('SHOW TABLES');
            $tables = array_map(function($table) {
                return array_values((array) $table)[0];
            }, $tables);

            // Start transaction
            DB::beginTransaction();

            try {
                // Open file for writing
                $handle = fopen($filePath, 'w');

                // Write header
                fwrite($handle, "-- Database Backup\n");
                fwrite($handle, "-- Generated: " . date('Y-m-d H:i:s') . "\n\n");

                // Process each table
                foreach ($tables as $table) {
                    // Get table structure
                    $createTable = DB::select("SHOW CREATE TABLE `$table`")[0];
                    $createTable = array_values((array) $createTable)[1];
                    
                    // Write table structure
                    fwrite($handle, "\n-- Table structure for `$table`\n\n");
                    fwrite($handle, "DROP TABLE IF EXISTS `$table`;\n");
                    fwrite($handle, $createTable . ";\n\n");

                    // Get table data
                    $rows = DB::table($table)->get();
                    
                    if (count($rows) > 0) {
                        fwrite($handle, "-- Data for table `$table`\n\n");
                        
                        foreach ($rows as $row) {
                            $values = array_map(function($value) {
                                if (is_null($value)) return 'NULL';
                                if (is_numeric($value)) return $value;
                                return "'" . addslashes($value) . "'";
                            }, (array) $row);
                            
                            fwrite($handle, "INSERT INTO `$table` VALUES (" . implode(', ', $values) . ");\n");
                        }
                    }
                }

                fclose($handle);
                DB::commit();

                // Check if file was created and has content
                if (!File::exists($filePath) || File::size($filePath) === 0) {
                    throw new \Exception('Backup file was not created or is empty');
                }

                // Return file download response
                return response()->download($filePath, $filename)->deleteFileAfterSend(true);

            } catch (\Exception $e) {
                DB::rollBack();
                if (isset($handle) && is_resource($handle)) {
                    fclose($handle);
                }
                throw $e;
            }

        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to export database: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function importDatabase(Request $request)
    {
        try {
            // More permissive validation
            $request->validate([
                'database_file' => 'required|file|max:10240' // Only check if it's a file and size limit
            ]);

            // Store uploaded file
            $file = $request->file('database_file');
            
            // Debug information
            \Log::info('File details:', [
                'original_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'extension' => $file->getClientOriginalExtension(),
                'size' => $file->getSize()
            ]);

            // Read the SQL file
            $sql = file_get_contents($file->getRealPath());
            
            // Get a fresh database connection
            $connection = DB::connection();
            
            try {
                // Disable foreign key checks
                $connection->statement('SET FOREIGN_KEY_CHECKS=0');
                
                // Process the SQL file
                $queries = [];
                $currentQuery = '';
                
                // Split the file into lines
                $lines = explode("\n", $sql);
                
                foreach ($lines as $line) {
                    // Skip comments and empty lines
                    if (empty(trim($line)) || strpos(trim($line), '--') === 0) {
                        continue;
                    }
                    
                    $currentQuery .= $line;
                    
                    // If the line ends with a semicolon, it's the end of a query
                    if (substr(trim($line), -1) === ';') {
                        $queries[] = $currentQuery;
                        $currentQuery = '';
                    }
                }
                
                // Execute each query
                foreach ($queries as $query) {
                    if (!empty(trim($query))) {
                        try {
                            $connection->unprepared($query);
                        } catch (\Exception $e) {
                            \Log::error('Query failed: ' . $query);
                            \Log::error('Error: ' . $e->getMessage());
                            throw $e;
                        }
                    }
                }
                
                // Re-enable foreign key checks
                $connection->statement('SET FOREIGN_KEY_CHECKS=1');
                
                // Clear cache after import
                Artisan::call('cache:clear');
                Artisan::call('config:clear');
                Artisan::call('view:clear');

                Alert::success('Success', 'Database imported successfully');
                return redirect()->back();
                
            } catch (\Exception $e) {
                // Re-enable foreign key checks in case of error
                $connection->statement('SET FOREIGN_KEY_CHECKS=1');
                throw new \Exception('Failed to import database: ' . $e->getMessage());
            }

        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to import database: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
