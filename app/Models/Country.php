<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Sushi\Sushi;

class Country extends Model
{
    use Sushi;

    protected $casts = [
        'latlng' => 'array',
    ];

    public function getRows()
    {
        return collect(json_decode(File::get(base_path('countries.json'))))->map(function($country) {
            return [
                'name' => $country->translations->spa->common ?? $country->name->common,
                'code' => $country->cca2,
                'region' => $country->region,
                'latlng' => json_encode($country->latlng),
            ];
        })->sortBy('name')->toArray();
    }
}
