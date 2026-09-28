{{-- navbar --}}
<nav id="mainNavbar" class="navbar navbar-expand-lg nfc-navbar">

    <div class="container relative">

        {{-- logo --}}
        <div class="flex items-center space-x-4">
            <img src="/img/nfc logo.png" alt="Logo" class="h-12 w-12 rounded">

            <h1 id="product-name" class="text-2xl sm:text-3xl font-bold text-yellow-300">
                SyncCard
            </h1>
        </div>


        {{-- Mobile menu button --}}
        <button id="menu-toggle" type="button" class="text-white md:hidden focus:outline-none" aria-label="Toggle menu" aria-expanded="false">
            <svg id="menu-open-icon" class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16"/>
            </svg>

            <svg id="menu-close-icon" class="h-8 w-8 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 6l12 12M6 18L18 6"/>
            </svg>
        </button>


        {{-- Desktop nav --}}
        <ul id="nav-links" class="hidden md:flex space-x-8 text-white font-bold text-base">

            <li>
                <a href="#products" class="hover:text-yellow-300">
                    Products
                </a>
            </li>

            <li>
                <a href="#services" class="hover:text-yellow-300">
                    Services
                </a>
            </li>

            <li>
                <a href="#about" class="hover:text-yellow-300">
                    About
                </a>
            </li>

            <li>
                <a href="#contact" class="hover:text-yellow-300">
                    Contact Us
                </a>
            </li>

            <li>
                <a href="#" class="hover:text-yellow-300" id="loginBtn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                    Login/Signup
                </a>
            </li>

        </ul>

    </div>


    {{-- mobile menu --}}
    <div id="mobile-menu" class="md:hidden">

        <ul class="flex flex-col text-white font-semibold">

            <li>
                <a href="#products" class="mobile-nav-link">
                    Products
                </a>
            </li>

            <li>
                <a href="#services" class="mobile-nav-link">
                    Services
                </a>
            </li>

            <li>
                <a href="#about" class="mobile-nav-link">
                    About
                </a>
            </li>

            <li>
                <a href="#contact" class="mobile-nav-link">
                    Contact Us
                </a>
            </li>

            <li>
                <a href="#" class="mobile-nav-link" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                    Login/Signup
                </a>
            </li>

        </ul>

    </div>

</nav>


{{-- livewire auth login component --}}
<livewire:auth.login />


<script>
    
document.addEventListener('DOMContentLoaded', function () {

    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    const openIcon = document.getElementById('menu-open-icon');
    const closeIcon = document.getElementById('menu-close-icon');


    if (!menuToggle || !mobileMenu) {
        return;
    }

    // toggle
    menuToggle.addEventListener('click', function (event) {

        event.preventDefault();
        event.stopPropagation();

        const isOpen =
            mobileMenu.classList.contains('is-open');


        if (isOpen) {

            closeMenu();

        } else {

            openMenu();

        }

    });


    
    // open menu
    function openMenu() {

        mobileMenu.classList.add('is-open');

        menuToggle.setAttribute(
            'aria-expanded',
            'true'
        );

        menuToggle.setAttribute(
            'aria-label',
            'Close menu'
        );

        openIcon.classList.add('hidden');

        closeIcon.classList.remove('hidden');

    }


    // close
    function closeMenu() {

        mobileMenu.classList.remove('is-open');

        menuToggle.setAttribute(
            'aria-expanded',
            'false'
        );

        menuToggle.setAttribute(
            'aria-label',
            'Open menu'
        );

        closeIcon.classList.add('hidden');

        openIcon.classList.remove('hidden');

    }


    // CLOSE AFTER CLICKING A LINK
    const mobileLinks =
        mobileMenu.querySelectorAll('.mobile-nav-link');


    mobileLinks.forEach(function (link) {

        link.addEventListener('click', function () {

            closeMenu();

        });

    });


    
    // close when clicking outside
    document.addEventListener('click', function (event) {

        if (
            !mobileMenu.contains(event.target) &&
            !menuToggle.contains(event.target)
        ) {

            closeMenu();

        }

    });


    // close with esc
    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            closeMenu();

        }

    });


    // close when resizing desktop
    window.addEventListener('resize', function () {

        if (window.innerWidth >= 768) {

            closeMenu();

        }

    });

});
</script>