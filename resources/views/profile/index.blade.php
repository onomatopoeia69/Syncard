@extends('layouts.user-layout')

@section('title', 'Profiles')

@section('head-script')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/driver.js@latest/dist/driver.js.iife.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@latest/dist/driver.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">

@endsection

@section('body-class', 'bg-gray-50 text-gray-900')

@section('content')

<div class="min-h-screen bg-gray-100 px-4 py-6 sm:px-6 lg:px-8">

    <div class="mx-auto w-full max-w-7xl">

        {{-- Page Header --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                Profiles
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Manage public profiles and NFC profile information.
            </p>

        </div>
        @include('profile.partials._notifs')


        {{-- Table Card --}}
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            {{-- Table Header --}}
            <div
                class="flex flex-col gap-4 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">

                <div>
                    <h2 class="text-base font-semibold text-gray-900">
                        All Profiles
                    </h2>

                    <p class="mt-1 text-xs text-gray-500">
                        Showing
                        {{ $profiles->firstItem() ?? 0 }}
                        to
                        {{ $profiles->lastItem() ?? 0 }}
                        of
                        {{ $profiles->total() }}
                        {{ $profiles->total() === 1 ? 'profile' : 'profiles' }}
                    </p>
                </div>


                {{-- Create Button --}}
                <button type="button"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-100 sm:w-auto"
                    data-bs-toggle="modal" data-bs-target="#createProfileModal">

                    <i class="fas fa-plus"></i>

                    Create Profile

                </button>

            </div>


            {{-- Responsive Table --}}
            <div class="w-full overflow-x-auto">

                <table class="w-full min-w-[850px] text-left text-sm">

                    <thead class="border-b border-gray-200 bg-gray-50">

                        <tr>

                            <th class="whitespace-nowrap px-6 py-4 font-semibold text-gray-600">
                                Profile
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 font-semibold text-gray-600">
                                Username
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 font-semibold text-gray-600">
                                Job Title
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 font-semibold text-gray-600">
                                Business / Organization
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 font-semibold text-gray-600">
                                NFC Link
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 font-semibold text-gray-600">
                                Created
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-right font-semibold text-gray-600">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse ($profiles as $profile)

                        <tr class="transition hover:bg-gray-50">

                            {{-- Profile --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-100 font-semibold text-indigo-600">

                                        {{ strtoupper(substr($profile->user->name ?? 'U', 0, 1)) }}

                                    </div>

                                    <div class="min-w-0">

                                        <p class="truncate font-semibold text-gray-900">
                                            {{ $profile->user->name ?? 'Unknown User' }}
                                        </p>

                                        <p class="truncate text-xs text-gray-500">
                                            {{ $profile->user->email ?? 'No email' }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- Username --}}
                            <td class="px-6 py-4">

                                <span class="whitespace-nowrap font-medium text-indigo-600">
                                    /u/{{ $profile->username }}
                                </span>

                            </td>


                            {{-- Job Title --}}
                            <td class="px-6 py-4">

                                <span class="text-gray-700">
                                    {{ $profile->job_title ?: '—' }}
                                </span>

                            </td>


                            {{-- Business --}}
                            <td class="px-6 py-4">

                                <span class="text-gray-700">
                                    {{ $profile->company ?: '—' }}
                                </span>

                            </td>

                            {{-- NFC Link --}}
                            <td class="px-6 py-4">

                                <a href="{{ route('profile.public', $profile->username) }}" target="_blank"
                                    class="inline-flex items-center gap-2 rounded-lg bg-indigo-50 px-3 py-2 text-xs font-semibold text-indigo-600 transition hover:bg-indigo-100">

                                    <i class="fas fa-link"></i>

                                    Open Profile

                                </a>

                                <p class="mt-1 max-w-[220px] truncate text-xs text-gray-400">
                                    {{ url('/u/' . $profile->username) }}
                                </p>

                            </td>


                            {{-- Created --}}
                            <td class="whitespace-nowrap px-6 py-4 text-gray-500">

                                {{ $profile->created_at?->format('M d, Y') }}

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    {{-- View --}}
                                    <button type="button" title="View Profile"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-500"
                                        data-bs-toggle="modal" data-bs-target="#viewProfile{{ $profile->id }}">

                                        <i class="fas fa-eye text-sm"></i>

                                    </button>


                                    {{-- Edit --}}
                                    <button type="button" title="Edit Profile"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-500 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600"
                                        data-bs-toggle="modal" data-bs-target="#editProfile{{ $profile->id }}">

                                        <i class="fas fa-pen text-sm"></i>

                                    </button>

                                    {{-- Delete --}}
                                    <button type="button" title="Delete Profile"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-500 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600"
                                        data-bs-toggle="modal" data-bs-target="#deleteProfile{{ $profile->id }}">

                                        <i class="fas fa-trash text-sm"></i>

                                    </button>

                                </div>

                            </td>

                        </tr>
                        @include('profile.edit')
                        @include('profile.delete')


                        @empty

                        <tr>

                            <td colspan="6" class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center justify-center">

                                    <div
                                        class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-gray-100 text-gray-400">

                                        <i class="fas fa-users text-xl"></i>

                                    </div>

                                    <h3 class="text-sm font-semibold text-gray-900">
                                        No profiles found
                                    </h3>

                                    <p class="mt-1 max-w-sm text-sm text-gray-500">
                                        Create your first profile to get started.
                                    </p>

                                    <button type="button"
                                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-100 sm:w-auto"
                                        data-bs-toggle="modal" data-bs-target="#createProfileModal">

                                        <i class="fas fa-plus"></i>

                                        Create Profile

                                    </button>

                                </div>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if ($profiles->hasPages())

            <div class="border-t border-gray-200 bg-white px-5 py-4 sm:px-6">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    {{-- Pagination Information --}}
                    <p class="text-sm text-gray-500">

                        Page
                        <span class="font-medium text-gray-700">
                            {{ $profiles->currentPage() }}
                        </span>

                        of

                        <span class="font-medium text-gray-700">
                            {{ $profiles->lastPage() }}
                        </span>

                    </p>


                    {{-- Pagination Links --}}
                    <div class="overflow-x-auto">

                        {{ $profiles->onEachSide(1)->links() }}

                    </div>

                </div>

            </div>

            @endif

        </div>

    </div>

</div>
@endsection

@section('body-script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    const userSelect = document.getElementById('profileUser');

    if (userSelect) {
        new TomSelect(userSelect, {
            create: false,
            maxOptions: null,
            allowEmptyOption: true,
            placeholder: 'Search and select a user...',
            searchField: ['text']
        });
    }

});
</script>
@endsection

@include('profile.create')
@include('profile.view')
