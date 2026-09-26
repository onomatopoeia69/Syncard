    {{-- navbar --}}
    <nav id="mainNavbar" class="navbar navbar-expand-lg nfc-navbar">
        <div class="container">
            
            {{-- logo --}}
            <div class="flex items-center space-x-4">
                <img src="/img/nfc logo.png" alt="Logo" class="h-12 w-12 rounded">
                <h1 id="product-name" class="text-2xl sm:text-3xl font-bold text-yellow-300">SyncCard</h1>
            </div>

            {{-- Mobile menu button --}}
            <button id="menu-toggle" class="text-white md:hidden focus:outline-none">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            {{-- nav bar --}}
            <ul id="nav-links" class="hidden md:flex space-x-8 text-white font-bold text-base">

                <li><a href="#products" class="hover:text-yellow-300">Products</a></li>
                <li><a href="#services" class="hover:text-yellow-300">Services</a></li>
                 <li><a href="#about" class="hover:text-yellow-300">About</a></li>
                <li><a href="#contact" class="hover:text-yellow-300">Contact Us</a></li>
                <li><a href="#" class="hover:text-yellow-300" id="loginBtn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" >Login/Signup</a></li>
            
            </ul>
        </div>

        {{-- mobile menu --}}
        {{-- <ul id="mobile-menu" class="md:hidden hidden flex-col mt-4 space-y-4 text-white font-semibold text-lg px-4">
            <li><a href="#" class="hover:text-violet-300 block">Home</a></li>
            <li><a href="#" class="hover:text-violet-300 block">Contact Us</a></li>
            <li><a href="#" class="hover:text-violet-300 block">About</a></li>
            <li><a href="#" class="hover:text-violet-300 block">Product Cart</a></li>
            <li><a href="#" class="hover:text-violet-300 block">Orders</a></li>
            <li><a href="#" class="hover:text-violet-300 block">Login</a></li>
        </ul> --}}
    </nav>
    
    {{-- livewire auth login component view. see.. views/livewire/auth/login --}}
                <livewire:auth.login />                