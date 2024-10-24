<div
    {{ $attributes }}
    x-data="{
        map: null,
        marker: null,
        center: null,
        init() {
            $nextTick(() => {
                this.map = L.map($refs.map).setView(
                    this.center || [0, 0],
                    this.center ? 4 : 2,
                );

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href=\'https://www.openstreetmap.org/copyright\'>OpenStreetMap</a> contributors'
                }).addTo(this.map);

                if (this.center) {
                    L.marker(this.center).addTo(this.map);
                }
            });

            $watch('center', () => {
                this.map.setView(
                    this.center || [0, 0],
                    this.center ? 4 : 2,
                );

                // Remove existing marker if any
                if (this.marker) {
                    this.map.removeLayer(this.marker);
                }

                // Add new marker
                L.marker(this.center).addTo(this.map);
            });
        },
    }"
    x-modelable="center"
    class="flex flex-col gap-8"
>
    <div x-ref="map" class="h-[35vh] rounded-lg"></div>
</div>
