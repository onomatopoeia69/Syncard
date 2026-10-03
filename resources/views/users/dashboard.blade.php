@extends('layouts.user-layout')

@section('title','Home')

@section('head-script')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/driver.js@latest/dist/driver.js.iife.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@latest/dist/driver.css" />
<script src="https://unpkg.com/lucide@latest"></script>
@endsection

@section('body-class', "bg-gray-50 text-gray-900 text-xl")

@section('content')

<div class="ml-5 transition-all duration-300">

    <div class="min-h-screen bg-gray-50">

        <livewire:user.dashboard>

      </div>


        <div class="toast-container position-fixed  bottom-0 end-0 p-3" style="z-index: 1055;">

            @if (session('welcome'))

            <x-toast color="success" id='liveToast' text="white" time="{{session('time')}}">
                {{session('welcome')}} {{Auth::user()->first_name}}
            </x-toast>

            @endif

            @if (session()->has('emailVerified') && session('emailVerified') == false)
            <x-toast color="danger" id="emailToast" text="white" time="{{ session('time') }}">
                Please verify your email.
                <div class="mt-2 pt-2 border-top">
                    <x-buttons color="warning" size="sm" href="{{route('users.verify')}}">Take action</x-buttons>
                    <x-buttons color="secondary" size="sm">Close</x-buttons>
                </div>
            </x-toast>
            @endif

        </div>



        @section('body-script')

        <script>
        lucide.createIcons();
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>

        <script>
            const dropdownBtn = document.getElementById('dropdownButton');
  const dropdownMenu = document.getElementById('dropdownMenu');

 const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('mainContent');
const sidebarToggle = document.getElementById('sidebarToggle');


    document.addEventListener('DOMContentLoaded', function () {
        var liveToast = document.getElementById('liveToast');

        if (liveToast) {
            new bootstrap.Toast(liveToast).show();
        }

        var emailToast = document.getElementById('emailToast');
        if (emailToast) {
            new bootstrap.Toast(emailToast).show();
        }
    });



  sidebarToggle.addEventListener('click', function () {

    sidebar.classList.toggle('-translate-x-full');

    mainContent.classList.toggle('ml-64');

});


        </script>

        @endsection

        @endsection
