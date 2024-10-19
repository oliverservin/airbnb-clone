<div
    {{ $attributes }}
    x-data="{ showModal: false }"
    x-modelable="showModal"
    @keydown.window.escape="showModal = false"
    x-show="showModal"
    x-transition.opacity
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-neutral-800/70 outline-none focus:outline-none"
>
    <div class="relative mx-auto my-6 h-full w-full md:h-auto md:w-4/6 lg:h-auto lg:w-3/6 xl:w-2/5">
        <div x-transition class="translate h-full duration-300">
            <div
                @click.away="showModal = false"
                class="translate relative flex h-full w-full flex-col rounded-lg border-0 bg-white shadow-lg outline-none focus:outline-none md:h-auto lg:h-auto"
            >
                <div class="relative flex items-center justify-center rounded-t border-b-[1px] p-6">
                    <button
                        @click="showModal = false"
                        class="absolute left-9 border-0 p-1 transition hover:opacity-70"
                    >
                        <x-icon.close class="size-[18px]" />
                    </button>
                    {{ $title ?? '' }}
                </div>
                <div class="relative flex-auto p-6">{{ $slot }}</div>
                <div class="flex flex-col gap-2 p-6">
                    {{ $footer ?? '' }}
                </div>
            </div>
        </div>
    </div>
</div>
