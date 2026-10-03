<div>
    @if ($showModal && $child)

<div
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
>
    <div class="w-full max-w-3xl overflow-hidden rounded-2xl bg-white shadow-xl">

        {{-- Header --}}
        <div class="flex items-center justify-between border-b px-6 py-4">

            <div>
                <h2 class="text-lg font-semibold text-gray-900">
                    Child Profile
                </h2>

                <p class="text-sm text-gray-500">
                    Child information and NFC details
                </p>
            </div>

            <button
                wire:click="close"
                class="rounded-lg p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600"
            >
                <i data-lucide="x" class="h-5 w-5"></i>
            </button>

        </div>


        {{-- Content --}}
        <div class="max-h-[75vh] space-y-6 overflow-y-auto p-6">

            {{-- Profile --}}
            <div class="flex items-center gap-4">

                @if ($child->photo)

                    <img
                        src="{{ asset('storage/' . $child->photo) }}"
                        alt="{{ $child->name }}"
                        class="h-20 w-20 rounded-full object-cover"
                    >

                @else

                    <div class="flex h-20 w-20 items-center justify-center rounded-full bg-gray-100">
                        <i
                            data-lucide="user"
                            class="h-8 w-8 text-gray-400"
                        ></i>
                    </div>

                @endif

                <div>
                    <h3 class="text-xl font-semibold text-gray-900">
                        {{ $child->name }}
                    </h3>

                    @if ($child->lost_mode)

                        <span class="mt-1 inline-flex items-center gap-1 rounded-full bg-red-50 px-2.5 py-1 text-xs font-medium text-red-600">
                            <i
                                data-lucide="triangle-alert"
                                class="h-3.5 w-3.5"
                            ></i>
                            Lost Mode Active
                        </span>

                    @else

                        <span class="mt-1 inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-green-600">
                            <i
                                data-lucide="shield-check"
                                class="h-3.5 w-3.5"
                            ></i>
                            Safe
                        </span>

                    @endif
                </div>

            </div>


            {{-- Personal Information --}}
            <div>

                <h3 class="mb-3 text-sm font-semibold text-gray-900">
                    Personal Information
                </h3>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                    <div>
                        <p class="text-xs text-gray-500">
                            Date of Birth
                        </p>

                        <p class="mt-1 text-sm font-medium text-gray-900">
                            {{ $child->date_of_birth?->format('F d, Y') ?? 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500">
                            Gender
                        </p>

                        <p class="mt-1 text-sm font-medium text-gray-900">
                            {{ $child->gender ?: 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500">
                            Blood Type
                        </p>

                        <p class="mt-1 text-sm font-medium text-gray-900">
                            {{ $child->blood_type ?: 'Not provided' }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- Medical Information --}}
            <div>

                <h3 class="mb-3 text-sm font-semibold text-gray-900">
                    Medical Information
                </h3>

                <div class="space-y-3">

                    <div>
                        <p class="text-xs text-gray-500">
                            Allergies
                        </p>

                        <p class="mt-1 text-sm text-gray-700">
                            {{ $child->allergies ?: 'None reported' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500">
                            Medical Notes
                        </p>

                        <p class="mt-1 text-sm text-gray-700">
                            {{ $child->medical_notes ?: 'None reported' }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- Emergency Contact --}}
            <div>

                <h3 class="mb-3 text-sm font-semibold text-gray-900">
                    Emergency Contact
                </h3>

                <div class="space-y-3">

                    @forelse ($child->emergencyContacts as $contact)

                        <div class="flex items-center justify-between rounded-lg border p-4">

                            <div class="flex items-center gap-3">

                                <div class="rounded-lg bg-blue-50 p-2">
                                    <i
                                        data-lucide="phone"
                                        class="h-5 w-5 text-blue-600"
                                    ></i>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-900">
                                        {{ $contact->name }}
                                    </p>

                                    <p class="text-xs text-gray-500">
                                        {{ $contact->relationship }}
                                    </p>
                                </div>

                            </div>

                            <a
                                href="tel:{{ $contact->phone }}"
                                class="text-sm font-medium text-blue-600 hover:underline"
                            >
                                {{ $contact->phone }}
                            </a>

                        </div>

                    @empty

                        <p class="text-sm text-gray-500">
                            No emergency contact.
                        </p>

                    @endforelse

                </div>

            </div>



            {{-- test --}}
        @php
            $publicUrl = route('child.show', [
                'token' => $child->nfcTag->public_token
            ]);
        @endphp

<div>
    <h3 class="mb-3 text-sm font-semibold text-gray-900">
        QR CODE
    </h3>

    @if ($child->nfcTag)

        <div class="rounded-xl border p-4">

            <div class="flex flex-col items-center">

                {{-- QR Code --}}
                <div class="rounded-xl border bg-white p-3">
                    <img
                        src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode($publicUrl) }}"
                        alt="QR Code"
                        class="h-48 w-48"
                    >
                </div>

                {{-- Tag information --}}
                <div class="mt-4 w-full">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-xs text-gray-500">
                                Tag UID
                            </p>

                            <p class="mt-1 font-mono text-sm font-medium text-gray-900">
                                {{ $child->nfcTag->tag_uid }}
                            </p>
                        </div>

                        @if ($child->nfcTag->status)

                            <span class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-green-600">
                                Active
                            </span>

                        @else

                            <span class="rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-500">
                                Inactive
                            </span>

                        @endif

                    </div>

                </div>

                {{-- Open public profile --}}
                <a
                    href="{{ $publicUrl }}"
                    target="_blank"
                    class="mt-4 inline-flex items-center gap-2 rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800"
                >
                    <i data-lucide="external-link" class="h-4 w-4"></i>
                    Open Public Profile
                </a>

            </div>

        </div>

            @else

                <p class="text-sm text-gray-500">
                    No NFC tag assigned.
                </p>

            @endif
        </div>


            {{-- Recent Scans --}}
            @if ($child->nfcTag)

                <div>

                    <div class="mb-3 flex items-center justify-between">

                        <h3 class="text-sm font-semibold text-gray-900">
                            Recent NFC Scans
                        </h3>

                        <span class="text-xs text-gray-500">
                            {{ $child->nfcTag->scans->count() }} scans
                        </span>

                    </div>

                    <div class="divide-y rounded-xl border">

                        @forelse (
                            $child->nfcTag->scans->sortByDesc('scanned_at')->take(5)
                            as $scan
                        )

                            <div class="flex items-center justify-between px-4 py-3">

                                <div class="flex items-center gap-3">

                                    <i
                                        data-lucide="scan-line"
                                        class="h-4 w-4 text-gray-400"
                                    ></i>

                                    <div>
                                        <p class="text-sm text-gray-700">
                                            NFC tag scanned
                                        </p>

                                        <p class="text-xs text-gray-400">
                                            {{ $scan->user_agent }}
                                        </p>
                                    </div>

                                </div>

                                <span class="text-xs text-gray-500">
                                    {{ $scan->scanned_at?->format('M d, Y h:i A') }}
                                </span>

                            </div>

                        @empty

                            <p class="px-4 py-4 text-sm text-gray-500">
                                No scans yet.
                            </p>

                        @endforelse

                    </div>

                </div>

            @endif

        </div>


        {{-- Footer --}}
        <div class="flex justify-end border-t bg-gray-50 px-6 py-4">

            <button
                wire:click="close"
                class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Close
            </button>

        </div>

    </div>
</div>

@endif
</div>

 @script
    <script>
        $wire.on('init-lucide', () => {
            setTimeout(() => {
                lucide.createIcons();
            }, 50);
        });
    </script>
    @endscript
