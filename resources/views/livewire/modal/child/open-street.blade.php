<div>
 @if ($showModal)

    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">

        <div class="w-full max-w-4xl rounded-xl bg-white shadow-xl">

            <div class="flex items-center justify-between border-b px-6 py-4">

                <div>
                    <h2 class="text-lg font-semibold">
                        Scan Location
                    </h2>

                    @if ($child)
                        <p class="text-sm text-gray-500">
                            {{ $child->name }}
                        </p>
                    @endif
                </div>

                <button
                    type="button"
                    wire:click="close"
                    class="rounded-lg p-2 hover:bg-gray-100"
                >
                   

                    <i class="bi bi-x" class="h-5 w-5"></i>

                </button>

            </div>

          

            <div class="p-6">

                @if (
                    $latestScan &&
                    $latestScan->latitude !== null &&
                    $latestScan->longitude !== null
                )

                   <div
                         id="child-location-map"
                            wire:ignore
                            style="height: 400px; width: 100%;"
                        ></div>

                    <div class="mt-4 grid grid-cols-2 gap-4">

                        <div>
                            <p class="text-xs text-gray-500">
                                Latitude
                            </p>

                            <p class="text-sm font-medium">
                                {{ $latestScan->latitude }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500">
                                Longitude
                            </p>

                            <p class="text-sm font-medium">
                                {{ $latestScan->longitude }}
                            </p>
                        </div>

                    </div>

                @else

                    <div class="flex h-96 items-center justify-center">

                        <div class="text-center">

                            <i
                                data-lucide="map-pin-off"
                                class="mx-auto h-10 w-10 text-gray-400"
                            ></i>

                            <p class="mt-3 text-gray-700">
                                No GPS location available
                            </p>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

@endif
</div>

@script
<script>
    let locationMap = null;

    $wire.on('location-map-ready', (event) => {

        console.log('Map event:', event);

        setTimeout(() => {

            const mapElement = document.getElementById(
                'child-location-map'
            );

            if (!mapElement) {
                console.log('Map element not found');
                return;
            }

            const latitude = Number(event.latitude);
            const longitude = Number(event.longitude);

            console.log('Latitude:', latitude);
            console.log('Longitude:', longitude);

            if (
                Number.isNaN(latitude) ||
                Number.isNaN(longitude)
            ) {
                console.log('Invalid GPS coordinates');
                return;
            }

            if (locationMap) {
                locationMap.remove();
                locationMap = null;
            }

            locationMap = L.map(mapElement).setView(
                [latitude, longitude],
                16
            );

            L.tileLayer(
                'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                {
                    attribution: '&copy; OpenStreetMap contributors'
                }
            ).addTo(locationMap);

            L.marker([
                latitude,
                longitude
            ])
            .addTo(locationMap)
            .bindPopup('NFC scan location')
            .openPopup();

            setTimeout(() => {
                locationMap.invalidateSize();
            }, 300);

        }, 300);
    });
</script>
@endscript