<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function markAsRead()
    {
        $this->read = true;
        $this->save();
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'auth_id');
    }
}
