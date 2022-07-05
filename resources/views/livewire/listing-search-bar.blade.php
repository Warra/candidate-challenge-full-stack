<div class="flex flex-col sm:flex-row justify-center items-center w-full">
    <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-2/4 border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm ml-0" placeholder="Search Listings..." type="text" wire:model="query" />
    <select wire:model="categorySelected" class="placeholder:italic placeholder:text-slate-400 block bg-white w-2/4 md:w-1/4 border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm md:ml-2 mt-4 sm:mt-0">
        <option value=0>Filter by Category</option>
        @if($categories)
            @foreach($categories as $cat)
                <option value={{$cat['id']}}>{{$cat['name']}}</option>
            @endforeach
        @endif
    </select>
</div>