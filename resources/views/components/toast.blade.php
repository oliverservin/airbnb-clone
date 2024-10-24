<div
    x-data="{
        toast(message) {
            $notify(message, {
                wrapperId: 'FlashMessageWrapper',
                templateId: 'FlashMessageTemplate',
                autoClose: 3000,
                autoRemove: 4000,
            })
        },
    }"
    x-on:toast.window="toast($event.detail.message)"
>
    <div id="FlashMessageWrapper" class="fixed inset-x-0 top-4 z-50 mx-auto w-64 space-y-2"></div>

    <template id="FlashMessageTemplate">
        <div role="alert" class="flex">
            <div class="flex justify-center gap-3 rounded-xl border-neutral-100 border bg-white p-3 shadow-lg">
                <x-icon.check class="size-6 text-green-500" />

                <div class="pt-0.5">
                    <strong class="text-nautral-900 block text-sm font-medium">{notificationText}</strong>
                </div>
            </div>
        </div>
    </template>
</div>
