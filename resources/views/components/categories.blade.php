<?php

$categories = [
    [
        'label' => 'Playa',
        'icon' => 'beach',
        'description' => '¡Esta propiedad está cerca de la playa!',
    ],
    [
        'label' => 'Molinos',
        'icon' => 'windmill',
        'description' => '¡Esta propiedad tiene molinos de viento!',
    ],
    [
        'label' => 'Moderno',
        'icon' => 'villa',
        'description' => '¡Esta propiedad es moderna!'
    ],
    [
        'label' => 'Campo',
        'icon' => 'mountain',
        'description' => '¡Esta propiedad está en el campo!'
    ],
    [
        'label' => 'Piscinas',
        'icon' => 'pool',
        'description' => '¡Esta propiedad tiene una hermosa piscina!'
    ],
    [
        'label' => 'Islas',
        'icon' => 'island',
        'description' => '¡Esta propiedad está en una isla!'
    ],
    [
        'label' => 'Lago',
        'icon' => 'boat-fishing',
        'description' => '¡Esta propiedad está cerca de un lago!'
    ],
    [
        'label' => 'Esquí',
        'icon' => 'skiing',
        'description' => '¡Esta propiedad tiene actividades de esquí!'
    ],
    [
        'label' => 'Castillos',
        'icon' => 'castle',
        'description' => '¡Esta propiedad es un castillo antiguo!'
    ],
    [
        'label' => 'Cuevas',
        'icon' => 'cave-entrance',
        'description' => '¡Esta propiedad está en una cueva espeluznante!'
    ],
    [
        'label' => 'Acampada',
        'icon' => 'forest-camp',
        'description' => '¡Esta propiedad ofrece actividades de campamento!'
    ],
    [
        'label' => 'Ártico',
        'icon' => 'snow',
        'description' => '¡Esta propiedad está en un entorno ártico!'
    ],
    [
        'label' => 'Desierto',
        'icon' => 'cactus',
        'description' => '¡Esta propiedad está en el desierto!'
    ],
    [
        'label' => 'Graneros',
        'icon' => 'barn',
        'description' => '¡Esta propiedad está en un granero!'
    ],
    [
        'label' => 'Lujo',
        'icon' => 'diamond',
        'description' => '¡Esta propiedad es nueva y lujosa!'
    ]
];

?>

<x-container>
    <div class="flex flex-row items-center justify-between overflow-x-auto pt-4">
        @foreach($categories as $category)
            <x-category-box :icon="$category['icon']">{{ $category['label'] }}</x-category-box>
        @endforeach
    </div>
</x-container>
