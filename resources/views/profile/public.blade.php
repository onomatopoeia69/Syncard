<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

    <title>
        {{ $profile->user->name ?? $profile->username }}
    </title>

    <meta name="description"
        content="{{ $profile->bio ?: 'Digital profile of ' . ($profile->user->name ?? $profile->username) }}">

    <meta name="theme-color" content="#4f46e5">

    <link rel="icon" href="{{ asset('assets/images/bcp-logo.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body class="min-h-screen overflow-x-hidden bg-gray-100 text-gray-900 antialiased">


    <div class="min-h-screen w-full px-2 py-3 sm:px-4 sm:py-6 lg:px-8">


        <div class="mx-auto w-full max-w-3xl">


            {{-- Main Profile Card --}}
            <main class="overflow-hidden rounded-2xl bg-white shadow-lg sm:rounded-3xl">


                {{-- Cover --}}
                <div
                    class="relative h-28 overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-indigo-900 xs:h-32 sm:h-44 md:h-52">

                    <div class="absolute -left-12 -top-20 h-44 w-44 rounded-full bg-white opacity-10 sm:h-64 sm:w-64">
                    </div>

                    <div
                        class="absolute -bottom-24 -right-12 h-52 w-52 rounded-full bg-white opacity-10 sm:h-72 sm:w-72">
                    </div>

                    <div
                        class="absolute left-1/2 top-1/2 h-20 w-20 -translate-x-1/2 -translate-y-1/2 rounded-full border border-white/10 bg-white/5 blur-2xl sm:h-40 sm:w-40">
                    </div>

                </div>


                {{-- Profile Content --}}
                <div class="relative px-3 pb-6 sm:px-8 sm:pb-10 lg:px-10">


                    {{-- Avatar --}}
                    <div class="-mt-12 flex justify-center sm:-mt-16">

                        <div
                            class="flex h-24 w-24 items-center justify-center rounded-full border-4 border-white bg-indigo-100 text-3xl font-bold text-indigo-600 shadow-lg sm:h-32 sm:w-32 sm:text-5xl">

                            {{ strtoupper(substr($profile->user->name ?? $profile->username, 0, 1)) }}

                        </div>

                    </div>


                    {{-- Basic Information --}}
                    <div class="mt-3 text-center sm:mt-5">

                        {{-- Name --}}
                        <h1
                            class="break-words text-2xl font-bold leading-tight tracking-tight text-gray-900 sm:text-3xl">

                            {{ $profile->user->name ?? 'Unknown User' }}

                        </h1>


                        {{-- Username --}}
                        <p class="mt-1 text-sm font-medium text-indigo-600 sm:text-base">

                            {{ '@' . $profile->username }}

                        </p>


                        {{-- Professional Identity --}}
                        @if ($profile->job_title || $profile->company)

                        <div class="mx-auto mt-4 max-w-xl">

                            <div class="rounded-2xl border border-indigo-100 bg-indigo-50/60 px-4 py-4 sm:px-6">

                                {{-- Label --}}
                                <p
                                    class="mb-2 text-[10px] font-bold uppercase tracking-[0.18em] text-indigo-400 sm:text-xs">

                                    Professional Profile

                                </p>


                                {{-- Job Title --}}
                                @if ($profile->job_title)

                                <p class="break-words text-base font-bold text-gray-900 sm:text-lg">

                                    {{ $profile->job_title }}

                                </p>

                                @endif


                                {{-- Company --}}
                                @if ($profile->company)

                                <div
                                    class="mt-1 flex items-center justify-center gap-2 text-sm text-gray-600 sm:text-base">

                                    <i class="fas fa-building text-indigo-500"></i>

                                    <span class="break-words font-medium">

                                        {{ $profile->company }}

                                    </span>

                                </div>

                                @endif

                            </div>

                        </div>

                        @endif


                        {{-- Bio / About --}}
                        @if ($profile->bio)

                        <div class="mx-auto mt-5 max-w-2xl">

                            <div class="rounded-2xl border border-gray-100 bg-gray-50 px-4 py-4 text-left sm:px-6">

                                <div class="mb-2 flex items-center gap-2">

                                    <i class="fas fa-user text-xs text-indigo-500"></i>

                                    <p
                                        class="text-[10px] font-bold uppercase tracking-[0.18em] text-gray-400 sm:text-xs">

                                        About

                                    </p>

                                </div>


                                <p class="break-words text-sm leading-6 text-gray-600 sm:text-base sm:leading-7">

                                    {{ $profile->bio }}

                                </p>

                            </div>

                        </div>

                        @endif


                        {{-- Contact Information --}}
                        @if ($profile->phone || $profile->user->email || $profile->address)

                        <div class="mx-auto mt-5 max-w-2xl">

                            <div class="rounded-2xl border border-gray-100 bg-white text-left shadow-sm">

                                {{-- Section Header --}}
                                <div class="border-b border-gray-100 px-4 py-3 sm:px-5">

                                    <div class="flex items-center gap-2">

                                        <div
                                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">

                                            <i class="fas fa-address-card text-sm"></i>

                                        </div>

                                        <div>

                                            <p class="text-sm font-bold text-gray-900">

                                                Contact Information

                                            </p>

                                            <p class="text-[10px] text-gray-400 sm:text-xs">

                                                Business contact details

                                            </p>

                                        </div>

                                    </div>

                                </div>


                                {{-- Contact Details --}}
                                <div class="divide-y divide-gray-100">


                                    {{-- Phone --}}
                                    @if ($profile->phone)

                                    <div class="flex items-center gap-3 px-4 py-3 sm:px-5">

                                        <div
                                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gray-50 text-gray-500">

                                            <i class="fas fa-phone text-sm"></i>

                                        </div>


                                        <div class="min-w-0">

                                            <p class="text-[10px] font-semibold uppercase tracking-wider text-gray-400">

                                                Phone

                                            </p>

                                            <p class="break-all text-sm font-medium text-gray-700">

                                                {{ $profile->phone }}

                                            </p>

                                        </div>

                                    </div>

                                    @endif


                                    {{-- Email --}}
                                    @if ($profile->user->email)

                                    <button type="button" data-bs-toggle="modal" data-bs-target="#emailModal"
                                        class="group flex w-full items-center gap-3 px-4 py-3 text-left transition hover:bg-indigo-50 sm:px-5">

                                        <div
                                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gray-50 text-gray-500 transition group-hover:bg-indigo-100 group-hover:text-indigo-600">

                                            <i class="fas fa-envelope text-sm"></i>

                                        </div>


                                        <div class="min-w-0 flex-1">

                                            <p class="text-[10px] font-semibold uppercase tracking-wider text-gray-400">

                                                Email

                                            </p>

                                            <p class="break-all text-sm font-medium text-gray-700">

                                                {{ $profile->user->email }}

                                            </p>

                                        </div>


                                        <i
                                            class="fas fa-chevron-right shrink-0 text-xs text-gray-300 transition group-hover:text-indigo-500">
                                        </i>

                                    </button>

                                    @endif


                                    {{-- Address --}}
                                    @if ($profile->address)

                                    <div class="flex items-start gap-3 px-4 py-3 sm:px-5">

                                        <div
                                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gray-50 text-gray-500">

                                            <i class="fas fa-location-dot text-sm"></i>

                                        </div>


                                        <div class="min-w-0">

                                            <p class="text-[10px] font-semibold uppercase tracking-wider text-gray-400">

                                                Address

                                            </p>

                                            <p class="break-words text-sm leading-5 text-gray-700">

                                                {{ $profile->address }}

                                            </p>

                                        </div>

                                    </div>

                                    @endif


                                </div>

                            </div>

                        </div>

                        @endif


                        {{-- Primary Actions --}}
                        @if ($profile->phone || $profile->user->email)

                        <div
                            class="mx-auto mt-5 grid w-full max-w-md grid-cols-2 gap-2.5 sm:flex sm:max-w-none sm:justify-center sm:gap-3">


                            {{-- Call --}}
                            @if ($profile->phone)

                            <a href="tel:{{ $profile->phone }}"
                                class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 active:scale-[0.98] sm:px-5">

                                <i class="fas fa-phone"></i>

                                <span>
                                    Call
                                </span>

                            </a>

                            @endif


                            {{-- Email --}}
                            @if ($profile->user->email)

                            <button type="button" data-bs-toggle="modal" data-bs-target="#emailModal"
                                class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600 active:scale-[0.98] sm:px-5">

                                <i class="fas fa-envelope"></i>

                                <span>
                                    Email
                                </span>

                            </button>

                            @endif


                        </div>

                        @endif

                    </div>


                    {{-- Social Media --}}
                    @if ($profile->user->socials->count())

                    <section class="mt-8 sm:mt-11">


                        <div class="mb-4 flex items-center gap-2 sm:mb-5 sm:gap-3">

                            <div class="h-px flex-1 bg-gray-200"></div>

                            <h2
                                class="shrink-0 text-[10px] font-bold uppercase tracking-[0.16em] text-gray-400 sm:text-sm">

                                Connect

                            </h2>

                            <div class="h-px flex-1 bg-gray-200"></div>

                        </div>


                        <div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2 sm:gap-3">


                            @foreach ($profile->user->socials as $social)

                            @if ($social->url)

                            <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                                class="group flex min-h-[62px] min-w-0 items-center gap-3 rounded-xl border border-gray-200 bg-white p-3 shadow-sm transition hover:-translate-y-0.5 hover:border-indigo-200 hover:bg-indigo-50 hover:shadow-md active:scale-[0.99] sm:min-h-[68px] sm:rounded-2xl sm:p-4">


                                <div
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 transition group-hover:bg-indigo-100 group-hover:text-indigo-600 sm:h-11 sm:w-11">

                                    @if ($social->icon)

                                    <i class="{{ $social->icon }}"></i>

                                    @else

                                    <i class="fas fa-link"></i>

                                    @endif

                                </div>


                                <div class="min-w-0 flex-1 text-left">

                                    <p class="truncate text-sm font-semibold text-gray-900 sm:text-base">

                                        {{ $social->label ?: ucfirst($social->platform) }}

                                    </p>


                                    @if ($social->username)

                                    <p class="truncate text-xs text-gray-500 sm:text-sm">

                                        {{ '@' . ltrim($social->username, '@') }}

                                    </p>

                                    @endif

                                </div>


                                <i
                                    class="fas fa-arrow-up-right-from-square shrink-0 text-[10px] text-gray-400 transition group-hover:text-indigo-600 sm:text-xs">
                                </i>

                            </a>

                            @endif

                            @endforeach


                        </div>

                    </section>

                    @endif


                    {{-- Child Profiles --}}
                    @if ($profile->user->childProfiles->count())

                    <section class="mt-8 sm:mt-11">


                        <div class="mb-4 flex items-center gap-2 sm:mb-5 sm:gap-3">

                            <div class="h-px flex-1 bg-gray-200"></div>

                            <h2
                                class="shrink-0 text-[10px] font-bold uppercase tracking-[0.16em] text-gray-400 sm:text-sm">

                                Family

                            </h2>

                            <div class="h-px flex-1 bg-gray-200"></div>

                        </div>


                        <div class="grid grid-cols-1 gap-3 md:grid-cols-2">


                            @foreach ($profile->user->childProfiles as $child)

                            <article
                                class="overflow-hidden rounded-xl border border-gray-200 bg-gray-50 p-3.5 sm:rounded-2xl sm:p-5">


                                <div class="flex min-w-0 items-start gap-3 sm:gap-4">


                                    {{-- Child Photo --}}
                                    <div
                                        class="flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-indigo-100 text-lg font-bold text-indigo-600 sm:h-20 sm:w-20 sm:rounded-2xl sm:text-2xl">

                                        @if ($child->photo)

                                        <img src="{{ asset('storage/' . $child->photo) }}" alt="{{ $child->name }}"
                                            class="h-full w-full object-cover">

                                        @else

                                        {{ strtoupper(substr($child->name, 0, 1)) }}

                                        @endif

                                    </div>


                                    {{-- Child Information --}}
                                    <div class="min-w-0 flex-1">

                                        <h3
                                            class="break-words text-sm font-bold leading-tight text-gray-900 sm:text-lg">

                                            {{ $child->name }}

                                        </h3>


                                        @if ($child->gender)

                                        <p class="mt-1 text-xs text-gray-500 sm:text-sm">

                                            {{ ucfirst($child->gender) }}

                                        </p>

                                        @endif


                                        @if ($child->date_of_birth)

                                        <p class="mt-1 text-[11px] text-gray-400 sm:text-sm">

                                            Born
                                            {{ $child->date_of_birth->format('F d, Y') }}

                                        </p>

                                        @endif

                                    </div>


                                    @if ($child->lost_mode)

                                    <span
                                        class="shrink-0 rounded-full bg-red-100 px-2 py-1 text-[9px] font-bold text-red-600 sm:px-3 sm:py-1 sm:text-xs">

                                        <i class="fas fa-location-dot"></i>

                                        <span class="hidden sm:inline">
                                            Lost Mode
                                        </span>

                                    </span>

                                    @endif


                                </div>


                                {{-- Child Address --}}
                                @if ($child->address)

                                <div class="mt-3 rounded-xl bg-white p-3 sm:mt-4 sm:p-4">

                                    <div class="flex items-start gap-2.5 sm:gap-3">

                                        <i class="fas fa-location-dot mt-1 shrink-0 text-indigo-500">
                                        </i>

                                        <div class="min-w-0">

                                            <p
                                                class="text-[9px] font-bold uppercase tracking-wider text-gray-400 sm:text-xs">

                                                Address

                                            </p>

                                            <p class="mt-1 break-words text-xs leading-5 text-gray-600 sm:text-sm">

                                                {{ $child->address }}

                                            </p>

                                        </div>

                                    </div>

                                </div>

                                @endif


                            </article>

                            @endforeach


                        </div>

                    </section>

                    @endif


                    {{-- NFC --}}
                    <section class="mt-8 sm:mt-11">

                        <div class="rounded-2xl bg-gradient-to-br from-indigo-50 to-purple-50 p-4 text-center sm:p-6">

                            <div
                                class="mx-auto flex h-10 w-10 items-center justify-center rounded-full bg-white text-indigo-600 shadow-sm sm:h-11 sm:w-11">

                                <i class="fas fa-wifi"></i>

                            </div>


                            <p
                                class="mt-3 text-[10px] font-bold uppercase tracking-[0.18em] text-indigo-400 sm:text-xs">

                                Digital Profile

                            </p>


                            <p class="mx-auto mt-2 max-w-md text-xs leading-5 text-gray-500 sm:text-sm sm:leading-6">

                                Tap an NFC-enabled card or open this profile link to view this digital profile.

                            </p>

                        </div>

                    </section>


                </div>

            </main>


            {{-- Footer --}}
            <footer class="px-2 py-5 text-center sm:py-8">

                <p class="text-[11px] text-gray-400 sm:text-sm">

                    Powered by Digital Profile

                </p>

            </footer>


        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- EMAIL MODAL --}}
    {{-- ========================================================= --}}

    @if ($profile->user->email)

    <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered px-2 sm:px-0">

            <div class="modal-content overflow-hidden rounded-2xl border-0 shadow-xl sm:rounded-3xl">


                {{-- Modal Header --}}
                <div class="modal-header border-0 px-4 pb-2 pt-4 sm:px-5 sm:pt-5">

                    <div class="flex min-w-0 items-center gap-3">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600 sm:h-11 sm:w-11">

                            <i class="fas fa-envelope"></i>

                        </div>


                        <div class="min-w-0">

                            <h5 class="modal-title truncate text-base font-bold text-gray-900 sm:text-lg"
                                id="emailModalLabel">

                                Email Address

                            </h5>

                            <p class="mt-0.5 text-xs text-gray-500">
                                {{ $profile->user->name ?? 'User' }}
                            </p>

                        </div>

                    </div>


                    <button type="button" class="btn-close ms-auto shrink-0" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>


                {{-- Modal Body --}}
                <div class="modal-body px-4 py-4 sm:px-5 sm:py-5">


                    <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-gray-400">

                        Email

                    </p>


                    <div
                        class="flex min-w-0 items-center gap-2 rounded-xl border border-gray-200 bg-gray-50 p-3 sm:p-4">

                        <i class="fas fa-envelope shrink-0 text-indigo-500"></i>


                        <span id="profileEmail"
                            class="min-w-0 flex-1 break-all text-sm font-medium text-gray-700 sm:text-base">

                            {{ $profile->user->email }}

                        </span>


                        <button type="button" id="copyEmailButton" onclick="copyProfileEmail()"
                            class="inline-flex shrink-0 items-center gap-1.5 rounded-lg bg-indigo-600 px-3 py-2 text-xs font-semibold text-white transition hover:bg-indigo-700">

                            <i id="copyEmailIcon" class="fas fa-copy"></i>

                            <span id="copyEmailText">
                                Copy
                            </span>

                        </button>

                    </div>


                    <p class="mt-3 text-xs leading-5 text-gray-500">

                        Copy the email address or open it using your device's default email application.

                    </p>

                </div>


                {{-- Modal Footer --}}
                <div
                    class="modal-footer flex flex-col gap-2 border-0 px-4 pb-4 pt-0 sm:flex-row sm:justify-end sm:px-5 sm:pb-5">

                    <button type="button"
                        class="btn btn-light w-full rounded-xl border py-2.5 text-sm font-semibold sm:w-auto"
                        data-bs-dismiss="modal">

                        Close

                    </button>


                    <a href="mailto:{{ $profile->user->email }}"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700 sm:w-auto">

                        <i class="fas fa-paper-plane"></i>

                        Open Email App

                    </a>

                </div>


            </div>

        </div>

    </div>

    @endif


    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>


    {{-- Copy Email --}}
    <script>
        function copyProfileEmail() {

        const emailElement = document.getElementById('profileEmail');
        const copyButton = document.getElementById('copyEmailButton');
        const copyText = document.getElementById('copyEmailText');
        const copyIcon = document.getElementById('copyEmailIcon');

        if (!emailElement || !copyButton || !copyText || !copyIcon) {
            return;
        }

        const email = emailElement.textContent.trim();

        navigator.clipboard.writeText(email)
            .then(function () {

                copyText.textContent = 'Copied';
                copyIcon.className = 'fas fa-check';

                copyButton.classList.remove('bg-indigo-600');
                copyButton.classList.add('bg-green-600');

                setTimeout(function () {

                    copyText.textContent = 'Copy';
                    copyIcon.className = 'fas fa-copy';

                    copyButton.classList.remove('bg-green-600');
                    copyButton.classList.add('bg-indigo-600');

                }, 2000);

            })
            .catch(function () {

                const textarea = document.createElement('textarea');

                textarea.value = email;
                textarea.style.position = 'fixed';
                textarea.style.opacity = '0';

                document.body.appendChild(textarea);

                textarea.select();

                try {

                    document.execCommand('copy');

                    copyText.textContent = 'Copied';
                    copyIcon.className = 'fas fa-check';

                    setTimeout(function () {

                        copyText.textContent = 'Copy';
                        copyIcon.className = 'fas fa-copy';

                    }, 2000);

                } finally {

                    textarea.remove();

                }

            });

    }

    </script>


</body>

</html>
