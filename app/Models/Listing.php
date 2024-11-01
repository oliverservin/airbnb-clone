<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
            $this->fill([
                'photo_path' => $photo->storePublicly(
                    'listings-photo',
                    ['disk' => 'public']
                )
            ])->save();

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });
    }

    public function photoUrl() : Attribute {
        return Attribute::get(function () {
            return $this->photo_path
                ? Storage::disk('public')->url($this->photo_path)
                : null;
        });
    }
}
