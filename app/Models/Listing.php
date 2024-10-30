<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'guests',
        'rooms',
        'bathrooms',
        'title',
        'description',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
