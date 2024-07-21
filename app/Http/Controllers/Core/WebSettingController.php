<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
// SECTION ADDONS EXTERNAL
use GuzzleHttp\Client;
use Alert;
use App\Helper\roleTrait;
// SECTION AUTH
use App\Models\Settings\webSettings;

class WebSettingController extends Controller
{
    use roleTrait;


    public function index()
    {
        $data['prefix'] = $this->setPrefix();
        $data['web'] = webSettings::where('id', 1)->first();

        // Fetch branches from GitHub
        $client = new Client();
        $owner = 'mjaya69703';
        $repo = 'siakad-pt.internal-dev.id';
        $url = "https://api.github.com/repos/$owner/$repo/branches";

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/vnd.github.v3+json',
                ],
            ]);

            $branches = json_decode($response->getBody(), true);
            $data['branches'] = $branches;
        } catch (\Exception $e) {
            $data['branches'] = [];
        }

        return view('user.admin.system.settings-index', $data);
    }


    public function updateCheck()
    {
        $output = Artisan::call('update:check');
        $result = Artisan::output();

        return response()->json(['message' => $result, 'status' => $output]);
    }

    public function updatePerform(Request $request)
    {
        $branch = $request->input('branch');
        $output = [];
        $returnVar = null;
        exec("git pull origin $branch 2>&1", $output, $returnVar);

        if ($returnVar === 0) {
            return response()->json(['message' => 'Successfully updated to the latest version.', 'status' => 'success']);
        } else {
            return response()->json(['message' => 'Failed to update. Error: ' . implode("\n", $output), 'status' => 'error']);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_apps' => 'required|string',
            'school_name' => 'required|string',
            'school_head' => 'required|string',
            'school_link' => 'required|url',
            'school_desc' => 'required',
            'school_email' => 'required',
            'school_phone' => 'required|string',
            // 'social_ig' => 'required',
            // 'social_fb' => 'required',
            // 'social_tw' => 'required',
            // 'social_in' => 'required',
        ]);
        $web = webSettings::where('id', 1)->first();

        if ($request->hasFile('school_logo')) {
            $image = $request->file('school_logo');
            $name = 'logo-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/website');

            // Membuat direktori jika belum ada
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            // Mengompres gambar dan menyimpannya
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());

            $image->save($destinationPath . '/' . $name);

            // Menyimpan nama file gambar ke database
            $web->school_logo = "website/" . $name;
        }


        $web->school_apps = $request->school_apps;
        $web->school_name = $request->school_name;
        $web->school_head = $request->school_head;
        $web->school_link = $request->school_link;
        $web->school_desc = $request->school_desc;
        $web->school_email = $request->school_email;
        $web->school_phone = $request->school_phone;
        // $web->social_ig = $request->social_ig;
        // $web->social_tw = $request->social_tw;
        // $web->social_in = $request->social_in;
        // $web->social_fb = $request->social_fb;
        $web->save();

        Alert::success('Success', 'Data berhasil diupdate.');
        return back();
    }

    public function databaseExport()
    {
        $filename = 'backup-' . now()->format('Y-m-d_H-i-s') . '.sql';
        $path = storage_path("app/$filename");

        // Jalankan perintah mysqldump untuk membuat backup database
        $command = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . " > $path";
        exec($command);

        // Pastikan file ada
        if (file_exists($path)) {
            return response()->download($path)->deleteFileAfterSend(true);
        }

        return redirect()->back()->with('error', 'Failed to create database backup.');
    }

    public function databaseImport(Request $request)
    {
        $request->validate([
            'sqldata' => 'required|file|mimes:sql',
        ]);

        $file = $request->file('sqldata');
        $path = $file->getRealPath();
        $command = "mysql --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . " < $path";

        exec($command, $output, $return_var);

        if ($return_var === 0) {
            return redirect()->back()->with('success', 'Database imported successfully.');
        }

        return redirect()->back()->with('error', 'Failed to import database.');
    }
}
