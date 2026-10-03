<div>
  
     <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

       
        <div class="p-5 bg-white border border-slate-200/80 rounded-xl shadow-xs transition-all hover:border-slate-300">
        <div class="flex items-center justify-between">
            <div>
            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                Total Children
            </p>
            <div class="mt-1 flex items-baseline gap-2">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900">
               {{ $totalChildren }}
                </h2>
            </div>
            </div>

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 ring-1 ring-indigo-500/10">
            <i data-lucide="users" class="h-5 w-5"></i>
            </div>
        </div>
        </div>      


        {{-- NFC Tags --}}
        <div class="p-5 bg-white border border-slate-200/80 rounded-xl shadow-xs transition-all hover:border-slate-300">
        <div class="flex items-center justify-between">
            <div>
            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                Active NFC Tags
            </p>
            <div class="mt-1 flex items-baseline gap-2">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                 {{ $activeTags }}
                </h2>
            </div>
            </div>

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 ring-1 ring-indigo-500/10">
            <i data-lucide="radio" class="h-5 w-5"></i>
            </div>
        </div>
        </div>


        {{-- Lost Mode --}}
          <div class="p-5 bg-white border border-slate-200/80 rounded-xl shadow-xs transition-all hover:border-slate-300">
        <div class="flex items-center justify-between">
            <div>
            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                Lost Mode Active
            </p>
            <div class="mt-1 flex items-baseline gap-2">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                 {{ $lostChildren }}
                </h2>
            </div>
            </div>

            <div class="flex h-11 w-11 bg-red-50 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 ring-1 ring-indigo-500/10">
            <i data-lucide="triangle-alert" class="w-5 h-5 text-red-500"></i>
            </div>
        </div>
        </div>


         <div class="p-5 bg-white border border-slate-200/80 rounded-xl shadow-xs transition-all hover:border-slate-300">
        <div class="flex items-center justify-between">
            <div>
            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                Total NFC Scans
            </p>
            <div class="mt-1 flex items-baseline gap-2">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                  {{ $totalScans }}
                </h2>
            </div>
            </div>

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 ring-1 ring-indigo-500/10">
            <i data-lucide="scan-line" class="w-5 h-5"></i>
            </div>
        </div>
        </div>



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