<button
    x-data
    @click="$dispatch('show-search-modal')"
    class="w-full cursor-pointer rounded-full border-[1px] py-2 shadow-sm transition hover:shadow-md md:w-auto"
>
    <div class="flex flex-row items-center justify-between">
        <div class="px-6 text-sm font-semibold">Cualquier lugar</div>
        <div class="hidden flex-1 border-x-[1px] px-6 text-center text-sm font-semibold sm:block">Cualquier semana</div>
        <div class="flex flex-row items-center gap-3 pl-6 pr-2 text-sm text-gray-600">
            <div class="hidden sm:block">¿Cuántos huéspedes?</div>
            <div class="rounded-full bg-rose-500 p-2 text-white">
                <x-icon.search class="size-[18px]" />
            </div>
        </div>
    </div>
</button>
