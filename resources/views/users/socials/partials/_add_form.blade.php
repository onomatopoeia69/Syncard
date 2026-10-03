<div id="socialModal" class="fixed inset-0 z-50 hidden" aria-hidden="true" onclick="handleSocialModalClick(event)">

    {{-- Backdrop --}}
    <div id="socialModalBackdrop" class="absolute inset-0
               bg-black/30
               backdrop-blur-sm
               transition-opacity duration-200"></div>


    {{-- Modal Wrapper --}}
    <div class="relative z-10
               flex min-h-full
               items-end sm:items-center
               justify-center
               p-0 sm:p-6">

        {{-- Modal --}}
        <div id="socialModalPanel" class="w-full sm:max-w-md
                   bg-white
                   rounded-t-2xl sm:rounded-xl
                   shadow-2xl
                   transform translate-y-full sm:translate-y-0
                   sm:scale-95
                   opacity-0
                   transition-all duration-200">

            {{-- Modal Header --}}
            <div class="px-6 mt-3">
                <div class="flex items-start justify-between gap-4">

                    <div class="flex items-start gap-3.5">

                        <div class="w-10 h-10 shrink-0
                    flex items-center justify-center
                    rounded-xl
                    bg-indigo-50
                    text-indigo-600
                    ring-1 ring-inset ring-indigo-100">
                            <i class="fas fa-share-nodes text-base"></i>
                        </div>

                        <div class="min-w-0">
                            <div class="flex items-center gap-2">
                                <h2 class="text-base font-semibold tracking-tight text-gray-900">
                                    Add social link
                                </h2>

                                <span class="hidden sm:inline-flex
                             items-center
                             px-2 py-0.5
                             rounded-full
                             bg-gray-50
                             text-[10px]
                             font-medium
                             uppercase
                             tracking-wide
                             text-gray-400
                             ring-1 ring-inset ring-gray-200">
                                    Profile
                                </span>
                            </div>

                            <p class="mt-1 text-sm leading-5 text-gray-500">
                                Connect a social profile to your account.
                            </p>
                        </div>

                    </div>

                    <button type="button" onclick="closeSocialModal()" class="w-8 h-8 shrink-0
                   flex items-center justify-center
                   rounded-lg
                   border border-transparent
                   text-gray-400
                   hover:text-gray-700
                   hover:bg-gray-100
                   hover:border-gray-200
                   active:scale-95
                   transition-all duration-150" aria-label="Close">
                        <i class="fas fa-times text-sm"></i>
                    </button>

                </div>
            </div>


            {{-- Form --}}
            <form action="{{ route('socials.store') }}" method="POST" onclick="event.stopPropagation()">
                @csrf

                {{-- Modal Body --}}
                <div class="px-6 py-5">

                    {{-- Main Fields --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                        {{-- Platform --}}
                        <div>
                            <label for="platform" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Platform
                            </label>

                            <select name="platform" id="platform" required class="w-full h-10 px-3 rounded-lg
                           border border-gray-200
                           bg-white
                           text-sm text-gray-900
                           focus:outline-none
                           focus:border-indigo-500
                           focus:ring-2 focus:ring-indigo-500/10
                           transition">
                                <option value="">Select platform</option>

                                <option value="linkedin">LinkedIn</option>
                                <option value="github">GitHub</option>
                                <option value="twitter">Twitter / X</option>
                                <option value="facebook">Facebook</option>
                                <option value="instagram">Instagram</option>
                                <option value="youtube">YouTube</option>
                                <option value="tiktok">TikTok</option>
                                <option value="discord">Discord</option>
                                <option value="telegram">Telegram</option>
                                <option value="reddit">Reddit</option>
                                <option value="twitch">Twitch</option>
                                <option value="snapchat">Snapchat</option>
                                <option value="pinterest">Pinterest</option>
                                <option value="threads">Threads</option>
                                <option value="website">Personal Website</option>
                                <option value="other">Other</option>
                            </select>
                        </div>


                        {{-- Username --}}
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Username
                            </label>

                            <input type="text" name="username" id="username" placeholder="@username"
                                value="{{ old('username') }}" class="w-full h-10 px-3 rounded-lg
                           border border-gray-200
                           bg-white
                           text-sm text-gray-900
                           placeholder:text-gray-400
                           focus:outline-none
                           focus:border-indigo-500
                           focus:ring-2 focus:ring-indigo-500/10
                           transition">
                        </div>


                        {{-- Profile URL --}}
                        <div class="sm:col-span-2">
                            <label for="url" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Profile URL
                            </label>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fa-solid fa-link text-gray-400 text-sm"></i>
                                </div>

                                <input type="url" name="url" id="url" required
                                    placeholder="https://example.com/username" value="{{ old('url') }}" class="w-full h-10 pl-9 pr-3 rounded-lg
                               border border-gray-200
                               bg-white
                               text-sm text-gray-900
                               placeholder:text-gray-400
                               focus:outline-none
                               focus:border-indigo-500
                               focus:ring-2 focus:ring-indigo-500/10
                               transition">
                            </div>
                        </div>


                        {{-- Display Label --}}
                        <div class="sm:col-span-2">
                            <label for="label" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Display Label
                                <span class="text-gray-400 font-normal">(optional)</span>
                            </label>

                            <input type="text" name="label" id="label" placeholder="My GitHub"
                                value="{{ old('label') }}" class="w-full h-10 px-3 rounded-lg
                           border border-gray-200
                           bg-white
                           text-sm text-gray-900
                           placeholder:text-gray-400
                           focus:outline-none
                           focus:border-indigo-500
                           focus:ring-2 focus:ring-indigo-500/10
                           transition">
                        </div>

                    </div>


                    {{-- Icon Selection --}}
                    <div class="mt-6">

                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Profile Icon
                                </label>

                                <p class="text-xs text-gray-400 mt-0.5">
                                    Choose an icon for this profile.
                                </p>
                            </div>

                            {{-- Current Icon --}}
                            <div id="selectedIconPreview" class="flex items-center gap-2 px-2.5 py-1.5
                           rounded-lg border border-gray-200
                           bg-gray-50">
                                <div id="selectedIconBox" class="w-7 h-7 rounded-md
                               bg-white border border-gray-200
                               flex items-center justify-center
                               text-indigo-600">
                                    <i id="selectedIconElement" class="fa-solid fa-link text-sm"></i>
                                </div>

                                <span id="selectedIconText" class="text-xs font-medium text-gray-500">
                                    None selected
                                </span>
                            </div>
                        </div>


                        {{-- Hidden Icon Value --}}
                        <input type="hidden" name="icon" id="selectedIcon" value="{{ old('icon') }}">

                        {{-- Icon Grid --}}
                        <div class="grid grid-cols-6 sm:grid-cols-9 gap-2
           p-3 rounded-xl
           border border-gray-200
           bg-gray-50/70">

                            {{-- LinkedIn --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-linkedin', 'LinkedIn')"
                                data-icon="fa-brands fa-linkedin" aria-label="LinkedIn" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-linkedin"></i>
                            </button>


                            {{-- GitHub --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-github', 'GitHub')"
                                data-icon="fa-brands fa-github" aria-label="GitHub" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-github"></i>
                            </button>


                            {{-- X --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-x-twitter', 'Twitter / X')"
                                data-icon="fa-brands fa-x-twitter" aria-label="Twitter / X" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-x-twitter"></i>
                            </button>


                            {{-- Facebook --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-facebook', 'Facebook')"
                                data-icon="fa-brands fa-facebook" aria-label="Facebook" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-facebook"></i>
                            </button>


                            {{-- Instagram --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-instagram', 'Instagram')"
                                data-icon="fa-brands fa-instagram" aria-label="Instagram" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-instagram"></i>
                            </button>


                            {{-- YouTube --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-youtube', 'YouTube')"
                                data-icon="fa-brands fa-youtube" aria-label="YouTube" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-youtube"></i>
                            </button>


                            {{-- TikTok --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-tiktok', 'TikTok')"
                                data-icon="fa-brands fa-tiktok" aria-label="TikTok" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-tiktok"></i>
                            </button>


                            {{-- Discord --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-discord', 'Discord')"
                                data-icon="fa-brands fa-discord" aria-label="Discord" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-discord"></i>
                            </button>


                            {{-- Telegram --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-telegram', 'Telegram')"
                                data-icon="fa-brands fa-telegram" aria-label="Telegram" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-telegram"></i>
                            </button>


                            {{-- Reddit --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-reddit', 'Reddit')"
                                data-icon="fa-brands fa-reddit" aria-label="Reddit" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-reddit"></i>
                            </button>


                            {{-- Twitch --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-twitch', 'Twitch')"
                                data-icon="fa-brands fa-twitch" aria-label="Twitch" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-twitch"></i>
                            </button>


                            {{-- Snapchat --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-snapchat', 'Snapchat')"
                                data-icon="fa-brands fa-snapchat" aria-label="Snapchat" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-snapchat"></i>
                            </button>


                            {{-- Pinterest --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-pinterest', 'Pinterest')"
                                data-icon="fa-brands fa-pinterest" aria-label="Pinterest" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-pinterest"></i>
                            </button>


                            {{-- Threads --}}
                            <button type="button" onclick="selectSocialIcon('fa-brands fa-threads', 'Threads')"
                                data-icon="fa-brands fa-threads" aria-label="Threads" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-brands fa-threads"></i>
                            </button>


                            {{-- Website --}}
                            <button type="button" onclick="selectSocialIcon('fa-solid fa-globe', 'Website')"
                                data-icon="fa-solid fa-globe" aria-label="Website" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-solid fa-globe"></i>
                            </button>


                            {{-- Link --}}
                            <button type="button" onclick="selectSocialIcon('fa-solid fa-link', 'Link')"
                                data-icon="fa-solid fa-link" aria-label="Link" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-solid fa-link"></i>
                            </button>


                            {{-- Profile --}}
                            <button type="button" onclick="selectSocialIcon('fa-solid fa-user', 'Profile')"
                                data-icon="fa-solid fa-user" aria-label="Profile" class="social-icon-option
               w-10 h-10
               flex items-center justify-center
               rounded-lg
               border border-gray-200
               bg-white
               text-gray-500
               text-base
               cursor-pointer
               transition-all duration-150
               hover:border-indigo-300
               hover:bg-indigo-50
               hover:text-indigo-600
               hover:shadow-sm
               active:scale-95
               focus:outline-none
               focus:ring-2
               focus:ring-indigo-500/20
               [&.selected]:border-indigo-500
               [&.selected]:bg-indigo-50
               [&.selected]:text-indigo-600
               [&.selected]:shadow-sm">
                                <i class="fa-solid fa-user"></i>
                            </button>

                        </div>
                    </div>

                </div>


                {{-- Actions --}}
                <div class="flex items-center justify-end gap-2
               px-6 py-4
               border-t border-gray-100
               bg-gray-50/50">

                    <button type="button" onclick="closeSocialModal()" class="h-9 px-4 rounded-lg
                   text-sm font-medium
                   text-gray-600
                   hover:bg-gray-100
                   hover:text-gray-900
                   transition">
                        Cancel
                    </button>

                    <button type="submit" class="h-9 px-4 rounded-lg
                   bg-indigo-600
                   text-white
                   text-sm font-medium
                   shadow-sm
                   hover:bg-indigo-700
                   active:bg-indigo-800
                   transition
                   focus:outline-none
                   focus:ring-2
                   focus:ring-indigo-500/30">
                        <i class="fa-solid fa-plus mr-1.5 text-xs"></i>
                        Save Link
                    </button>

                </div>

            </form>

            <script>
                function selectSocialIcon(icon, name) {
    const input = document.getElementById('selectedIcon');
    const iconElement = document.getElementById('selectedIconElement');
    const iconText = document.getElementById('selectedIconText');

    if (!input || !iconElement || !iconText) {
        return;
    }

    input.value = icon;

    iconElement.className = icon + ' text-sm';

    iconText.textContent = name;
    iconText.classList.remove('text-gray-400');
    iconText.classList.add('text-gray-600');

    document
        .querySelectorAll('.social-icon-option')
        .forEach(button => {
            button.classList.remove('selected');
        });

    const selectedButton = document.querySelector(
        `.social-icon-option[data-icon="${CSS.escape(icon)}"]`
    );

    if (selectedButton) {
        selectedButton.classList.add('selected');
    }
}


document.addEventListener('DOMContentLoaded', function () {

    const savedIcon = document.getElementById('selectedIcon')?.value;

    if (!savedIcon) {
        return;
    }

    const selectedButton = document.querySelector(
        `.social-icon-option[data-icon="${CSS.escape(savedIcon)}"]`
    );

    if (selectedButton) {
        selectSocialIcon(
            savedIcon,
            selectedButton.getAttribute('aria-label')
        );
    }

});
            </script>



            <style>
                .social-icon-option {
                    width: 42px;
                    height: 42px;

                    display: flex;
                    align-items: center;
                    justify-content: center;

                    border: 1px solid #e5e7eb;
                    border-radius: 8px;

                    background: #ffffff;
                    color: #6b7280;

                    font-size: 16px;

                    transition:
                        background-color 0.15s ease,
                        border-color 0.15s ease,
                        color 0.15s ease,
                        transform 0.15s ease;
                }

                .social-icon-option:hover {
                    background: #f9fafb;
                    border-color: #d1d5db;
                    color: #111827;
                }

                .social-icon-option.selected {
                    background: #eef2ff;
                    border-color: #6366f1;
                    color: #4f46e5;
                }

                .social-icon-option:active {
                    transform: scale(0.95);
                }
            </style>


            <script>
                function selectSocialIcon(icon, name) {

        // Store Font Awesome class
        document.getElementById('selectedIcon').value = icon;


        // Update preview
        const iconElement = document.getElementById('selectedIconElement');
        const iconText = document.getElementById('selectedIconText');

        iconElement.className = icon;
        iconText.textContent = name;


        // Remove previous selection
        document.querySelectorAll('.social-icon-option').forEach(button => {
            button.classList.remove('selected');
        });


        // Highlight selected icon
        const selectedButton = document.querySelector(
            `.social-icon-option[data-icon="${icon}"]`
        );

        if (selectedButton) {
            selectedButton.classList.add('selected');
        }

    }


    // Restore old icon after validation error
    document.addEventListener('DOMContentLoaded', function () {

        const savedIcon = document.getElementById('selectedIcon')?.value;

        if (!savedIcon) {
            return;
        }

        const selectedButton = document.querySelector(
            `.social-icon-option[data-icon="${savedIcon}"]`
        );

        if (selectedButton) {

            const name = selectedButton.getAttribute('aria-label');

            selectSocialIcon(savedIcon, name);

        }

    });

            </script>

        </div>

    </div>

</div>


<script>
    function openSocialModal() {

        const modal = document.getElementById('socialModal');
        const backdrop = document.getElementById('socialModalBackdrop');
        const panel = document.getElementById('socialModalPanel');

        modal.classList.remove('hidden');

        document.body.classList.add('overflow-hidden');

        requestAnimationFrame(() => {

            backdrop.classList.remove('opacity-0');

            panel.classList.remove(
                'translate-y-full',
                'sm:scale-95',
                'opacity-0'
            );

        });
    }


    function closeSocialModal() {

        const modal = document.getElementById('socialModal');
        const backdrop = document.getElementById('socialModalBackdrop');
        const panel = document.getElementById('socialModalPanel');

        backdrop.classList.add('opacity-0');

        panel.classList.add(
            'translate-y-full',
            'sm:scale-95',
            'opacity-0'
        );

        setTimeout(() => {

            modal.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');

        }, 200);
    }


    // Close when clicking anywhere outside the modal panel
    function handleSocialModalClick(event) {

        const panel = document.getElementById('socialModalPanel');

        if (!panel.contains(event.target)) {
            closeSocialModal();
        }
    }


    function toggleSocialMenu(id) {

        const menu = document.getElementById('social-menu-' + id);

        document.querySelectorAll('[id^="social-menu-"]').forEach(item => {

            if (item !== menu) {
                item.classList.add('hidden');
            }

        });

        menu.classList.toggle('hidden');
    }


    // Close menus when clicking elsewhere
    document.addEventListener('click', function(event) {

        if (!event.target.closest('.relative')) {

            document.querySelectorAll('[id^="social-menu-"]').forEach(menu => {
                menu.classList.add('hidden');
            });

        }

    });


    // ESC closes modal
    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {
            closeSocialModal();
        }

    });

</script>
