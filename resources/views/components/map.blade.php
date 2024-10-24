<div
    {{ $attributes }}
    x-data="{
        map: null,
        marker: null,
        center: null,
        setMapView() {
            this.map.setView(
                this.center || [0, 0],
                this.center ? 4 : 2,
            )
        },
        addMarker() {
            // Remove existing marker if any
            if (this.marker) {
                this.map.removeLayer(this.marker);
            }

            if (this.center) {
                this.marker = L.marker(this.center).addTo(this.map);
            }
        },
        init() {
            this.map = L.map($refs.map)

            this.setMapView()

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href=\'https://www.openstreetmap.org/copyright\'>OpenStreetMap</a> contributors'
            }).addTo(this.map);

            this.addMarker()

            $watch('center', () => {
                this.setMapView()

                this.addMarker()
            });
        },
    }"
    x-modelable="center"
    class="flex flex-col gap-8"
>
    <div x-ref="map"class="h-[35vh] rounded-lg"></div>
</div>
