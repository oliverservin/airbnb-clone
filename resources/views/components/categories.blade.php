@props(['categories' => App\Models\Category::all()])

<x-container>
    <div class="flex flex-row items-center justify-between overflow-x-auto pt-4">
        @foreach($categories as $category)
            <x-category-box :category="$category" />
        @endforeach
    </div>
</x-container>
