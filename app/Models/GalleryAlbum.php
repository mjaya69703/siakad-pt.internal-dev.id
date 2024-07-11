<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    use HasFactory;

    protected $guarded=[];

    // Relationship with author (assuming 'author_id' points to a User model)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
