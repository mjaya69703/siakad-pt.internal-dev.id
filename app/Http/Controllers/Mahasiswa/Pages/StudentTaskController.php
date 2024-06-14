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
use App\Models\studentTask;
use App\Models\studentScore;

class StudentTaskController extends Controller
{
    public function index()
    {
        $user = Auth::guard('mahasiswa')->user();

        $data['stask'] = StudentTask::whereHas('jadkul', function($query) use ($user) {
            $query->where('kelas_id', $user->class_id);
        })->get();

        return view('mahasiswa.pages.stask-index', $data);
    }

    public function view($code)
    {

        $data['stask'] = StudentTask::where('code', $code)->first();

        return view('mahasiswa.pages.stask-view', $data);
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
            'file_2.mimes' => 'File 2 harus berupa file dokumen PDF, Word, Excel, atau gambar.',
            'file_2.max' => 'File 2 tidak boleh lebih dari 20 MB.',
            'file_3.mimes' => 'File 3 harus berupa file dokumen PDF, Word, Excel, atau gambar.',
            'file_3.max' => 'File 3 tidak boleh lebih dari 20 MB.',
            'file_4.mimes' => 'File 4 harus berupa file dokumen PDF, Word, Excel, atau gambar.',
            'file_4.max' => 'File 4 tidak boleh lebih dari 20 MB.',
            'file_5.mimes' => 'File 5 harus berupa file dokumen PDF, Word, Excel, atau gambar.',
            'file_5.max' => 'File 5 tidak boleh lebih dari 20 MB.',
            'file_6.mimes' => 'File 6 harus berupa file dokumen PDF, Word, Excel, atau gambar.',
            'file_6.max' => 'File 6 tidak boleh lebih dari 20 MB.',
            'file_7.mimes' => 'File 7 harus berupa file dokumen PDF, Word, Excel, atau gambar.',
            'file_7.max' => 'File 7 tidak boleh lebih dari 20 MB.',
            'file_8.mimes' => 'File 8 harus berupa file dokumen PDF, Word, Excel, atau gambar.',
            'file_8.max' => 'File 8 tidak boleh lebih dari 20 MB.',
        ]);

        $stask = studentTask::where('code', $code)->first();
        $user = Auth::guard('mahasiswa')->user();

        $task = new studentScore;
        $task->stask_id = $stask->id;
        $task->desc = $request->desc;
        $task->student_id = $user->id;
        
        
        for ($i = 1; $i <= 8; $i++) {
            $fileKey = 'file_' . $i;
            
            if ($request->hasFile($fileKey)) {
                $file = $request->file($fileKey);
                $filename = time() . '-part-' . $i . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/tugas', $filename, 'public');
                $task->$fileKey = $path;
            }
        }
        $task->save();

        Alert::success('Sukses', 'Tugas berhasil disimpan');
        return back();
    }


}
