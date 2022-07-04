@extends('layouts.app')

@section('content')
    <x-header />
    <div class="flex justify-center my-10 w-screen min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="flex w-3/4">
            <div class="flex flex-col w-4/6 h-fit p-8 mr-8 border-solid border-2 border-gray-300">
                <div class="text-2xl">{{$listing['title']}}</div>
                <div class="text-2xl text-bold text-mainblue">R{{$listing['amount']}}</div>
                <div class="flex justify-center items-center w-full h-96 bg-gray-300 mt-8">
                    <div class="text-3xl text-bold text-gray-800">NO IMAGE AVAILABLE</div>
                </div>
                <div class="text-gray-500 mt-8">{{$listing['description']}}</div>
            </div>
            <div class="flex flex-col w-2/6 h-fit">
                <div class="border-solid border-2 border-gray-300">
                    <div class="bg-mainblue text-maingold text-center p-2">
                        Get in contact
                    </div>
                    <div class="p-4 text-sm">
                        <div>
                            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Email" type="text" />
                        </div>
                        <div class="mt-4">
                            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Mobile" type="text" />
                        </div>
                        <div class="mt-4">
                            <textarea class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Message" type="text"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-solid border-2 border-gray-300 mt-8">
                    <div class="bg-mainblue text-maingold text-center p-2">
                        Contact Details
                    </div>
                    <div class="p-4 text-sm">
                        <div>
                            Email: {{$listing['email']}}
                        </div>
                        <div>
                            Mobile: {{$listing['mobile'] ? $listing['mobile'] : 'No mobile number available'}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection