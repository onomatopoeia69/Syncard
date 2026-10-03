
<header class="h-16 bg-white border-b border-gray-200 shadow-md sticky top-0 z-50 flex items-center justify-between px-8">

<div class="flex items-center gap-3">


        <button
            id="sidebarToggle"
            type="button"
            class="w-10 h-10 flex items-center justify-center
                   rounded-lg text-gray-600
                   hover:bg-gray-100 transition">

            <i id="sidebarIcon" class="bi bi-list text-xl"></i>

        </button>



        <h2 class="font-semibold text-gray-800">
            {{ ucFirst(basename(request()->path())) }}                                                                 
        </h2>

    </div>


    <div class="flex items-center gap-4">


        <div class="flex items-center gap-2">

            <div class="w-9 h-9 rounded-full bg-yellow-500
                        text-white flex items-center justify-center">

                {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}

            </div>

            <div class="hidden md:block">

                <p class="text-sm font-semibold">
                    {{ Auth::user()->first_name }}
                </p>

                <p class="text-xs text-gray-500">
                    Admin
                </p>

            </div>

        </div>

    </div>

</header>
