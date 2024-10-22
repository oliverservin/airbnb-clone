<div
    {{ $attributes }}
    x-data="{
        map: null,
        marker: null,
        country: null,
        initMap() {
            this.map = L.map($refs.map).setView([0,0], 2);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href=\'https://www.openstreetmap.org/copyright\'>OpenStreetMap</a> contributors'
            }).addTo(this.map);
        },
        updateMap() {
            if (!this.country) return;

            this.map.setView(this.country.latlng, 4);

            // Remove existing marker if any
            if (this.marker) {
                this.map.removeLayer(this.marker);
            }

            // Add new marker
            L.marker(this.country.latlng).addTo(this.map);
        },
    }"
    x-modelable="country"
    x-init="
        $nextTick(() => initMap())
        $watch('country', () => updateMap())
    "
    class="flex flex-col gap-8"
>
    <div x-ref="map" class="h-[35vh] rounded-lg"></div>
</div>
