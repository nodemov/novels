<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
    ];

    protected $hidden = [
        "slug",
        "image",
        "created_at",
        "updated_at"
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'novel_id', 'id')->orderBy('chapters.chapter', 'asc');
    }

    public function chapter_latest()
    {
        return $this->belongsTo(Chapter::class, 'id', 'novel_id');
    }
}
