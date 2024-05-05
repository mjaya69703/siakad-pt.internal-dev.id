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
// SECTION MODELS
use App\Models\User;

class WorkersController extends Controller
{
    // KHUSUS KELOLA DATA ROLE ADMIN
    public function indexAdmin()
    {
        $data['admin'] = User::where('type', 0)->get();

        return view('user.admin.pages.workers-admin-index', $data);

    }
    public function createAdmin()
    {
        $data['admin'] = User::where('type', 0)->get();

        return view('user.admin.pages.workers-admin-create', $data);

    }
    public function editAdmin(Request $request, $code)
    {
        $data['admin'] = User::where('type', 0)->where('code', $code)->first();

        return view('user.admin.pages.workers-admin-edit', $data);

    }
    public function storeAdmin(Request $request)
    {
        $user = new User;

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
        $user->reli = $request->reli;
        $user->contact_name_1 = $request->contact_name_1;
        $user->contact_name_2 = $request->contact_name_2;
        $user->contact_phone_1 = $request->contact_phone_1;
        $user->contact_phone_2 = $request->contact_phone_2;
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
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);

            if ($user->image != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$user->image); // hapus gambar lama
            }
            $user->image = "profile/".$name;
            $user->save();

            Alert::success('Success', 'Data berhasil ditambahkan');
            return back();
        }
        Alert::success('Success', 'Data berhasil ditambahkan');
        return back();
    }
    public function updateAdmin(Request $request, $code)
    {
        $user = User::where('type', 0)->where('code', $code)->first();

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
        $user->reli = $request->reli;
        $user->contact_name_1 = $request->contact_name_1;
        $user->contact_name_2 = $request->contact_name_2;
        $user->contact_phone_1 = $request->contact_phone_1;
        $user->contact_phone_2 = $request->contact_phone_2;
        $user->type = $request->type;
        
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
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);

            if ($user->image != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$user->image); // hapus gambar lama
            }
            $user->image = "profile/".$name;
            $user->save();

            Alert::success('Success', 'Data berhasil diupdate');
            return back();
        }
        Alert::success('Success', 'Data berhasil diupdate');
        return back();
    }

    public function destroyAdmin(Request $request, $code)
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
    // KHUSUS KELOLA DATA ROLE WORKER
    public function indexWorkers()
    {
        $data['admin'] = User::whereIn('type', [1,2,3,4])->get();
        // dd($data['admin']->count());

        return view('user.admin.pages.workers-staff-index', $data);

    }
    public function createWorkers()
    {
        $data['admin'] = User::whereIn('type', [1,2,3,4])->get();

        return view('user.admin.pages.workers-staff-create', $data);

    }
    public function editWorkers(Request $request, $code)
    {
        $data['admin'] = User::where('type', 0)->where('code', $code)->first();

        return view('user.admin.pages.workers-staff-edit', $data);

    }
    public function storeWorkers(Request $request)
    {
        $user = new User;

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
        $user->reli = $request->reli;
        $user->contact_name_1 = $request->contact_name_1;
        $user->contact_name_2 = $request->contact_name_2;
        $user->contact_phone_1 = $request->contact_phone_1;
        $user->contact_phone_2 = $request->contact_phone_2;
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
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);

            if ($user->image != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$user->image); // hapus gambar lama
            }
            $user->image = "profile/".$name;
            $user->save();

            Alert::success('Success', 'Data berhasil ditambahkan');
            return back();
        }
        Alert::success('Success', 'Data berhasil ditambahkan');
        return back();
    }
    public function updateWorkers(Request $request, $code)
    {
        $user = User::where('type', 0)->where('code', $code)->first();

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
        $user->reli = $request->reli;
        $user->contact_name_1 = $request->contact_name_1;
        $user->contact_name_2 = $request->contact_name_2;
        $user->contact_phone_1 = $request->contact_phone_1;
        $user->contact_phone_2 = $request->contact_phone_2;
        $user->type = $request->type;
        
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
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);

            if ($user->image != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$user->image); // hapus gambar lama
            }
            $user->image = "profile/".$name;
            $user->save();

            Alert::success('Success', 'Data berhasil diupdate');
            return back();
        }
        Alert::success('Success', 'Data berhasil diupdate');
        return back();
    }
    public function destroyWorkers(Request $request, $code)
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

}
