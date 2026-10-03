<div class="space-y-4">

    {{-- Filters --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

        <div class="relative w-full sm:max-w-sm">
            <i
                data-lucide="search"
                class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
            ></i>

            <input
                type="text"
                wire:model.live="search"
                placeholder="Search child..."
                class="w-full rounded-lg border-slate-300 py-2.5 pl-9 pr-3 text-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
        </div>

        <select
            wire:model.live="status"
            class="rounded-lg border-slate-300 px-3 py-2.5 text-sm"
        >
            <option value="all">All Children</option>
            <option value="normal">Normal</option>
            <option value="lost">Lost Mode</option>
        </select>

    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">

        <div class="overflow-x-auto">

            <table class="min-w-full text-sm">

                <thead class="border-b border-slate-200 bg-slate-50">
                    <tr>

                        <th class="px-5 py-3 text-left font-semibold text-slate-600">
                            Child
                        </th>

                        <th class="px-5 py-3 text-left font-semibold text-slate-600">
                            Emergency Contact
                        </th>

                        <th class="px-5 py-3 text-left font-semibold text-slate-600">
                            NFC Tag
                        </th>

                        <th class="px-5 py-3 text-left font-semibold text-slate-600">
                            Status
                        </th>

                        <th class="px-5 py-3 text-right font-semibold text-slate-600">
                            Actions
                        </th>

                    </tr>
                </thead>


                <tbody class="divide-y divide-slate-100" wire:poll.5s='refreshTable'>

                    @forelse($children as $child)

                        <tr class="hover:bg-slate-50">

                            {{-- Child --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center gap-3">
                                    @if($child->photo)

                                        <img
                                            src="{{ Storage::url($child->photo) }}"
                                            class="h-10 w-10 rounded-full object-cover"
                                        >

                                    @else

                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-50">
                                            <i
                                                data-lucide="user"
                                                class="h-5 w-5 text-indigo-500"
                                            ></i>
                                        </div>

                                    @endif

                                    <div>
                                        <p class="font-medium text-slate-800">
                                            {{ $child->name }}
                                        </p>

                                        <p class="text-xs text-slate-400">
                                            {{ $child->gender ?? '—' }}
                                        </p>
                                    </div>

                                </div>

                            </td>


                            {{-- Emergency Contact --}}
                            <td class="px-5 py-4">

                                @php
                                    $primaryContact = $child->emergencyContacts
                                        ->firstWhere('is_primary', true)
                                        ?? $child->emergencyContacts->first();
                                @endphp

                                @if($primaryContact)

                                    <p class="font-medium text-slate-700">
                                        {{ $primaryContact->name }}
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        {{ $primaryContact->relationship }}
                                        ·
                                        {{ $primaryContact->phone }}
                                    </p>

                                @else

                                    <span class="text-slate-400">
                                        No contact
                                    </span>

                                @endif

                            </td>

                            <td class="px-5 py-4">

                                @if($child->nfcTag)

                                    <div class="flex items-center gap-2">

                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-50">
                                            <i
                                                data-lucide="radio"
                                                class="h-4 w-4 text-indigo-600"
                                            ></i>
                                        </div>

                                        <div>
                                            <p class="font-medium text-slate-700">
                                                {{ $child->nfcTag->tag_uid }}
                                            </p>

                                            <p class="text-xs text-slate-400">
                                                {{ $child->nfcTag->status ? 'Active' : 'Inactive' }}
                                            </p>
                                        </div>

                                    </div>

                                @else

                                    <span class="text-slate-400">
                                        No NFC tag
                                    </span>

                                @endif

                            </td>


                            <td class="px-5 py-4">

                                @if($child->lost_mode)

                                  
                                     <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2.5 py-1 text-xs font-medium text-red-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                        Lost
                                    </span>


                                @else

                                    <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-green-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                        Normal
                                    </span>

                                @endif

                            </td>

                            <td class="px-5 py-4">

                                <div class="flex justify-end gap-1">

                                    {{-- View --}}
                                    <button
                                        type="button"
                                        wire:click="viewChild({{ $child->id }})"
                                        class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-indigo-600"
                                        title="View"
                                    >
                                        <i
                                            data-lucide="eye"
                                            class="h-4 w-4"
                                        ></i>
                                    </button>


                                    {{-- Tag Link --}}
                                    @if($child->nfcTag)

                                        <a
                                            href="{{ route('child.show',['token' => $child->nfcTag->public_token]) }}"
                                            target="_blank"
                                            class="rounded-lg p-2 text-slate-500 hover:bg-indigo-50 hover:text-indigo-600"
                                            title="Open Tag Link"
                                        >
                                            <i data-lucide="external-link" class="h-4 w-4"></i>
                                        </a>

                                    @endif


                                         <button
                                            title="{{ $child->lost_mode ? 'Turn Off Lost Mode' : 'Activate Lost Mode' }}"
                                            wire:click="toggleLostMode({{ $child->id }})"
                                             class="rounded-lg p-2 text-slate-500 hover:bg-indigo-50 hover:text-indigo-600"
                                        >
                       
                                        <i
                                            data-lucide="{{ $child->lost_mode ? 'triangle-alert' : 'shield-alert' }}"
                                            class="h-4 w-4 {{ $child->lost_mode ? 'text-red-500' : 'text-green-500' }}"
                                        ></i>
                                            
                                        </button>


                                        <button
                                            title="remove"
                                            wire:click="deleteChild({{ $child->id }})"
                                           class="rounded-lg p-2 text-slate-500 hover:bg-indigo-50 hover:text-indigo-600"
                                        >
                       
                                        <i data-lucide="trash" class="h-4 w-4"></i>
                                            
                                    </button>



                                       @if (
                                            $child->nfcTag &&
                                            $child->nfcTag->scans->contains(function ($scan) {
                                                return $scan->latitude !== null &&
                                                    $scan->longitude !== null;
                                            })
                                        )
                                            <button
                                                wire:click="openLocation({{ $child->id }})"
                                                title="View Location"
                                                class="rounded-lg p-2 text-slate-500 hover:bg-indigo-50 hover:text-indigo-600"
                                            >
                                                <i data-lucide="map-pin" class="h-4 w-4"></i>
                                            </button>
                                        @endif 

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td
                                colspan="5"
                                class="px-5 py-12 text-center"
                            >
                                <div class="flex flex-col items-center">

                                    <i
                                        data-lucide="users"
                                        class="mb-3 h-10 w-10 text-slate-300"
                                    ></i>

                                    <p class="font-medium text-slate-600">
                                        No children found
                                    </p>

                                    <p class="mt-1 text-sm text-slate-400">
                                        Add a child to get started.
                                    </p>

                                </div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($children->hasPages())

            <div class="border-t border-slate-200 px-5 py-3">
                {{ $children->links() }}
            </div>

        @endif

    </div>

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