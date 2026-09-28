<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>

<aside id="sidebar"
    class="fixed top-0 left-0 z-60 w-64 h-screen bg-white border-r border-gray-200 transition-transform">

    <div class="h-full px-4 py-6 overflow-y-auto">

        <div class="flex items-center gap-3 px-3 mb-8">
            <div class="w-10 h-10 rounded-lg bg-yellow-500 text-white
                            flex items-center justify-center">
               <i class="bi bi-credit-card-2-front"></i>
            </div>

            <div>
                <h1 class="font-bold text-sm">
                    SyncCard
                </h1>
                <p class="text-xs text-gray-500">
                    Admin
                </p>
            </div>
        </div>


        {{-- taasan --}}
        <nav class="space-y-2">

            <a href="{{ route('users.dashboard') }}" wire:current="font-bold text-yellow-500" class="flex items-center gap-3 px-4 py-3 rounded-lg
                                hover:bg-gray-100 font-semibold text-sm">
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>

            <a href="#"  class="flex items-center gap-3 px-4 py-3 rounded-lg
                          text-gray-600 hover:bg-gray-100 text-sm">
                <i class="bi bi-receipt"></i>
                <span>My Orders</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg
                          text-gray-600 hover:bg-gray-100 text-sm">
                <i class="bi bi-heart"></i>
                <span>Wishlist</span>
            </a>

            <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg
                          text-gray-600 hover:bg-gray-100 text-sm">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>

            <a href="{{ route('socials.index') }}" wire:current="font-bold text-yellow-500" class="flex items-center gap-3 px-4 py-3 rounded-lg
          text-gray-600 hover:bg-gray-100 text-sm">
                <i class="bi bi-share"></i>
                <span>Socials</span>
            </a>

        </nav>


        <!-- ibabang bahagi -->
        <div class="absolute bottom-6 left-4 right-4">

             <a href="{{ route('users.children') }}" wire:current="font-bold text-yellow-500"  class="w-full flex items-center gap-3 px-4 py-3
                                   rounded-lg text-gray-600 hover:bg-gray-100 text-sm">
             <i class="bi bi-person-arms-up"></i>
                <span>Child Lost</span>
            </a>



            <form method="POST" action="/logout">
                @csrf

                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3
                                   rounded-lg text-red-600 hover:bg-red-50 text-sm">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>

        </div>



    </div>
</aside>
