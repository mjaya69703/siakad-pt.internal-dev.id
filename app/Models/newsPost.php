<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsPost extends Model
{
    use HasFactory;
    
    protected $guarded = [];   
    
    public function category()
    {
        return $this->belongsTo(newsCategory::class, 'category_id');
    }
    
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
