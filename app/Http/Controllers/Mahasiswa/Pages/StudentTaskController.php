<?php

namespace App\Http\Controllers\Mahasiswa\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\File;
use Auth;
use Hash;
use Str;
// SECTION ADDONS EXTERNAL
use Alert;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// SECTION MODELS
use App\Models\HasilStudi;
use App\Models\studentTask;
use App\Models\studentScore;
use App\Models\Settings\webSettings;

class StudentTaskController extends Controller
{
    public function index()
    {
        $user = Auth::guard('mahasiswa')->user();
        $data['web'] = webSettings::where('id', 1)->first();
        $data['stask'] = StudentTask::whereHas('jadkul', function($query) use ($user) {
            $query->where('kelas_id', $user->class_id);
        })->get();

        return view('mahasiswa.pages.stask-index', $data);
    }

    public function view($code)
    {

        $data['stask'] = StudentTask::where('code', $code)->first();
        $data['web'] = webSettings::where('id', 1)->first();
        $score = studentScore::where('stask_id', $data['stask']->id)->where('student_id', Auth::guard('mahasiswa')->user()->id)->get();
        if($score->count() == 1){
            Alert::error('Error', 'Kamu sudah mengumpulkan tugas ini.');
            return back();
        } else {
            return view('mahasiswa.pages.stask-view', $data);
        }

    }

    public function store(Request $request, $code)
    {
        $request->validate([
            'desc' => 'required',
            'file_1' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif|max:20480',
            'file_2' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif|max:20480',
            'file_3' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif|max:20480',
            'file_4' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif|max:20480',
            'file_5' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif|max:20480',
            'file_6' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif|max:20480',
            'file_7' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif|max:20480',
            'file_8' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif|max:20480',
        ], [
            'desc.required' => 'Deskripsi Jawaban tugas harus diisi.',
            'file_1.required' => 'File 1 harus diunggah.',
            'file_1.mimes' => 'File 1 harus berupa file dokumen PDF, Word, Excel, atau gambar.',
            'file_1.max' => 'File 1 tidak boleh lebih dari 20 MB.',
            // Add similar messages for other files if needed
        ]);

        $stask = studentTask::where('code', $code)->first();
        $user = Auth::guard('mahasiswa')->user();

        $task = new studentScore;

        for ($i = 1; $i <= 8; $i++) {
            $fileKey = 'file_' . $i;

            if ($request->hasFile($fileKey)) {
                $file = $request->file($fileKey);
                $filename = time() . '-part-' . $i . '.' . $file->getClientOriginalExtension(); // Menggunakan ekstensi file asli
                $path = $file->storeAs('public/uploads/tugas', $filename); // Menyimpan file ke dalam direktori public/uploads/tugas
                $task->{'file_' . $i} = 'tugas/' . $filename; // Menyimpan path relatif dari file ke dalam properti dinamis $task
            }
            // Setelah menangani file, atur nilai-nilai lainnya
            $task->stask_id = $stask->id;  // Pastikan variabel $stask telah didefinisikan sebelumnya
            $task->desc = $request->desc;
            $task->code = Str::of(mt_rand(100000, 999999))->limit(6, '');
            $task->student_id = $user->id;

            // Simpan $task untuk setiap iterasi
            $task->save();
        }

        // $khs = HasilStudi::where('student_id', $user->id)->where('smt_id', $user->taka->raw_semester)->first();
        // // dd($khs->count())

        // if ($khs === null) {
        //     $ckhs = new HasilStudi;
        //     $ckhs->student_id = $user->id;
        //     $ckhs->taka_id = $user->taka->id;
        //     $ckhs->smt_id = $user->taka->raw_semester;
        //     $ckhs->score_tugas = 10;
        //     $ckhs->max_tugas = 1;
        //     $ckhs->code = Str::random(6);
        //     $ckhs->save();
        // } elseif ($khs !== null) {
        //     $ukhs = HasilStudi::where('student_id', $user->id)->where('smt_id', $user->taka->raw_semester)->first();
        //     $ukhs->score_tugas += 10;
        //     $ukhs->max_tugas += 1;
        //     $ukhs->save();
        // }

        Alert::success('Sukses', 'Tugas berhasil disimpan');
        return redirect()->route('mahasiswa.akademik.tugas-index');
    }


}
