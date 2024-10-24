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

    protected static function booted()
    {
        static::addGlobalScope('order', function ($query) {
            $query->orderBy('name');
        });
    }

    public function getRows()
    {
        return collect(json_decode(File::get(base_path('countries.json'))))->map(function($country) {
            return [
                'name' => $country->translations->spa->common ?? $country->name->common,
                'code' => $country->cca2,
                'region' => match($country->region) {
                    'Americas' => 'América',
                    'Europe' => 'Europa',
                    default => $country->region,
                },
                'latlng' => json_encode($country->latlng),
            ];
        })->toArray();
    }

    protected function sushiShouldCache()
    {
        return true;
    }
}
