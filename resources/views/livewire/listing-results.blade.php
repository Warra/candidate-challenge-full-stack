<div class="my-10">
    <div class="text-2xl text-gray-500">
        @if($query === "")
            Recent Listings:
        @elseif($query && $selectedCategory)
            Search Results {{$category ? 'by '.$selectedCategory->name : ''}}:
        @elseif(count($listings) < 1)
            No listings found...
        @else
            Search Results:
        @endif
    </div>
    @if(count($listings) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 place-content-start my-10">
            @foreach($listings as $key => $listing)
                <div class="flex w-full h-50 bg-white rounded-md shadow-md z-20">
                    <a href="{{$listing['slug']}}" class="flex flex-col py-4 px-4">
                        <div class="flex text-bold text-2xl text-mainblue text-bold">{{$listing["title"]}}</div>
                        <div class="text-black text-xl">R{{$listing["amount"]}}</div>
                        <div class="flex h-full mt-4 overflow-hidden break-all font-normal text-base">{{$listing["description"]}}</div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>