@extends('layouts.app')

@section('content')
    <div class="absolute top-0 left-0 w-screen py-4 bg-mainblue z-10">
        <div class="relative flex">
            <span class="text-2xl text-maingold ml-4">ListR</span>
        </div>
        <div class="absolute top-0 right-0 mt-5 mr-8">
            @if (Route::has('login'))
                <div class="space-x-4">
                    @auth
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="font-medium text-maingold hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                        >
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-medium text-maingold hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-medium text-maingold hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <div class="flex my-10 w-screen min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="w-full flex flex-col">
            @livewire("listing-search-bar")
            @livewire("listing-results")
        </div>
    </div>
@endsection
