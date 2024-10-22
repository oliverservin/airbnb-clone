<div
    x-data="{
        dateRange: [],
        init() {
            let flatpickrInstance = flatpickr(this.$refs.date, {
                inline: true,
                mode: 'range',
                dateFormat: 'Y/m/d',
                defaultDate: this.dateRange,
                onChange: (date, dateString) => {
                    this.dateRange = dateString.split(' to ')
                },
            })

            this.$watch('dateRange', () => flatpickrInstance.setDate(this.dateRange))
        },
    }"
>
    <input x-ref="date" type="text" class="hidden" readonly />
</div>
