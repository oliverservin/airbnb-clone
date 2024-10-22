<div
    {{ $attributes }}
    x-data="{
        dateRange: [],
        init() {
            let flatpickrInstance = flatpickr(this.$refs.date, {
                inline: true,
                mode: 'range',
                minDate: 'today',
                dateFormat: 'Y-m-d',
                defaultDate: this.dateRange,
                onChange: (date, dateString) => {
                    this.dateRange = dateString.split(' to ')
                },
            })

            this.$watch('dateRange', () => flatpickrInstance.setDate(this.dateRange))
        },
    }"
    x-modelable="dateRange"
>
    <input x-ref="date" type="text" class="hidden" readonly />
</div>
