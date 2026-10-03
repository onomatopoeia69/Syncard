<div class="p-8">


    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-2xl font-semibold text-slate-900">
                Dashboard
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Welcome back, Carl. Here's what's happening with your portfolio.
            </p>
        </div>

        <div class="flex items-center gap-3">

            <a href="#"
               class="inline-flex items-center gap-2 px-4 py-2.5
                      bg-white border border-slate-200
                      rounded-lg text-sm font-medium text-slate-700
                      hover:bg-slate-50 transition">

                <i data-lucide="external-link" class="w-4 h-4"></i>

                View Portfolio
            </a>

            <a href="#"
               class="inline-flex items-center gap-2 px-4 py-2.5
                      bg-indigo-600 text-white
                      rounded-lg text-sm font-medium
                      hover:bg-indigo-700 transition">

                <i data-lucide="palette" class="w-4 h-4"></i>

                Customize
            </a>

        </div>

    </div>


    {{-- Statistics --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

        {{-- Portfolio Views --}}
        <div class="bg-white border border-slate-200 rounded-xl p-5">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm text-slate-500">
                        Portfolio Views
                    </p>

                    <h2 class="mt-2 text-2xl font-semibold text-slate-900">
                        1,248
                    </h2>
                </div>

                <div class="w-10 h-10 rounded-lg bg-indigo-50
                            flex items-center justify-center">

                    <i data-lucide="eye"
                       class="w-5 h-5 text-indigo-600">
                    </i>

                </div>

            </div>

            <div class="mt-3 flex items-center gap-1 text-xs">

                <span class="text-emerald-600 font-medium">
                    ↑ 12.4%
                </span>

                <span class="text-slate-400">
                    from last month
                </span>

            </div>

        </div>


        {{-- NFC Taps --}}
        <div class="bg-white border border-slate-200 rounded-xl p-5">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm text-slate-500">
                        NFC Taps
                    </p>

                    <h2 class="mt-2 text-2xl font-semibold text-slate-900">
                        342
                    </h2>
                </div>

                <div class="w-10 h-10 rounded-lg bg-indigo-50
                            flex items-center justify-center">

                    <i data-lucide="radio"
                       class="w-5 h-5 text-indigo-600">
                    </i>

                </div>

            </div>

            <div class="mt-3 flex items-center gap-1 text-xs">

                <span class="text-emerald-600 font-medium">
                    ↑ 8.2%
                </span>

                <span class="text-slate-400">
                    from last month
                </span>

            </div>

        </div>


        {{-- Link Clicks --}}
        <div class="bg-white border border-slate-200 rounded-xl p-5">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm text-slate-500">
                        Link Clicks
                    </p>

                    <h2 class="mt-2 text-2xl font-semibold text-slate-900">
                        186
                    </h2>
                </div>

                <div class="w-10 h-10 rounded-lg bg-indigo-50
                            flex items-center justify-center">

                    <i data-lucide="mouse-pointer-click"
                       class="w-5 h-5 text-indigo-600">
                    </i>

                </div>

            </div>

            <div class="mt-3 flex items-center gap-1 text-xs">

                <span class="text-emerald-600 font-medium">
                    ↑ 15.1%
                </span>

                <span class="text-slate-400">
                    from last month
                </span>

            </div>

        </div>


        {{-- Projects --}}
        <div class="bg-white border border-slate-200 rounded-xl p-5">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm text-slate-500">
                        Projects
                    </p>

                    <h2 class="mt-2 text-2xl font-semibold text-slate-900">
                        8
                    </h2>
                </div>

                <div class="w-10 h-10 rounded-lg bg-indigo-50
                            flex items-center justify-center">

                    <i data-lucide="briefcase"
                       class="w-5 h-5 text-indigo-600">
                    </i>

                </div>

            </div>

            <div class="mt-3 text-xs text-slate-400">
                8 projects displayed
            </div>

        </div>

    </div>


    {{-- Main Content --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">


        {{-- Portfolio --}}
        <div class="xl:col-span-2 bg-white border border-slate-200 rounded-xl">

            {{-- Card Header --}}
            <div class="flex items-center justify-between
                        px-6 py-5 border-b border-slate-100">

                <div>

                    <h3 class="text-base font-semibold text-slate-900">
                        My Portfolio
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Manage your public portfolio.
                    </p>

                </div>

                <a href="#"
                   class="text-sm font-medium text-indigo-600
                          hover:text-indigo-700">

                    Customize
                </a>

            </div>


            {{-- Card Content --}}
            <div class="p-6">

                <div class="flex flex-col sm:flex-row gap-5">

                    {{-- Profile Image --}}
                    <div class="w-24 h-24 shrink-0 rounded-xl
                                bg-slate-100
                                flex items-center justify-center">

                        <i data-lucide="user"
                           class="w-10 h-10 text-slate-400">
                        </i>

                    </div>


                    {{-- Information --}}
                    <div class="flex-1">

                        <div class="flex flex-wrap items-center gap-2">

                            <h3 class="text-lg font-semibold text-slate-900">
                                Carl James Langres
                            </h3>

                            <span class="inline-flex items-center gap-1
                                         px-2.5 py-1
                                         rounded-full
                                         bg-emerald-50
                                         text-emerald-700
                                         text-xs font-medium">

                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>

                                Published

                            </span>

                        </div>


                        <p class="mt-1 text-sm text-slate-500">
                            Web Developer
                        </p>


                        {{-- Portfolio URL --}}
                        <div class="flex items-center gap-2 mt-4">

                            <i data-lucide="link"
                               class="w-4 h-4 text-slate-400">
                            </i>

                            <span class="text-sm text-slate-600">
                                pandora.com/carl
                            </span>

                            <button
                                class="text-slate-400 hover:text-indigo-600">

                                <i data-lucide="copy"
                                   class="w-4 h-4">
                                </i>

                            </button>

                        </div>


                        {{-- Actions --}}
                        <div class="flex flex-wrap gap-3 mt-5">

                            <a href="#"
                               class="inline-flex items-center gap-2
                                      px-3 py-2
                                      border border-slate-200
                                      rounded-lg
                                      text-sm font-medium
                                      text-slate-700
                                      hover:bg-slate-50">

                                <i data-lucide="external-link"
                                   class="w-4 h-4">
                                </i>

                                View Portfolio

                            </a>

                            <a href="#"
                               class="inline-flex items-center gap-2
                                      px-3 py-2
                                      bg-indigo-600
                                      rounded-lg
                                      text-sm font-medium
                                      text-white
                                      hover:bg-indigo-700">

                                <i data-lucide="palette"
                                   class="w-4 h-4">
                                </i>

                                Customize

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- NFC Card --}}
        <div class="bg-white border border-slate-200 rounded-xl">

            {{-- Header --}}
            <div class="px-6 py-5 border-b border-slate-100">

                <div class="flex items-center justify-between">

                    <div>

                        <h3 class="text-base font-semibold text-slate-900">
                            NFC
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Your NFC profile
                        </p>

                    </div>

                    <div class="w-9 h-9 rounded-lg bg-indigo-50
                                flex items-center justify-center">

                        <i data-lucide="radio"
                           class="w-5 h-5 text-indigo-600">
                        </i>

                    </div>

                </div>

            </div>


            <div class="p-6">

                {{-- Status --}}
                <div class="flex items-center gap-2">

                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                    <span class="text-sm font-medium text-emerald-600">
                        Active
                    </span>

                </div>


                {{-- URL --}}
                <div class="mt-5">

                    <p class="text-xs text-slate-500 mb-2">
                        NFC URL
                    </p>

                    <div class="flex gap-2">

                        <div class="flex-1 min-w-0
                                    bg-slate-50
                                    border border-slate-200
                                    rounded-lg
                                    px-3 py-2.5">

                            <p class="text-xs text-slate-600 truncate">
                                pandora.com/carl
                            </p>

                        </div>

                        <button
                            class="shrink-0 p-2.5
                                   border border-slate-200
                                   rounded-lg
                                   hover:bg-slate-50">

                            <i data-lucide="copy"
                               class="w-4 h-4 text-slate-500">
                            </i>

                        </button>

                    </div>

                </div>


                {{-- Taps --}}
                <div class="mt-6">

                    <p class="text-xs text-slate-500">
                        Total NFC taps
                    </p>

                    <p class="mt-1 text-2xl font-semibold text-slate-900">
                        342
                    </p>

                </div>


                <a href="#"
                   class="mt-5 w-full inline-flex items-center
                          justify-center
                          px-4 py-2.5
                          border border-slate-200
                          rounded-lg
                          text-sm font-medium
                          text-slate-700
                          hover:bg-slate-50">

                    Manage NFC

                </a>

            </div>

        </div>

    </div>


    {{-- Bottom Section --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mt-6">


        {{-- Recent Activity --}}
        <div class="bg-white border border-slate-200 rounded-xl">

            <div class="px-6 py-5 border-b border-slate-100">

                <h3 class="text-base font-semibold text-slate-900">
                    Recent Activity
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Recent activity on your portfolio.
                </p>

            </div>


            <div class="divide-y divide-slate-100">

                {{-- Activity --}}
                <div class="px-6 py-4 flex items-center gap-4">

                    <div class="w-9 h-9 shrink-0 rounded-lg bg-indigo-50
                                flex items-center justify-center">

                        <i data-lucide="palette"
                           class="w-4 h-4 text-indigo-600">
                        </i>

                    </div>

                    <div class="flex-1 min-w-0">

                        <p class="text-sm font-medium text-slate-800">
                            Portfolio updated
                        </p>

                        <p class="text-xs text-slate-500 mt-1">
                            You updated your profile information.
                        </p>

                    </div>

                    <span class="text-xs text-slate-400 shrink-0">
                        2h ago
                    </span>

                </div>


                <div class="px-6 py-4 flex items-center gap-4">

                    <div class="w-9 h-9 shrink-0 rounded-lg bg-emerald-50
                                flex items-center justify-center">

                        <i data-lucide="radio"
                           class="w-4 h-4 text-emerald-600">
                        </i>

                    </div>

                    <div class="flex-1 min-w-0">

                        <p class="text-sm font-medium text-slate-800">
                            NFC profile accessed
                        </p>

                        <p class="text-xs text-slate-500 mt-1">
                            Someone accessed your portfolio using NFC.
                        </p>

                    </div>

                    <span class="text-xs text-slate-400 shrink-0">
                        5h ago
                    </span>

                </div>


                <div class="px-6 py-4 flex items-center gap-4">

                    <div class="w-9 h-9 shrink-0 rounded-lg bg-slate-100
                                flex items-center justify-center">

                        <i data-lucide="share-2"
                           class="w-4 h-4 text-slate-600">
                        </i>

                    </div>

                    <div class="flex-1 min-w-0">

                        <p class="text-sm font-medium text-slate-800">
                            Social link added
                        </p>

                        <p class="text-xs text-slate-500 mt-1">
                            GitHub was added to your portfolio.
                        </p>

                    </div>

                    <span class="text-xs text-slate-400 shrink-0">
                        Yesterday
                    </span>

                </div>

            </div>

        </div>


        {{-- Portfolio Completion --}}
        <div class="bg-white border border-slate-200 rounded-xl">

            <div class="px-6 py-5 border-b border-slate-100">

                <h3 class="text-base font-semibold text-slate-900">
                    Portfolio Setup
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Complete your portfolio profile.
                </p>

            </div>


            <div class="p-6">

                {{-- Progress --}}
                <div class="flex items-center justify-between mb-2">

                    <span class="text-sm font-medium text-slate-700">
                        Profile completion
                    </span>

                    <span class="text-sm font-semibold text-indigo-600">
                        80%
                    </span>

                </div>


                <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">

                    <div class="h-full w-[80%] bg-indigo-600 rounded-full"></div>

                </div>


                {{-- Checklist --}}
                <div class="mt-6 space-y-4">


                    <div class="flex items-center gap-3">

                        <div class="w-5 h-5 rounded-full bg-emerald-50
                                    flex items-center justify-center">

                            <i data-lucide="check"
                               class="w-3 h-3 text-emerald-600">
                            </i>

                        </div>

                        <span class="text-sm text-slate-600">
                            Profile information
                        </span>

                    </div>


                    <div class="flex items-center gap-3">

                        <div class="w-5 h-5 rounded-full bg-emerald-50
                                    flex items-center justify-center">

                            <i data-lucide="check"
                               class="w-3 h-3 text-emerald-600">
                            </i>

                        </div>

                        <span class="text-sm text-slate-600">
                            Profile photo
                        </span>

                    </div>


                    <div class="flex items-center gap-3">

                        <div class="w-5 h-5 rounded-full bg-emerald-50
                                    flex items-center justify-center">

                            <i data-lucide="check"
                               class="w-3 h-3 text-emerald-600">
                            </i>

                        </div>

                        <span class="text-sm text-slate-600">
                            Social links
                        </span>

                    </div>


                    <div class="flex items-center gap-3">

                        <div class="w-5 h-5 rounded-full bg-slate-100
                                    flex items-center justify-center">

                            <i data-lucide="plus"
                               class="w-3 h-3 text-slate-500">
                            </i>

                        </div>

                        <span class="text-sm text-slate-500">
                            Add a project
                        </span>

                    </div>

                </div>


                <a href="#"
                   class="inline-block mt-6
                          text-sm font-medium
                          text-indigo-600
                          hover:text-indigo-700">

                    Complete Profile →

                </a>

            </div>

        </div>

    </div>

</div>
