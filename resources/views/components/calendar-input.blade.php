<div
    x-data="{
        date: null,
        config: {
            inline: true,
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: 'es',
            mode: 'range',
        },
        initFlatpickr() {
            flatpickr(this.$refs.date, this.config)
        },
    }"
    x-init="initFlatpickr()"
    class="flex justify-center"
>
    <div class="w-full">
        <input class="hidden" x-ref="date" type="text" id="date" name="date" placeholder="Select a date" x-model="date" />
    </div>
</div>
