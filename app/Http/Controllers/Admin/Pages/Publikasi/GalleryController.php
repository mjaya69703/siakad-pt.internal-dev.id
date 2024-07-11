<?php

namespace App\Http\Controllers\Admin\Pages\Publikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\File;
use Auth;
use Hash;
use Str;
// SECTION ADDONS EXTERNAL
use Alert;
use App\Helper\roleTrait;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// SECTION MODELS
use App\Models\User;
use App\Models\GalleryAlbum;
use App\Models\GalleryPhotos;
use App\Models\Settings\webSettings;

class GalleryController extends Controller
{
    use roleTrait;



    public function index()
    {
        $data['prefix'] = $this->setPrefix();
        $data['web'] = webSettings::where('id', 1)->first();
        $data['album'] = GalleryAlbum::latest()->paginate(24);

        return view('user.pages.publikasi.gallery-index', $data);
    }

    public function search(Request $request)
    {
        $data['prefix'] = $this->setPrefix();
        $data['web'] = webSettings::where('id', 1)->first();
        $search = $request->input('search');
        $album = GalleryAlbum::where('name', 'like', "%$search%")->paginate(24);

        return view('user.pages.publikasi.gallery-index',['album' => $album], $data);
    }

    public function create()
    {
        $data['prefix'] = $this->setPrefix();
        $data['web'] = webSettings::where('id', 1)->first();

        return view('user.pages.publikasi.gallery-create', $data);
    }

}
