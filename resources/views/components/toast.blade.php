<div
    x-data="{
        toast(message) {
            $notify(message, {
                wrapperId: 'FlashMessageWrapper',
                templateId: 'FlashMessageTemplate',
                autoClose: 300000,
                autoRemove: 400000,
            })
        },
    }"
    x-on:toast.window="toast($event.detail.message)"
>
    <div id="FlashMessageWrapper" class="fixed right-4 top-4 z-50 w-64 space-y-2"></div>

    <template id="FlashMessageTemplate">
        <div role="alert" class="rounded-lg border border-nautral-100 bg-white p-4">
            <div class="flex items-start gap-4">
                <x-icon.check class="size-6 text-green-600" />

                <div class="flex-1 pt-0.5">
                    <strong class="block text-sm font-medium text-nautral-900">{notificationText}</strong>
                </div>
            </div>
        </div>
    </template>
</div>
