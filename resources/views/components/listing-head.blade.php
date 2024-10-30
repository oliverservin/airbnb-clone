@props(['listing'])

<div class="space-y-6">
    <div>
        <div class="text-2xl font-bold">
            {{ $listing->title }}
        </div>
    </div>

    <div class="relative h-[60vh] w-full overflow-hidden rounded-xl bg-neutral-200">
        @if ($listing->photo_url)
            <img src="{{ $listing->photo_url }}" fill class="w-full object-cover" alt="Image" />
        @endif
    </div>
</div>
