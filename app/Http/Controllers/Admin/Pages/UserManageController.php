<?php

namespace App\Http\Controllers\Admin\Pages;

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
// SECTION AUTH
use App\Models\User;
use App\Models\Dosen;

class UserManageController extends Controller
{


    

    public function index()
    {
        $data['users'] = User::where('type', 0)->get();

        return view('user.admin.pages.admin-staffmanage-index', $data);
    }
    public function indexStaff()
    {
        $data['users'] = User::whereIn('type', [1,2])->get();

        return view('user.admin.pages.admin-staffmanage-index', $data);
    }
    public function create()
    {
        $data['users'] = User::all();

        return view('user.admin.pages.admin-staffmanage-create', $data);
    }
    public function createSave(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8196',
            'name' => 'required|string|max:255',
            'user' => 'required|string|max:255|unique:users,user',
            'birth_place' => 'required|string|max:255', // New field
            'birth_date' => 'required|date', // New field
            'phone' => 'required|numeric|unique:users,phone',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'string'],
            'password_confirm' => ['required', 'string', 'same:password'],
        ]);

        $user = new User;
        
        $user->name = $request->name;
        $user->user = $request->user;
        $user->birth_place = $request->birth_place; // New field
        $user->birth_date = $request->birth_date; // New field
        $user->phone = $request->phone;
        $user->gend = $request->gend;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->code = Str::random(6);
        
        $user->password = Hash::make($request->password);
        $user->save();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'profile-'. $user->code.'-' .uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/profile');
            $destinationPaths = storage_path('app/public/images');
            
            // Compress image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            // $image->resize(width: 250);
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);

            if ($user->image != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$user->image); // hapus gambar lama
            }
            $user->image = "profile/".$name;
            $user->save();

            // dd($user->image);

            Alert::success('Success', 'Data berhasil ditambahkan');
            // return redirect()->route('web-admin.staffmanager-admin-index');
            return back();
        }
        Alert::success('Success', 'Data berhasil ditambahkan');
        return back();
    }

    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->status = $request->status;
        $user->save();

        Alert::success('Success', 'Status berhasil diubah');
        return back();
    }


    public function updateSave(Request $request, $code)
    {
        $user = User::where('code', $code)->first();

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8196',
            'name' => 'required|string|max:255',
            'user' => 'required|string|max:255|unique:users,user,' . $user->id,
            'birth_place' => 'required|string|max:255', // New field
            'birth_date' => 'required|date', // New field
            'phone' => 'required|numeric|unique:users,phone,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'gend' => 'nullable|string',
            'status' => 'nullable|string',
            'password' => 'nullable|string',
            'password_confirm' => 'nullable|string|same:password',
        ]);

        
        $user->name = $request->name;
        $user->user = $request->user;
        $user->status = $request->status;
        $user->birth_place = $request->birth_place; // New field
        $user->birth_date = $request->birth_date; // New field
        $user->gend = $request->gend;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->type = $request->type;
        // $user->code = Str::random(6);
        
        $user->password = Hash::make($request->password);
        $user->save();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'profile-'. $user->code.'-' .uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/profile');
            $destinationPaths = storage_path('app/public/images');
            
            // Compress image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            // $image->resize(width: 250);
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);

            if ($user->image != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$user->image); // hapus gambar lama
            }
            $user->image = "profile/".$name;
            $user->save();

            // dd($user->image);

            Alert::success('Success', 'Data berhasil diupdate');
            // return redirect()->route('web-admin.staffmanager-admin-index');
            return back();
        }
        Alert::success('Success', 'Data berhasil diupdate');
        return back();
        // return redirect()->route('web-admin.staffmanager-admin-index');
    }
    public function viewStaff($code)
    {
        $data['staff'] = User::where('code', $code)->first();

        // dd($data['staff']);
        return view('user.admin.pages.admin-staffmanage-view', $data);
    }

    public function deleteStaff($code)
    {
        $destinationPaths = storage_path('app/public/images');

        $admin = User::where('code', $code)->first();
        if ($admin->image != 'default/default-profile.jpg') {
            File::delete($destinationPaths.'/'.$admin->image); // hapus gambar lama
        }

        $admin->delete();
        Alert::success('Success', 'Pengguna berhasil dihapus.');
        return back();
    }


    // DOSEN CRUD
    public function indexDosen()
    {
        $data['dosen'] = Dosen::all();

        return view('user.admin.pages.admin-lecture-index', $data);
    }
    public function updateStatusDosen(Request $request, $id)
    {
        $user = Dosen::findOrFail($id);

        $user->dsn_stat = $request->dsn_stat;
        $user->save();

        Alert::success('Success', 'Status berhasil diubah');
        return back();
    }

    public function viewDosen($code)
    {
        $data['dosen'] = Dosen::where('dsn_code', $code)->first();

        // dd($data['dosen']);
        return view('user.admin.pages.admin-lecture-view', $data);
    }

    public function updateSaveDosen(Request $request, $code)
    {
        $user = Dosen::where('dsn_code', $code)->first();

        $request->validate([
            'dsn_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8196',
            'dsn_name' => 'required|string|max:255',
            'dsn_user' => 'required|string|max:255|unique:users,user,' . $user->id,
            'dsn_birthplace' => 'required|string|max:255', // New field
            'dsn_birthdate' => 'required|date', // New field
            'dsn_phone' => 'required|numeric|unique:users,phone,' . $user->id,
            'dsn_mail' => 'required|email|max:255|unique:users,email,' . $user->id,
            'dsn_gend' => 'nullable|string',
            'dsn_stat' => 'nullable|string',
            'password' => 'nullable|string',
            'password_confirm' => 'nullable|string|same:password',
        ]);

        
        $user->dsn_name = $request->dsn_name;
        $user->dsn_user = $request->dsn_user;
        $user->dsn_stat = $request->dsn_stat;
        $user->dsn_birthplace = $request->dsn_birthplace; // New field
        $user->dsn_birthdate = $request->dsn_birthdate; // New field
        $user->dsn_gend = $request->dsn_gend;
        $user->dsn_phone = $request->dsn_phone;
        $user->dsn_mail = $request->dsn_mail;
        // $user->type = $request->type;
        // $user->code = Str::random(6);
        
        $user->password = Hash::make($request->password);
        $user->save();
        if ($request->hasFile('dsn_image')) {
            $image = $request->file('dsn_image');
            $name = 'profile-'. $user->dsn_code.'-' .uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/profile/dosen');
            $destinationPaths = storage_path('app/public/images');
            
            // Compress image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            // $image->resize(width: 250);
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);

            if ($user->dsn_image != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$user->dsn_image); // hapus gambar lama
            }
            $user->dsn_image = "profile/dosen/".$name;
            $user->save();

            // dd($user->image);

            Alert::success('Success', 'Data berhasil diupdate');
            // return redirect()->route('web-admin.staffmanager-admin-index');
            return back();
        }
        Alert::success('Success', 'Data berhasil diupdate');
        return back();
        // return redirect()->route('web-admin.staffmanager-admin-index');
    }
}
