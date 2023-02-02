<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'poster'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function getPoster()
    {
        if ($this->poster == null) {
            return '/img/no-image.png';
        }
        return Storage::url('uploads/movies/' . $this->poster);
    }

    public function makePublished()
    {
        $this->is_published = 1;
        $this->save();
    }

    public function makeUnpublished()
    {
        $this->is_published = 0;
        $this->save();
    }

    public function toggleStatus()
    {
        if ($this->is_published == 0) {
            return $this->makePublished();
        }
        return $this->makeUnpublished();
    }
}
