<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Category extends Model
{
    use Sushi;

    protected $rows = [
        [
            'name' => 'Playa',
            'slug' => 'beach',
            'icon' => 'beach',
            'description' => '¡Esta propiedad está cerca de la playa!',

        ],
        [
            'name' => 'Molinos',
            'slug' => 'windmills',
            'icon' => 'windmill',
            'description' => '¡Esta propiedad tiene molinos de viento!',
        ],
        [
            'name' => 'Moderno',
            'slug' => 'modern',
            'icon' => 'villa',
            'description' => '¡Esta propiedad es moderna!'
        ],
        [
            'name' => 'Campo',
            'slug' => 'countryside',
            'icon' => 'mountain',
            'description' => '¡Esta propiedad está en el campo!'
        ],
        [
            'name' => 'Piscinas',
            'slug' => 'pools',
            'icon' => 'pool',
            'description' => '¡Esta propiedad tiene una hermosa piscina!'
        ],
        [
            'name' => 'Islas',
            'slug' => 'islands',
            'icon' => 'island',
            'description' => '¡Esta propiedad está en una isla!'
        ],
        [
            'name' => 'Lago',
            'slug' => 'lake',
            'icon' => 'boat-fishing',
            'description' => '¡Esta propiedad está cerca de un lago!'
        ],
        [
            'name' => 'Esquí',
            'slug' => 'skiing',
            'icon' => 'skiing',
            'description' => '¡Esta propiedad tiene actividades de esquí!'
        ],
        [
            'name' => 'Castillos',
            'slug' => 'castles',
            'icon' => 'castle',
            'description' => '¡Esta propiedad es un castillo antiguo!'
        ],
        [
            'name' => 'Cuevas',
            'slug' => 'caves',
            'icon' => 'cave-entrance',
            'description' => '¡Esta propiedad está en una cueva espeluznante!'
        ],
        [
            'name' => 'Acampada',
            'slug' => 'camping',
            'icon' => 'forest-camp',
            'description' => '¡Esta propiedad ofrece actividades de campamento!'
        ],
        [
            'name' => 'Ártico',
            'slug' => 'artic',
            'icon' => 'snow',
            'description' => '¡Esta propiedad está en un entorno ártico!'
        ],
        [
            'name' => 'Desierto',
            'slug' => 'desert',
            'icon' => 'cactus',
            'description' => '¡Esta propiedad está en el desierto!'
        ],
        [
            'name' => 'Graneros',
            'slug' => 'barns',
            'icon' => 'barn',
            'description' => '¡Esta propiedad está en un granero!'
        ],
        [
            'name' => 'Lujo',
            'slug' => 'lux',
            'icon' => 'diamond',
            'description' => '¡Esta propiedad es nueva y lujosa!'
        ]
    ];
}
