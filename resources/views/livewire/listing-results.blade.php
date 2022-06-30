<div class="grid grid-cols-4 gap-4 place-content-start my-10">
    @foreach($listings as $key => $listing)
        <div class="flex justify-center items-center border-solid rounded-md">
            <a href="#" class="w-24 h-24">
                {{$listing["title"]}}
            </a>
        </div>
    @endforeach
</div>
