<!-- TODO: listen to `toast` event and send `toast` -->
<!-- TODO: init alpine component with `toast` method -->
<!-- TODO: receive `message` on `toast` -->
<!-- TODO: notify using `$notify` with message -->
<!-- TODO: configure `$notify` with `wrapperId`, `templateId`, `autoClose` and `autoRemove -->
<div
    x-data="{
        toast(message) {
            $notify(message, {
                wrapperId: 'flashMessageWrapper',
                templateId: 'flashMessageTemplate',
                autoClose: 3000,
                autoRemove: 4000,
            })
        }
    }"
    x-on:toast.window="toast($event.detail.message)"
>
    <!-- Flash Message Wrapper -->
    <div id="flashMessageWrapper" class="fixed inset-x-0 top-4 z-50 mx-auto w-64 space-y-2"></div>

    <!-- Flash Message Template -->
    <template id="flashMessageTemplate">
        <div role="alert" class="flex">
            <div class="flex justify-center gap-3 rounded-xl border border-neutral-100 bg-white p-3 shadow-lg">
                <!-- TODO: Add check icon with size 6 and green 500 -->
                <x-icon.check class="size-6 text-green-500" />

                <div class="pt-0.5">
                    <strong class="text-nautral-900 block text-sm font-medium">
                        {notificationText}
                    </strong>
                </div>
            </div>
        </div>
    </template>
</div>
