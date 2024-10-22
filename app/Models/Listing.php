<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Listing extends Model
{
    protected $fillable = [
        'title',
        'description',
        'photo_path',
        'category_label',
        'rooms',
        'bathrooms',
        'guests',
        'location',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_label', 'label');
    }

    public function updatePhoto(UploadedFile $photo)
    {
        tap($this->photo_path, function ($previous) use ($photo) {
            $this->forceFill([
                'photo_path' => $photo->storePublicly('listing-photos', ['disk' => 'public'])
            ])->save();

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });
    }

    public function photoUrl() : Attribute
    {
        return Attribute::get(function () {
            return $this->photo_path
                ? Storage::disk('public')->url($this->photo_path)
                : null;
        });
    }
}
