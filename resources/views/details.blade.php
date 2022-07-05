@extends("layouts.app")

@section("content")
    <x-header />
    <div class="flex justify-center my-10 w-screen min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="flex w-3/4">
            <div class="flex flex-col w-4/6 h-fit p-8 mr-8 border-solid border-2 border-gray-300">
                <div class="text-2xl">{{$listing["title"]}}</div>
                <div class="text-2xl text-bold text-mainblue">R{{$listing["amount"]}}</div>
                <div class="flex justify-center items-center w-full h-96 bg-gray-300 mt-8">
                    <div class="text-3xl text-bold text-gray-800">NO IMAGE AVAILABLE</div>
                </div>
                <div class="text-gray-500 mt-8">{{$listing["description"]}}</div>
            </div>
            <div class="flex flex-col w-2/6 h-fit">
                @livewire("contact-section", ["listingId" => $listing["id"]])
                <div class="border-solid border-2 border-gray-300 mt-8">
                    <div class="bg-mainblue text-maingold text-center p-2">
                        Contact Details
                    </div>
                    <div class="p-4 text-sm">
                        <div>
                            Email: {{$listing["email"]}}
                        </div>
                        <div>
                            Mobile: {{$listing["mobile"] ? $listing["mobile"] : "No mobile number available"}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection