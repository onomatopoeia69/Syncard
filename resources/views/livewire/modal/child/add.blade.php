<div>
    @if($showModal)
        <div
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
            wire:key="add-child-modal"
        >

            <div
                class="w-full max-w-4xl max-h-[90vh] overflow-y-auto rounded-2xl bg-white shadow-2xl"
            >

                {{-- Header --}}
                <div class="sticky top-0 z-10 flex items-center justify-between border-b border-slate-200 bg-white px-6 py-4">

                    <div>
                        <h2 class="text-xl font-semibold text-slate-800">
                            Add Child
                        </h2>

                        <p class="text-sm text-slate-500">
                            Add the child's information, emergency contact, and NFC tag.
                        </p>
                    </div>

                    <button
                        type="button"
                        wire:click="closeModal"
                        class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600"
                    >
                        <i data-lucide="x" class="h-5 w-5"></i>
                    </button>

                </div>


                {{-- Form --}}
                <form wire:submit="save">

                    <div class="space-y-8 p-6">

                 
                        <section>

                            <div class="mb-5 flex items-center gap-3">

                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50">
                                    <i
                                        data-lucide="user"
                                        class="h-5 w-5 text-indigo-600"
                                    ></i>
                                </div>

                                <div>
                                    <h3 class="font-semibold text-slate-800">
                                        Child Information
                                    </h3>

                                    <p class="text-sm text-slate-500">
                                        Basic information about the child.
                                    </p>
                                </div>

                            </div>


                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                                {{-- Photo --}}
                                <div class="md:col-span-2">

                                    <label class="mb-2 block text-sm font-medium text-slate-700">
                                        Photo
                                    </label>

                                    <div class="flex items-center gap-4">

                                        @if($photo)
                                            <img
                                                src="{{ $photo->temporaryUrl() }}"
                                                class="h-20 w-20 rounded-xl object-cover"
                                            >
                                        @else
                                            <div class="flex h-20 w-20 items-center justify-center rounded-xl bg-slate-100">
                                                <i
                                                    data-lucide="image"
                                                    class="h-7 w-7 text-slate-400"
                                                ></i>
                                            </div>
                                        @endif

                                        <div>
                                            <label
                                                class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50"
                                            >
                                                <i
                                                    data-lucide="upload"
                                                    class="h-4 w-4"
                                                ></i>

                                                Upload Photo

                                                <input
                                                    type="file"
                                                    wire:model="photo"
                                                    accept="image/*"
                                                    class="hidden"
                                                >
                                            </label>

                                            <p class="mt-1 text-xs text-slate-400">
                                                JPG, PNG up to 2MB
                                            </p>
                                        </div>

                                    </div>

                                    @error('photo')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- Name --}}
                                <div>

                                    <label class="mb-2 block text-sm font-medium text-slate-700">
                                        Full Name
                                    </label>

                                    <input
                                        type="text"
                                        wire:model="name"
                                        placeholder="Juan Dela Cruz"
                                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    >

                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Address
                                    </label>

                                    <textarea
                                        wire:model="address"
                                        rows="2"
                                        placeholder="Enter child's complete address"
                                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    ></textarea>

                                    @error('address')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>

                                    <label class="mb-2 block text-sm font-medium text-slate-700">
                                        Date of Birth
                                    </label>

                                    <input
                                        type="date"
                                        wire:model="date_of_birth"
                                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    >

                                    @error('date_of_birth')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                <div>

                                    <label class="mb-2 block text-sm font-medium text-slate-700">
                                        Gender
                                    </label>

                                    <select
                                        wire:model="gender"
                                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    >
                                        <option value="">Select gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>

                                    @error('gender')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- Blood Type --}}
                                <div>

                                    <label class="mb-2 block text-sm font-medium text-slate-700">
                                        Blood Type
                                    </label>

                                    <select
                                        wire:model="blood_type"
                                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    >
                                        <option value="">Select blood type</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>

                                    @error('blood_type')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                            </div>

                        </section>


                        <section class="border-t border-slate-200 pt-7">

                            <div class="mb-5 flex items-center gap-3">

                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-50">
                                    <i
                                        data-lucide="heart-pulse"
                                        class="h-5 w-5 text-red-500"
                                    ></i>
                                </div>

                                <div>
                                    <h3 class="font-semibold text-slate-800">
                                        Medical Information
                                    </h3>

                                    <p class="text-sm text-slate-500">
                                        Important medical information for emergencies.
                                    </p>
                                </div>

                            </div>


                            <div class="space-y-5">

                                {{-- Allergies --}}
                                <div>

                                    <label class="mb-2 block text-sm font-medium text-slate-700">
                                        Allergies
                                    </label>

                                    <textarea
                                        wire:model="allergies"
                                        rows="3"
                                        placeholder="List any known allergies..."
                                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    ></textarea>

                                    @error('allergies')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- Medical Notes --}}
                                <div>

                                    <label class="mb-2 block text-sm font-medium text-slate-700">
                                        Medical Notes
                                    </label>

                                    <textarea
                                        wire:model="medical_notes"
                                        rows="3"
                                        placeholder="Other important medical information..."
                                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    ></textarea>

                                    @error('medical_notes')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                            </div>

                        </section>


                        <section class="border-t border-slate-200 pt-7">

                            <div class="mb-5 flex items-center gap-3">

                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50">
                                    <i
                                        data-lucide="phone"
                                        class="h-5 w-5 text-amber-600"
                                    ></i>
                                </div>

                                <div>
                                    <h3 class="font-semibold text-slate-800">
                                        Emergency Contact
                                    </h3>

                                    <p class="text-sm text-slate-500">
                                        The primary person to contact if the child is found.
                                    </p>
                                </div>

                            </div>


                            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

                                {{-- Contact Name --}}
                                <div>

                                    <label class="mb-2 block text-sm font-medium text-slate-700">
                                        Contact Name
                                    </label>

                                    <input
                                        type="text"
                                        wire:model="emergency_name"
                                        placeholder="Maria Dela Cruz"
                                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    >

                                    @error('emergency_name')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- Relationship --}}
                                <div>

                                    <label class="mb-2 block text-sm font-medium text-slate-700">
                                        Relationship
                                    </label>

                                    <select
                                        wire:model="emergency_relationship"
                                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    >
                                        <option value="">Select relationship</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Father">Father</option>
                                        <option value="Guardian">Guardian</option>
                                        <option value="Grandparent">Grandparent</option>
                                        <option value="Sibling">Sibling</option>
                                        <option value="Other">Other</option>
                                    </select>

                                    @error('emergency_relationship')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- Phone --}}
                                <div>

                                    <label class="mb-2 block text-sm font-medium text-slate-700">
                                        Phone Number
                                    </label>

                                    <input
                                        type="tel"
                                        wire:model="emergency_phone"
                                        placeholder="09123456789"
                                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    >

                                    @error('emergency_phone')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                            </div>

                        </section>

                        <section class="border-t border-slate-200 pt-7">

                            <div class="mb-5 flex items-center gap-3">

                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50">
                                    <i
                                        data-lucide="radio"
                                        class="h-5 w-5 text-indigo-600"
                                    ></i>
                                </div>

                                <div>
                                    <h3 class="font-semibold text-slate-800">
                                        NFC Tag
                                    </h3>

                                    <p class="text-sm text-slate-500">
                                        Pair an NFC tag with this child profile.
                                    </p>
                                </div>

                            </div>


                            <div class="rounded-xl border border-indigo-100 bg-indigo-50/50 p-5">

                                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                                    <div>

                                        <label class="mb-2 block text-sm font-medium text-slate-700">
                                            NFC Tag UID
                                        </label>

                                        <input
                                            type="text"
                                            wire:model.live="tag_uid"
                                            placeholder="04AABBCCDD"
                                            class="w-full rounded-lg border-slate-300 bg-white px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        >

                                        @error('tag_uid')
                                            <p class="mt-1 text-sm text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    {{-- Preview --}}
                                    <div class="flex items-end">

                                        <div class="flex w-full items-center gap-3 rounded-lg border border-slate-200 bg-white p-3">

                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-indigo-100">
                                                <i
                                                    data-lucide="user"
                                                    class="h-5 w-5 text-indigo-600"
                                                ></i>
                                            </div>

                                            <div class="min-w-0">

                                                <p class="text-xs font-medium text-slate-500">
                                                    Tag Status
                                                </p>

                                                @if($tag_uid)
                                                    <p class="flex items-center gap-1 text-sm font-medium text-green-600">
                                                        <i
                                                            data-lucide="check-circle-2"
                                                            class="h-4 w-4"
                                                        ></i>

                                                        Ready to pair
                                                    </p>
                                                @else
                                                    <p class="text-sm text-slate-400">
                                                        Waiting for tag UID
                                                    </p>
                                                @endif

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>

                    </div>

                    <div class="sticky bottom-0 flex items-center justify-end gap-3 border-t border-slate-200 bg-white px-6 py-4">

                        <button
                            type="button"
                            wire:click="closeModal"
                            class="rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50"
                        >
                            Cancel
                        </button>

                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-700 disabled:cursor-not-allowed disabled:opacity-60"
                        >

                            <i
                                data-lucide="plus"
                                wire:loading.remove
                                wire:target="save"
                                class="h-4 w-4"
                            ></i>

                            <i
                                data-lucide="loader-2"
                                wire:loading
                                wire:target="save"
                                class="h-4 w-4 animate-spin"
                            ></i>

                            <span wire:loading.remove wire:target="save">
                                Add Child
                            </span>

                            <span wire:loading wire:target="save">
                                Saving...
                            </span>

                        </button>

                    </div>

                </form>

            </div>

        </div>
    @endif


    @script
    <script>
        $wire.on('init-lucide', () => {
            setTimeout(() => {
                lucide.createIcons();
            }, 50);
        });
    </script>
    @endscript
   
    @script
    <script>
        Livewire.on('swal', (event) => {
            Swal.fire({
                title: event[0].title,
                text: event[0].text,
                icon: event[0].icon,
                confirmButtonText: 'OK'
            });
        });
    </script>                                                                                            
    @endscript

</div>