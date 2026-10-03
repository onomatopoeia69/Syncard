@extends('layouts.user-layout')

@section('title','Home')

@section('head-script')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/driver.js@latest/dist/driver.js.iife.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@latest/dist/driver.css" />
<script src="https://unpkg.com/lucide@latest"></script>
@endsection

@section('body-class', "bg-gray-50 text-gray-900 text-xl")

@section('content')

<div class="ml-5 transition-all duration-300">

    <div class="min-h-screen bg-gray-50">


        <livewire:user.child>


      </div>

        @section('body-script')

         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
         <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <script>
         document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();
        });

        document.addEventListener('livewire:initialized', () => {
            lucide.createIcons();

            Livewire.hook('morph.updated', () => {
                lucide.createIcons();
            });
        }); 

       

        </script>


        <script>
            const dropdownBtn = document.getElementById('dropdownButton');
          const dropdownMenu = document.getElementById('dropdownMenu');

        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarToggle = document.getElementById('sidebarToggle');

          sidebarToggle.addEventListener('click', function () {

            sidebar.classList.toggle('-translate-x-full');

            mainContent.classList.toggle('ml-64');

        });


        </script>

@endsection

@endsection
