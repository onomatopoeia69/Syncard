<div wire:poll.5s="refreshChild" class="min-h-screen bg-gray-50">

    @if ($child)

        @if ($child->lost_mode)

            <div class="bg-red-600 px-4 py-6 text-center text-white">

                <div class="flex items-center justify-center gap-2">
                    <i
                        data-lucide="triangle-alert"
                        class="h-7 w-7"
                    ></i>

                    <h1 class="text-2xl font-bold">
                        LOST MODE ACTIVE
                    </h1>
                </div>

                <p class="mt-2 text-sm text-red-100">
                    Please help this child and contact the emergency contact below.
                </p>

            </div>

        @else

            <div class="bg-green-600 px-4 py-4 text-center text-white">

                <div class="flex items-center justify-center gap-2">
                    <i
                        data-lucide="shield-check"
                        class="h-5 w-5"
                    ></i>

                    <span class="font-semibold">
                        Child Information
                    </span>
                </div>


            </div>

        @endif


        <div class="mx-auto max-w-xl px-4 py-6">

            {{-- Profile Card --}}
            <div class="rounded-2xl bg-white p-6 text-center shadow-sm">

                @if ($child->photo)

                    <img
                        src="{{ asset('storage/' . $child->photo) }}"
                        alt="{{ $child->name }}"
                        class="mx-auto h-32 w-32 rounded-full object-cover ring-4 ring-gray-100"
                    >

                @else

                    <div
                        class="mx-auto flex h-32 w-32 items-center justify-center rounded-full bg-gray-100"
                    >
                        <i
                            data-lucide="user"
                            class="h-12 w-12 text-gray-400"
                        ></i>
                    </div>

                @endif

                <h2 class="mt-4 text-2xl font-bold text-gray-900">
                    {{ $child->name }}
                </h2>

                

                @if ($child->date_of_birth)

                    <p class="mt-1 text-sm text-gray-500">
                        {{ $child->date_of_birth->age }} years old
                    </p>

                @endif
                

            </div>


      
            <div class="mt-4 rounded-2xl bg-white p-6 shadow-sm">

                <h3 class="flex items-center gap-2 text-lg font-semibold">

                    <i
                        data-lucide="id-card"
                        class="h-5 w-5 text-blue-600"
                    ></i>

                    Identification

                </h3>

                <div class="mt-5 grid grid-cols-2 gap-4">

                    <div>
                        <p class="text-xs text-gray-500">
                            Date of Birth
                        </p>

                        <p class="mt-1 font-medium text-gray-900">
                            {{ $child->date_of_birth?->format('F d, Y') ?? 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500">
                            Gender
                        </p>

                        <p class="mt-1 font-medium text-gray-900">
                            {{ $child->gender ?: 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500">
                            Blood Type
                        </p>

                        <p class="mt-1 font-medium text-gray-900">
                            {{ $child->blood_type ?: 'Not provided' }}
                        </p>
                    </div>

                    <div>
                    <p class="text-sm text-gray-500">Address</p>

                    <p class="mt-1 font-medium text-gray-900">
                        {{ $child->address ?: 'Not provided' }}
                    </p>
                </div>

                </div>

            </div>


            @if ($child->allergies || $child->medical_notes)

                <div class="mt-4 rounded-2xl bg-white p-6 shadow-sm">

                    <h3 class="flex items-center gap-2 text-lg font-semibold">

                        <i
                            data-lucide="heart-pulse"
                            class="h-5 w-5 text-red-500"
                        ></i>

                        Medical Information

                    </h3>

                    @if ($child->allergies)

                        <div class="mt-5">

                            <p class="text-xs text-gray-500">
                                Allergies
                            </p>

                            <p class="mt-1 text-gray-900">
                                {{ $child->allergies }}
                            </p>

                        </div>

                    @endif

                    @if ($child->medical_notes)

                        <div class="mt-4">

                            <p class="text-xs text-gray-500">
                                Medical Notes
                            </p>

                            <p class="mt-1 text-gray-900">
                                {{ $child->medical_notes }}
                            </p>

                        </div>

                    @endif

                </div>

            @endif


            <div class="mt-4 rounded-2xl bg-white p-6 shadow-sm">

                <h3 class="flex items-center gap-2 text-lg font-semibold">

                    <i
                        data-lucide="phone-call"
                        class="h-5 w-5 text-red-600"
                    ></i>

                    Emergency Contact

                </h3>

                <div class="mt-5 space-y-3">

                    @foreach ($child->emergencyContacts as $contact)

                        <div class="rounded-xl bg-gray-50 p-4">

                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="font-semibold text-gray-900">
                                        {{ $contact->name }}
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        {{ $contact->relationship }}
                                    </p>

                                </div>

                                @if ($contact->is_primary)

                                    <span class="rounded-full bg-red-50 px-2 py-1 text-xs font-medium text-red-600">
                                        Primary
                                    </span>

                                @endif

                            </div>

                            <a
                                href="tel:{{ $contact->phone }}"
                                class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-red-600 px-4 py-3 font-semibold text-white hover:bg-red-700"
                            >
                            

                                <i
                                    data-lucide="phone"
                                    class="h-5 w-5"
                                ></i>

                                Call {{ $contact->phone }}

                            </a>
                            <div class="flex items-center gap-3">
                                <div class="h-px flex-1 bg-gray-300"></div>

                                <span class="text-sm text-gray-500">or</span>

                                <div class="h-px flex-1 bg-gray-300"></div>
                            </div>
                            <button 
                                type="button"
                                onclick="getLocation()"
                                class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-3 font-semibold text-white hover:bg-blue-700"
                            >
                             <i
                                    data-lucide="locate-fixed"
                                    class="h-5 w-5"
                                ></i>

                                Share Location
                            </button>

                        </div>

                    @endforeach

                </div>

            </div>

            <div class="mt-4 pb-8 text-center">

                <div class="flex items-center justify-center gap-2 text-xs text-gray-400">

                    <i
                        data-lucide="nfc"
                        class="h-4 w-4"
                    ></i>

                    NFC Child Information Tag

                </div>

            </div>

        </div>

    @endif

</div>


@script
<script>
    window.getLocation = function () {

        if (!navigator.geolocation) {
            alert('Geolocation is not supported by this browser.');
            return;
        }

        navigator.geolocation.getCurrentPosition(
            function (position) {

                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                console.log('Latitude:', latitude);
                console.log('Longitude:', longitude);

                $wire.updateLocation(latitude, longitude);
            },

            function (error) {

                if (error.code === error.PERMISSION_DENIED) {
                    alert('Location permission was denied.');
                } else if (error.code === error.POSITION_UNAVAILABLE) {
                    alert('Location information is unavailable.');
                } else if (error.code === error.TIMEOUT) {
                    alert('Location request timed out.');
                } else {
                    alert('Unable to get your location.');
                }

            },

            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );
    };
</script>
@endscript