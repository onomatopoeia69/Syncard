@extends('layouts.page-layout')

@section('title','HELP ME')

@section('head-script')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/driver.js@latest/dist/driver.js.iife.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@latest/dist/driver.css" />
<script src="https://unpkg.com/lucide@latest"></script>
@endsection

@section('body-class', "bg-gray-50 text-gray-900 text-xl")

@section('content')


<livewire:user.show-info :child="$child" :scan="$scan">

@section('body-script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>

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


@endsection

@endsection
