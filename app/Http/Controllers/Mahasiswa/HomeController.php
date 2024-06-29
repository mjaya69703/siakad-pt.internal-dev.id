<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Auth;
use Hash;
use Str;
use PDF;
// SECTION ADDONS EXTERNAL
use Alert;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// SECTION MODELS
use App\Models\ProgramStudi;
use App\Models\MataKuliah;
use App\Models\Kurikulum;
use App\Models\Dosen;
use App\Models\TahunAkademik;
use App\Models\JadwalKuliah;
use App\Models\TagihanKuliah;
use App\Models\HistoryTagihan;
use App\Models\Ruang;
use App\Models\Kelas;
use App\Models\Balance;
use App\Models\AbsensiMahasiswa;
use App\Models\Notification;
use App\Models\Settings\webSettings;
use App\Models\FeedBack\FBPerkuliahan;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('mahasiswa')->user();
        $data['web'] = webSettings::where('id', 1)->first();
        $data['tagihan'] = TagihanKuliah::where('users_id', $user->id)->orwhere('proku_id', $user->kelas->proku->id)->orwhere('prodi_id', $user->kelas->pstudi->id)->sum('price');
        $data['history'] = HistoryTagihan::where('users_id', $user->id)->where('stat', 1)->whereHas('tagihan', function ($query) use ($request){
            $query->select('price');
        })->with('tagihan')->get()->sum(function ($history) {
            return $history->tagihan->price;
        });
        $data['sisatagihan'] = $data['tagihan'] - $data['history'];
        $data['jadkul'] = JadwalKuliah::where('kelas_id', $user->class_id)->count();
        $data['habsen'] = AbsensiMahasiswa::where('author_id', $user->id)->where('absen_type', 'H')->count();
        $data['notify'] = Notification::whereIn('send_to', [0, 3])->latest()->paginate(5);

        // dd($data['notif']);
        // dd($data['history']);


        return view('mahasiswa.home-index', $data);

    }
    public function profile(){

        $data['web'] = webSettings::where('id', 1)->first();

        return view('mahasiswa.home-profile', $data);

    }

    public function jadkulIndex()
    {
        $data['kuri'] = Kurikulum::all();
        $data['taka'] = TahunAkademik::all();
        // $data['dosen'] = MataKuliah::where('dosen');
        $data['pstudi'] = ProgramStudi::all();
        $data['matkul'] = MataKuliah::all();
        $data['jadkul'] = JadwalKuliah::where('kelas_id', Auth::guard('mahasiswa')->user()->class_id)->get();
        $data['ruang'] = Ruang::all();
        $data['kelas'] = Kelas::all();
        $data['web'] = webSettings::where('id', 1)->first();


        return view('mahasiswa.pages.mhs-jadkul-index', $data);
    }
    public function jadkulAbsen($code)
    {
        $date = \Carbon\Carbon::now()->format('Y-m-d');
        $checkAbsen = AbsensiMahasiswa::where('jadkul_code', $code)->where('author_id', Auth::guard('mahasiswa')->user()->id)->count();
        $checkDate = JadwalKuliah::where('code', $code)->where('date', $date)->count();

        // dd($timeStart);
        if($checkAbsen === 0){
            if($checkDate !== 0){
                $data['web'] = webSettings::where('id', 1)->first();
                $data['kuri'] = Kurikulum::all();
                $data['taka'] = TahunAkademik::all();
                // $data['dosen'] = MataKuliah::where('dosen');
                $data['pstudi'] = ProgramStudi::all();
                $data['matkul'] = MataKuliah::all();
                $data['jadkul'] = JadwalKuliah::where('code', $code)->first();
                $data['ruang'] = Ruang::all();
                $data['kelas'] = Kelas::all();

                // dd($data['jadkul']);

                return view('mahasiswa.pages.mhs-jadkul-absen', $data);
            } else {

                Alert::error('Error', 'Kamu belum bisa absen pada saat ini.');
                return back();
            }
        } else {
            Alert::error('Error', 'Kamu sudah absen untuk matakuliah ini.');
            return back();
        }
    }

    public function jadkulAbsenStore(Request $request)
    {
        $request->validate([
            'absen_proof' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'absen_type' => 'required|string',
        ]);

        $timeStart = \Carbon\Carbon::now()->format('H:i:s');
        $checkStart = JadwalKuliah::where('code', $request->jadkul_code)->first();


        $absen = new AbsensiMahasiswa;

        if ($request->hasFile('absen_proof')) {
            $image = $request->file('absen_proof');
            $name = 'profile-'. $request->jadkul_code. '-' . $request->absen_date . '-' . $request->author_id .'-' .uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/profile/absen/');
            $destinationPaths = storage_path('app/public/images');

            // Compress image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            // $image->resize(width: 250);
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);

            if ($absen->absen_proof != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$absen->absen_proof); // hapus gambar lama
            }
            $absen->absen_proof = "profile/absen/".$name;
            $absen->author_id = $request->author_id;
            $absen->jadkul_code = $request->jadkul_code;
            $absen->absen_date = $request->absen_date;
            $absen->absen_time = $request->absen_time;
            $absen->absen_type = $request->absen_type;
            $absen->code = uniqid();
            if ($timeStart >= $checkStart->ended) {
                // Jika waktu saat ini sudah melewati waktu selesai perkuliahan
                Alert::error('Error', 'Waktu perkuliahan telah selesai. Anda sudah tidak bisa absen hari ini.');
                return back();
            } elseif ($timeStart >= $checkStart->start) {
                // Jika waktu saat ini sudah sama atau setelah waktu mulai perkuliahan
                $absen->save();
            } else {
                // Jika waktu saat ini masih sebelum waktu mulai perkuliahan
                Alert::error('Error', 'Waktu absen belum dimulai. Silahkan coba kembali nanti.');
                return back();
            }

            Alert::success('Success', 'Kamu telah berhasil absen pada matakuliah ini');
            return redirect()->route('mahasiswa.home-jadkul-index');
        }

    }

    public function saveImageProfile(Request $request)
    {
        $request->validate([
            'mhs_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);

        $user = Auth::guard('mahasiswa')->user();

        if ($request->hasFile('mhs_image')) {
            $image = $request->file('mhs_image');
            $name = 'profile-'. $user->mhs_code.'-' .uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/profile');
            $destinationPaths = storage_path('app/public/images');

            // Compress image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            // $image->resize(width: 250);
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);

            if ($user->mhs_image != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$user->mhs_image); // hapus gambar lama
            }
            $user->mhs_image = "profile/".$name;
            $user->save();

            Alert::success('Success', 'Data berhasil diupdate');
            return redirect()->route('mahasiswa.home-profile');
        }
    }

    public function saveDataProfile(Request $request){

        $request->validate([
            'mhs_name' => 'required|string|max:255',
            'mhs_nim' => 'required|string|max:255|unique:users,user,' . Auth::guard('mahasiswa')->user()->id,
            'mhs_birthplace' => 'required|string|max:255', // New field
            'mhs_birthdate' => 'required|date', // New field
        ]);
        $user = Auth::guard('mahasiswa')->user();

        $user->mhs_name = $request->mhs_name;
        $user->mhs_nim = $request->mhs_nim;
        $user->mhs_reli = $request->mhs_reli;
        $user->mhs_gend = $request->mhs_gend;
        $user->mhs_birthplace = $request->mhs_birthplace; // New field
        $user->mhs_birthdate = $request->mhs_birthdate; // New field


        $user->save();

        Alert::success('Success', 'Data berhasil diupdate');
        return back();
    }

    public function saveDataKontak(Request $request){

        $request->validate([
            'mhs_phone' => 'required|numeric|unique:users,phone,' . Auth::guard('mahasiswa')->user()->id,
            'mhs_mail' => 'required|email|max:255|unique:users,email,' . Auth::guard('mahasiswa')->user()->id,
            'mhs_parent_father' => 'nullable|string|max:255',
            'mhs_parent_mother' => 'nullable|string|max:255',
            'mhs_parent_father_phone' => 'nullable|string|max:14',
            'mhs_parent_mother_phone' => 'nullable|string|max:14',
            'mhs_parent_wali_name' => 'string|max:14',
            'mhs_parent_wali_phone' => 'string|max:14',
            'mhs_addr_domisili' => 'nullable|string|max:4192',
            'mhs_addr_kelurahan' => 'nullable|string|max:255',
            'mhs_addr_kecamatan' => 'nullable|string|max:255',
            'mhs_addr_kota' => 'nullable|string|max:255',
            'mhs_addr_provinsi' => 'nullable|string|max:255',
        ]);
        $user = Auth::guard('mahasiswa')->user();

        $user->mhs_phone = $request->mhs_phone;
        $user->mhs_mail = $request->mhs_mail;
        $user->mhs_parent_father = $request->mhs_parent_father;
        $user->mhs_parent_father_phone = $request->mhs_parent_father_phone;
        $user->mhs_parent_mother = $request->mhs_parent_mother;
        $user->mhs_parent_mother_phone = $request->mhs_parent_mother_phone;
        $user->mhs_wali_name = $request->mhs_wali_name;
        $user->mhs_wali_phone = $request->mhs_wali_phone;
        $user->mhs_addr_domisili = $request->mhs_addr_domisili;
        $user->mhs_addr_kelurahan = $request->mhs_addr_kelurahan;
        $user->mhs_addr_kecamatan = $request->mhs_addr_kecamatan;
        $user->mhs_addr_kota = $request->mhs_addr_kota;
        $user->mhs_addr_provinsi = $request->mhs_addr_provinsi;


        $user->save();

        Alert::success('Success', 'Data berhasil diupdate');
        return back();
    }

    public function saveDataPassword(Request $request)
    {
        // Validate the request...
        $request->validate([
            'old_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'same:new_password_confirmed'],
        ]);

        $user = Auth::guard('mahasiswa')->user();

        // Check if the old password is correct
        if (!Hash::check($request->old_password, $user->password)) {
            Alert::error('Error', 'Password lama yang diberikan tidak cocok dengan catatan kami.');
            return back();
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        Alert::success('Success', 'Password berhasil diubah!');
        return back();
    }

    public function tagihanIndexAjax()
    {
        $user = Auth::guard('mahasiswa')->user();

        $data['tagihan'] = TagihanKuliah::where('users_id', $user->id)->orwhere('proku_id', $user->kelas->proku->id)->orwhere('prodi_id', $user->kelas->pstudi->id)->latest()->get();
        $data['history'] = HistoryTagihan::where('users_id', Auth::guard('mahasiswa')->user()->id)->where('stat', 1)->latest()->get();

        return response()->json($data);

    }

    public function tagihanIndex()
    {
        $user = Auth::guard('mahasiswa')->user();
        // Mencari tagihan berdasarkan `users_id`
        $data['web'] = webSettings::where('id', 1)->first();
        $data['tagihan'] = TagihanKuliah::where('users_id', $user->id)->orwhere('proku_id', $user->kelas->proku->id)->orwhere('prodi_id', $user->kelas->pstudi->id)->latest()->get();
        $data['history'] = HistoryTagihan::where('users_id', Auth::guard('mahasiswa')->user()->id)->where('stat', 1)->latest()->get();


        return view('mahasiswa.pages.mhs-tagihan-index', $data);

    }
    public function tagihanView($code)
    {
        // Mencari tagihan berdasarkan `users_id`
        $user = Auth::guard('mahasiswa')->user();
        $data['web'] = webSettings::where('id', 1)->first();
        $checkData = HistoryTagihan::where('tagihan_code', $code)->where('users_id', $user->id)->where('stat', 1)->first();
        if($checkData !== null){

            Alert::error('error', 'Kamu sudah membayar tagihan ini');
            return back();
        } else {
            $data['tagihan'] = TagihanKuliah::where('code', $code)->first();

            return view('mahasiswa.pages.mhs-tagihan-view', $data);

        }
    }

    public function tagihanPayment(Request $request, $code){
        $tagihan = TagihanKuliah::where('code', $code)->first();

        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');

        DB::transaction(function() use($request) {
            $donation = \App\Models\HistoryTagihan::create([
                'users_id'      => Auth::guard('mahasiswa')->user()->id,
                'tagihan_code'  => $request->code,
                'code'          => Str::random(9),
                'desc'          => $request->note,
            ]);

            $payload = [
                'transaction_details' => [
                    'order_id'     => $donation->code,
                    'gross_amount' => $request->amount,
                ],
                'customer_details' => [
                    'first_name' => $request->name,
                    'email'      => $request->email,
                ],
                'item_details' => [
                    [
                        'id'            => $request->code,
                        'price'         => $request->amount,
                        'quantity'      => 1,
                        'name'          => $request->note,
                        'brand'         => 'Tagihan Kuliah',
                        'category'      => 'Tagihan Kuliah',
                        'merchant_name' => config('app.name'),
                    ],
                ],
            ];
            // dd($payload);

            $snapToken = \Midtrans\Snap::getSnapToken($payload);
            $donation->snap_token = $snapToken;
            $donation->save();

            $this->response['code_uniq'] = $donation->code;
            $this->response['snap_token'] = $snapToken;
        });

        return response()->json([
            'status'     => 'success',
            'snap_token' => $this->response['snap_token'],
            'code_uniq' => $this->response['code_uniq'],
        ]);
    }

    public function tagihanSuccess(Request $request, $code){
        $tagihan = HistoryTagihan::where('code', $code)->first();
        $tagihan->stat = 1;
        $tagihan->save();

        $balance = new Balance;
        $balance->value = $tagihan->tagihan->price;
        $balance->type = 1;
        $balance->desc = 'Reff pembayaran mahasiswa #' . $code;
        $balance->code = uniqid();
        // $balance->author_id = Auth::user()->id;

        $balance->save();

        Alert::success('Success', 'Tagihan telah dibayar');
        return redirect()->route('mahasiswa.home-tagihan-index');


    }

    public function tagihanInvoice(Request $request, $code){
        $data['history'] = HistoryTagihan::where('code', $code)->first();

        // Load view into a variable

        // return view('mahasiswa.pages.mhs-tagihan-invoice', $data);
        $view = view('mahasiswa.pages.mhs-tagihan-invoice', $data);

        // Load the HTML content of the view
        $html = $view->render();

        // Load HTML content into DOMPDF
        $pdf = PDF::loadHtml($html)->setPaper('a4');

        // Save the PDF file to storage
        $pdf->save(storage_path('app/public/invoices/Invoice-Pembayaran-'.$data['history']->tagihan->name.'-'.$data['history']->tagihan_code.'.pdf'));

        // Or you can return the PDF to be downloaded
        return $pdf->download('Invoice-Pembayaran-'.$data['history']->tagihan->name.'-'.$data['history']->tagihan_code.'.pdf');
    }

    public function storeFBPerkuliahan(Request $request, $code)
    {
        $user = Auth::guard('mahasiswa')->user();

        $checkData = FBPerkuliahan::where('fb_jakul_code', $code)->where('fb_users_code', $user->mhs_code)->first();

        $request->validate([
            'fb_score' => 'required|in:Tidak Puas,Cukup Puas,Sangat Puas',
            'fb_reason' => 'required'
        ],[
            'fb_score.required' => 'Skor feedback harus diisi.',
            'fb_score.in' => 'Skor feedback harus salah satu dari: Tidak Puas, Cukup Puas, Sangat Puas.',
            'fb_reason.required' => 'Alasan feedback harus diisi.',
        ]);

        if($checkData !== null) {
            Alert::error('Error', 'Kamu sudah memberikan FeedBack pada perkuliahan ini.');
            return back();
        } else {
            $fb = new FBPerkuliahan;

            $fb->fb_users_code = $user->mhs_code;
            $fb->fb_jakul_code = $code;
            $fb->fb_code = uniqid(8);
            $fb->fb_score = $request->fb_score;
            $fb->fb_reason = $request->fb_reason;

            $fb->save();

            Alert::success('Sukses', 'Terima kasih telah memberi FeedBack ^_^');
            return back();


        }

    }
}
