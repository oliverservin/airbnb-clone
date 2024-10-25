<!-- TODO: Pass attributes -->
<!-- TODO: Init component with showModal -->
<!-- TODO: Show modal when showModal -->
<!-- TODO: Add cloak -->
<!-- TODO: Hide modal on escape -->
<!-- TODO: Make it modelable -->
<!-- TODO: Add transition with opacity only -->

<div
    {{ $attributes }}
    x-data="{ showModal: false }"
    x-show="showModal"
    x-cloak
    x-modelable="showModal"
    @keydown.escape.window="showModal = false"
    x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-neutral-800/70 outline-none focus:outline-none"
>
    <div class="relative mx-auto my-6 h-full w-full md:h-auto md:w-4/6 lg:h-auto lg:w-3/6 xl:w-2/5">
        <!-- TODO: add transition with alpine -->
        <div x-transition class="translate h-full duration-300">
            <!-- TODO: close modal on click away -->
            <div
                @click.away = "showModal = false"
                class="translate relative flex h-full w-full flex-col rounded-lg border-0 bg-white shadow-lg outline-none focus:outline-none md:h-auto lg:h-auto"
            >
                <div class="relative flex items-center justify-center rounded-t border-b-[1px] p-6">
                    <!-- TODO: close modal on click -->
                    <button @click="showModal = false" class="absolute left-9 border-0 p-1 transition hover:opacity-70">
                        <!-- TODO: add close icon "size 18px" -->
                        <x-icon.close class="size-[18px]" />
                    </button>
                    <!-- TODO: add title -->
                    {{ $title ?? '' }}
                </div>
                <div class="relative flex-auto p-6">
                    <!-- TODO: add slot -->
                    {{ $slot }}
                </div>
                <div class="flex flex-col gap-2 p-6">
                    <!-- TODO: add footer -->
                    {{ $footer ?? '' }}
                </div>
            </div>
        </div>
    </div>
</div>
