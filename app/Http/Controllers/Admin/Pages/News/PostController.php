<?php

namespace App\Http\Controllers\Admin\Pages\News;

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
use App\Models\newsCategory;
use App\Models\newsPost;
use App\Models\Settings\webSettings;
use App\Helper\roleTrait;

class PostController extends Controller
{
    use roleTrait;

    public function index()
    {
        $data['web'] = webSettings::where('id', 1)->first();

        $data['posts'] = newsPost::latest()->get();
        $data['prefix'] = $this->setPrefix();

        return view('user.pages.news-posts-index', $data);
    }

    public function view($code)
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['post'] = newsPost::where('code', $code)->first();
        $data['category'] = newsCategory::all();

        $data['prefix'] = $this->setPrefix();

        return view('user.pages.news-posts-view', $data);
    }
    
    public function create()
    {
        $data['web'] = webSettings::where('id', 1)->first();

        $data['posts'] = newsPost::all();
        $data['category'] = newsCategory::all();
        $data['prefix'] = $this->setPrefix();

        return view('user.pages.news-posts-create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:webp,jpg,jpeg,png|max:2048',
            'content' => 'required',
            'keywords' => 'required',
            'metadesc' => 'required',
            'category_id' => 'required',
        ],
        [
            'name.required' => 'Judul postingan tidak boleh kosong.',
            'image.required' => 'Gambar tidak boleh kosong.',
            'image.mimes' => 'Format file wajib WEBP, JPG, JPEG atau PNG.',
            'image.max' => 'Format file tidak boleh lebih dari 2MB.',
            'content.required' => 'Isi Konten tidak boleh kosong.',
            'keywords.required' => 'Keywords tidak boleh kosong.',
            'metadesc.required' => 'Deksripsi Meta tidak boleh kosong.',
            'category_id.required' => 'Kategori tidak boleh kosong.',
        ]);

        $post = new newsPost;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'post-' . $post->slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/news');

            // Membuat direktori jika belum ada
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }
            // Mengompres gambar dan menyimpannya
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            $image->scaleDown(height: 300)->save($destinationPath . '/' . $name);

            // Menyimpan nama file gambar ke database
            $post->image = "news/" . $name;
        }
        $post->name = $request->name;
        $post->slug = Str::slug($request->name);
        $post->code = Str::random(6);
        $post->content = $request->content;
        $post->keywords = $request->keywords;
        $post->metadesc = $request->metadesc;
        $post->category_id = $request->category_id;
        $post->save();


        Alert::success('Success', 'Post berhasil ditambahkan.');
        return back();

    }
    public function update(Request $request, $code)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:webp,jpg,jpeg,png|max:2048',
            'content' => 'required',
            'keywords' => 'required',
            'metadesc' => 'required',
            'category_id' => 'required',
        ],
        [
            'name.required' => 'Judul postingan tidak boleh kosong.',
            'image.required' => 'Gambar tidak boleh kosong.',
            'image.mimes' => 'Format file wajib WEBP, JPG, JPEG atau PNG.',
            'image.max' => 'Format file tidak boleh lebih dari 2MB.',
            'content.required' => 'Isi Konten tidak boleh kosong.',
            'keywords.required' => 'Keywords tidak boleh kosong.',
            'metadesc.required' => 'Deksripsi Meta tidak boleh kosong.',
            'category_id.required' => 'Kategori tidak boleh kosong.',
        ]);

        $post = newsPost::where('code', $code)->first();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'post-' . $post->slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/news');

            // Membuat direktori jika belum ada
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }
            // Mengompres gambar dan menyimpannya
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            $image->scaleDown(height: 300)->save($destinationPath . '/' . $name);

            // Menyimpan nama file gambar ke database
            $post->image = "news/" . $name;
        }
        $post->name = $request->name;
        $post->slug = Str::slug($request->name);
        $post->content = $request->content;
        $post->keywords = $request->keywords;
        $post->metadesc = $request->metadesc;
        $post->category_id = $request->category_id;
        $post->save();


        Alert::success('Success', 'Post berhasil diupdate.');
        return back();

    }

    public function destroy(Request $request, $slug)
    {
        $destinationPaths = storage_path('app/public/images/');

        $post = newsPost::where('slug', $slug)->first();
        if ($post->image != 'default/default-profile.jpg') {
            File::delete($destinationPaths . $post->image); // hapus gambar lama
        }

        $post->delete();
        Alert::success('Success', 'Post berhasil dihapus.');
        return back();
    }
}
