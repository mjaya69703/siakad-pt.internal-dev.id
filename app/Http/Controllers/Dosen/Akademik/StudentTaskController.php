<?php

namespace App\Http\Controllers\Dosen\Akademik;

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
use App\Models\JadwalKuliah;
use App\Models\Mahasiswa;
use App\Models\HasilStudi;
use App\Models\studentScore;
use App\Models\studentTask;
use App\Models\Settings\webSettings;

class StudentTaskController extends Controller
{
    public function index()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['jadkul'] = JadwalKuliah::all();
        $data['stask'] = studentTask::all();

        return view('dosen.pages.student-task-index', $data);
    }

    public function create()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['jadkul'] = JadwalKuliah::all();
        $data['stask'] = studentTask::latest()->paginate(5);

        return view('dosen.pages.student-task-create', $data);
    }
    public function view($code)
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['jadkul'] = JadwalKuliah::all();
        $data['stask'] = studentTask::latest()->paginate(5);
        $data['task'] = studentTask::where('code', $code)->first();
        $data['score'] = studentScore::where('stask_id', $data['task']->id)->get();

        // dd($data['score']);

        return view('dosen.pages.student-task-view', $data);
    }
    public function viewDetail($code)
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['stask'] = studentTask::latest()->paginate(5);
        $data['score'] = studentScore::where('code', $code)->first();

        // dd($data['score']);

        return view('dosen.pages.student-task-view-score', $data);
    }
    public function edit($code)
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['jadkul'] = JadwalKuliah::all();
        $data['stask'] = studentTask::latest()->paginate(5);
        $data['task'] = studentTask::where('code', $code)->first();

        return view('dosen.pages.student-task-edit', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jadkul_id' => 'required',
            'exp_date'  => 'required',
            'exp_time'  => 'required',
            'title' => 'required|string',
            'detail_task' => 'required'
        ],
        [
            'jadkul_id.required' => 'Jadwal kuliah wajib dipilih.',
            'exp_date' => 'Batas Akhir Tanggal wajib diisi.',
            'exp_time' => 'Batas Akhir Waktu wajib diisi.',
            'title' => 'Judul tugas kuliah wajib diisi.',
            'detail_task' => 'Detail tugas kuliah wajib diisi.',
        ]
    );
        $stask = new studentTask;
        $stask->dosen_id = Auth::guard('dosen')->user()->id;
        $stask->code = Str::random(6);
        $stask->jadkul_id = $request->jadkul_id;
        $stask->exp_date = $request->exp_date;
        $stask->exp_time = $request->exp_time;
        $stask->title = $request->title;
        $stask->detail_task = $request->detail_task;
        $stask->save();

        Alert::success('Data berhasil ditambahkan');
        return back();
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'jadkul_id' => 'required',
            'exp_date'  => 'required',
            'exp_time'  => 'required',
            'title' => 'required|string',
            'detail_task' => 'required'
        ],
        [
            'jadkul_id.required' => 'Jadwal kuliah wajib dipilih.',
            'exp_date' => 'Batas Akhir Tanggal wajib diisi.',
            'exp_time' => 'Batas Akhir Waktu wajib diisi.',
            'title' => 'Judul tugas kuliah wajib diisi.',
            'detail_task' => 'Detail tugas kuliah wajib diisi.',
        ]
    );
        $stask = studentTask::where('code', $code)->first();
        $stask->dosen_id = Auth::guard('dosen')->user()->id;
        $stask->jadkul_id = $request->jadkul_id;
        $stask->exp_date = $request->exp_date;
        $stask->exp_time = $request->exp_time;
        $stask->title = $request->title;
        $stask->detail_task = $request->detail_task;
        $stask->save();

        Alert::success('Data berhasil diupdate');
        return back();
    }

    public function updateScore($code, Request $request)
    {
        $score = studentScore::where('code', $code)->first();
        $score->score = $request->score;
        $score->save();

        $user = Mahasiswa::where('id', $request->student_id)->first();
        $khs = HasilStudi::where('student_id', $user->id)->where('smt_id', $user->taka->raw_semester)->first();
        // dd($khs->count())

        if ($khs === null) {
            $ckhs = new HasilStudi;
            $ckhs->student_id = $user->id;
            $ckhs->taka_id = $user->taka->id;
            $ckhs->smt_id = $user->taka->raw_semester;
            $ckhs->score_tugas = $request->score;
            $ckhs->max_tugas = 1;
            $ckhs->code = Str::random(6);
            $ckhs->save();
        } elseif ($khs !== null) {
            $ukhs = HasilStudi::where('student_id', $user->id)->where('smt_id', $user->taka->raw_semester)->first();
            $ukhs->score_tugas += $request->score;
            $ukhs->max_tugas += 1;
            $ukhs->save();
        }

        Alert::success('success', 'Score berhasil diupdate');
        return back();
    }

    public function destroy($code)
    {
        $stask = studentTask::where('code', $code)->first();
        $stask->delete();

        Alert::success('success', 'Data berhasil dihapus');
        return back();
    }
}
