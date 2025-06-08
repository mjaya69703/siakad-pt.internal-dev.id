<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaturan\WebSetting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SetupController extends Controller
{
    public function processSetup(Request $request)
    {
        try {
            // Check if WebSetting already exists
            if (WebSetting::count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sistem sudah dikonfigurasi sebelumnya. Silakan login untuk mengakses sistem.'
                ], 422);
            }

            DB::beginTransaction();

            // Validate request
            $request->validate([
                'webSettings.school_name' => 'required|string|max:255',
                'webSettings.school_head' => 'required|string|max:255',
                'webSettings.school_link' => 'required|url|max:255',
                'webSettings.school_desc' => 'required|string',
                'webSettings.school_email' => 'nullable|email|max:255',
                'webSettings.school_phone' => 'nullable|string|max:20',
                'webSettings.school_address' => 'nullable|string',
                'admin.name' => 'required|string|max:255',
                'admin.username' => 'required|string|max:255|unique:users,username',
                'admin.email' => 'required|email|max:255|unique:users,email',
                'admin.phone' => 'required|string|max:20',
                'admin.password' => 'required|string|min:8|confirmed',
            ]);

            // Create Web Settings
            $webSettings = new WebSetting();
            $webSettings->school_apps = $request->webSettings['school_name'];
            $webSettings->school_name = $request->webSettings['school_name'];
            $webSettings->school_head = $request->webSettings['school_head'];
            $webSettings->school_link = $request->webSettings['school_link'];
            $webSettings->school_desc = $request->webSettings['school_desc'];
            $webSettings->school_email = $request->webSettings['school_email'];
            $webSettings->school_phone = $request->webSettings['school_phone'];
            $webSettings->school_address = $request->webSettings['school_address'];
            $webSettings->save();

            // Create Super Admin
            $admin = new User();
            $admin->name = $request->admin['name'];
            $admin->username = $request->admin['username'];
            $admin->email = $request->admin['email'];
            $admin->phone = $request->admin['phone'];
            $admin->password = Hash::make($request->admin['password']);
            $admin->type = 0; // Super Admin
            $admin->code = uniqid(); // Generate unique code
            $admin->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Setup berhasil diselesaikan. Silakan login untuk mengakses sistem.'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Setup gagal: ' . $e->getMessage()
            ], 500);
        }
    }
} 