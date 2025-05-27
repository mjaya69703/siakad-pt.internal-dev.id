<?php

namespace App\Http\Controllers\Private\User\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Kepegawaian\Absensi;
use Alert;

class AbsensiController extends Controller
{
    public function renderAbsensi()
    {
        $user = Auth::user();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Daftar";
        $data['pages'] = "Absensi";
        $data['academy'] = "Siakad PT by Esec Academy";
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

            if ($existingAbsensi) {
                Alert::error('Error', 'Anda sudah melakukan absensi untuk tanggal ini');
                return redirect()->back()->withInput();
            }

            // Validate the request
            $validator = Validator::make($request->all(), [
                'type' => 'required|integer|in:0,1,2,3,4,5,6,7',
                'date' => 'required|date',
                'time_in' => 'required|date_format:H:i',
                'photo_in' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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
            $data['status'] = 0; // Auto Approve
            $data['created_by'] = $user->id;

            // Handle photo upload
            if ($request->hasFile('photo_in')) {
                // Simpan foto absensi masuk
                $photoName = 'absensi_in_' . $user->id . '-' . time() . '-' . uniqid() . '.' . $request->photo_in->getClientOriginalExtension();
                $request->photo_in->storeAs('images/absensi', $photoName, 'public');
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
                'photo_out' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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

                // Save new photo
                $photoName = 'absensi_out_' . $userCode . '_' . uniqid() . '.' . $request->photo_out->getClientOriginalExtension();
                $request->photo_out->storeAs('images/absensi', $photoName, 'public');
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
