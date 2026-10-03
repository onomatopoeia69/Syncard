<div class="p-8">

     <div class="flex items-center justify-between mb-8">

        <div>
            <h1 class="text-2xl font-semibold text-slate-900">
                Child Lost
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Manage your children's NFC safety profiles and lost mode.
            </p>
        </div>

        <button
            type="button"
            class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5
                   text-sm font-medium text-white shadow-sm
                   hover:bg-indigo-700 transition"
             wire:click="openAddChild"
        >
        <i data-lucide="plus" class="w-4 h-4"></i>
            Add Child
        </button>

    </div>

    {{-- Summary --}}
    <livewire:user.child-dashboard>

    {{-- Children Card --}}
    <livewire:user.child-table>

    {{-- add modal --}}
     <livewire:modal.child.add>

    {{-- view modal --}}
    <livewire:modal.child.view>

    {{-- street modal --}}
    <livewire:modal.child.open-street>

</div>

