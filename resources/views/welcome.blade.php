@extends('layouts.app')

@section('content')
    <div class="flex my-10 w-screen min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="w-full flex flex-col">
            <livewire:listing-search-bar />
            <livewire:listing-results />
        </div>
    </div>
@endsection
