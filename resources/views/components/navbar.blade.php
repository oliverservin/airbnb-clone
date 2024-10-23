<div class="fixed z-10 w-full bg-white shadow-sm">
    <div class="border-b-[1px] py-4">
        <x-container>
            <div class="flex flex-row items-center justify-between gap-3 md:gap-0">
                <x-logo />
                <livewire:search />
                <livewire:user-menu />
            </div>
        </x-container>
    </div>
    @if(request()->route()->getName() === 'home')
        <x-categories />
    @endif
</div>
