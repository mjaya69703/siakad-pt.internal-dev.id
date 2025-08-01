<?php

namespace App\Models\Publikasi;

// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Publikasi\Kategori;
use App\Models\User;

class Berita extends Model
{
    use SoftDeletes, HasLogAktivitas;
    
    protected $table = 'beritas';
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
            if (empty($model->code)) {
                $model->code = 'BRT-' . date('Ymd') . '-' . strtoupper(Str::random(6));
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('name') && empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    // Relationships
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'Publish');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'Draft');
    }

    // Accessors
    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->content), 150);
    }

    public function getReadTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $readTime = ceil($wordCount / 200); // Assuming 200 words per minute
        return $readTime . ' min read';
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d F Y');
    }
}
