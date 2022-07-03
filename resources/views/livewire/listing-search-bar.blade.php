<div class="flex flex-col sm:flex-row justify-center w-full">
    <input type="text" class="form-input" placeholder="Search Listings..." wire:model="query" />
    <select wire:model="categorySelected" class="mt-4 sm:mt-0">
        <option value=0>Filter by Category</option>
        @if($categories)
            @foreach($categories as $cat)
                <option value={{$cat['id']}}>{{$cat['name']}}</option>
            @endforeach
        @endif
    </select>
</div>