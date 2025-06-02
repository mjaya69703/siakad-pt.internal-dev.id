<?php

namespace App\Http\Controllers\Private\User\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// USE SYSTEM
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// USE MODELS
use App\Models\Kepegawaian\Absensi;
use App\Models\Pengaturan\WebSetting;
// USE PLUGINS
use Alert;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AbsensiController extends Controller
{
    public function renderAbsensi()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Daftar";
        $data['pages'] = "Absensi";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['absensi'] = Absensi::where('user_id', $user->id)->latest()->get();
        
        return view('central.backpage.absen-index', $data, compact('user'));
    }

    public function handleAbsensi(Request $request)
    {
        try {
            // Check if user already has absensi for today
            $existingAbsensi = Absensi::where('user_id', Auth::id())
                ->whereDate('date', $request->date)
                ->first();

            // Allow multiple attendance only for overtime (type 1)
            if ($existingAbsensi && $request->type != 1) {
                Alert::error('Error', 'Anda sudah melakukan absensi untuk tanggal ini');
                return redirect()->back()->withInput();
            }

            // Validate the request
            $validator = Validator::make($request->all(), [
                'type' => 'required|integer|in:0,1,2,3,4,5,6,7',
                'date' => 'required|date',
                'time_in' => 'required|date_format:H:i',
                'photo_in' => 'required|image|mimes:jpeg,png,jpg|max:8192',
                'desc' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = Auth::user();
            $data = $validator->validated();

            // Generate unique code for absensi
            $data['code'] = 'ABS-' . date('Ymd') . '-' . $user->code . '-' . uniqid();
            $data['user_id'] = $user->id;
            
            // Set status based on type
            // Only Cuti Tahunan (7) and Pulang Awal (5) need approval
            $typesNeedingApproval = [1, 5, 7];
            $data['status'] = in_array($data['type'], $typesNeedingApproval) ? 1 : 0; // 1 = Pending, 0 = Auto Approve
            
            $data['created_by'] = $user->id;

            // Handle photo upload
            if ($request->hasFile('photo_in')) {
                // Kompres dan simpan foto absensi masuk
                $photoName = 'absensi_in_' . $user->id . '-' . time() . '-' . uniqid() . '.jpg';
                
                // Buat instance ImageManager dengan driver GD
                $manager = new ImageManager(new Driver());
                
                // Baca dan kompres gambar
                $image = $manager->read($request->photo_in->getRealPath());
                $image->scaleDown(height: 800);
                
                // Simpan ke storage
                Storage::disk('public')->put('images/absensi/' . $photoName, $image->toJpeg(80));
                
                $data['photo_in'] = $photoName;
            }

            // Create absensi record
            $absensi = Absensi::create($data);

            Alert::success('Success', 'Absensi masuk berhasil disimpan');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menyimpan absensi: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function updateAbsensi(Request $request, $code)
    {
        try {
            $absensi = Absensi::where('code', $code)->firstOrFail();
            
            // Check if already checked out
            if ($absensi->time_out) {
                Alert::error('Error', 'Absensi ini sudah melakukan check-out');
                return redirect()->back();
            }

            // Validate the request
            $validator = Validator::make($request->all(), [
                'time_out' => 'required|date_format:H:i',
                'photo_out' => 'required|image|mimes:jpeg,png,jpg|max:8192',
                'desc' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = $validator->validated();
            $data['updated_by'] = Auth::id();

            // Handle photo upload if new photo is provided
            if ($request->hasFile('photo_out')) {
                // Delete old photo if exists
                if ($absensi->photo_out) {
                    Storage::disk('public')->delete('images/absensi/' . $absensi->photo_out);
                }

                // Get user code from the absensi record
                $userCode = $absensi->user_id . '-' . time();

                // Kompres dan simpan foto absensi pulang
                $photoName = 'absensi_out_' . $userCode . '_' . uniqid() . '.jpg';
                
                // Buat instance ImageManager dengan driver GD
                $manager = new ImageManager(new Driver());
                
                // Baca dan kompres gambar
                $image = $manager->read($request->photo_out->getRealPath());
                $image->scaleDown(height: 800); // Scale down jika tinggi lebih dari 800px
                
                // Simpan ke storage
                Storage::disk('public')->put('images/absensi/' . $photoName, $image->toJpeg(80));
                
                $data['photo_out'] = $photoName;
            }

            // Update absensi record
            $absensi->update($data);

            Alert::success('Success', 'Absensi pulang berhasil diperbarui');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal memperbarui absensi: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
