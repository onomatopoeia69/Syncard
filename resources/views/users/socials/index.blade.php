@extends('layouts.user-layout')

@section('title','Home')

@section('head-script')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/driver.js@latest/dist/driver.js.iife.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@latest/dist/driver.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('body-class', "bg-gray-50 text-gray-900 text-xl")

@section('content')

<div class="w-full px-6 sm:px-8 lg:px-10 py-8 lg:py-12">

    <header class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 mb-10">

        <div>
            <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight text-gray-900">
                Social Links
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Manage the profiles displayed on your account.
            </p>
        </div>
    @include('users.socials.partials._notifs')

        <button type="button" onclick="openSocialModal()" class="inline-flex items-center justify-center gap-2
                   h-10 px-4 rounded-lg
                   bg-indigo-600 text-white
                   text-sm font-medium
                   hover:bg-indigo-700
                   active:bg-indigo-800
                   transition-colors
                   focus:outline-none focus:ring-2
                   focus:ring-indigo-500/30
                   whitespace-nowrap">
            <i class="fas fa-plus text-xs"></i>
            Add Social Link
        </button>

    </header>

    @include('users.socials.partials._links_list')

</div>

@include('users.socials.partials._add_form')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
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
