<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Listing extends Model
{
    protected $fillable = [
        'guests',
        'rooms',
        'bathrooms',
        'title',
        'description',
        'price',
        'photo_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updatePhoto(UploadedFile $photo)
    {
        tap($this->photo_path, function ($previous) use ($photo) {

        })
    }
}
