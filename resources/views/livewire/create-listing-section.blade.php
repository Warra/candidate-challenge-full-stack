<div class="flex flex-col w-full h-fit mt-24 px-48">
    <div class="border-solid border-2 border-gray-300 p-8">
        <div class="flex text-xl">
            Listing Details:
        </div>
        <div class="mt-4">
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-1/3 border border-slate-400 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-mainblue focus:ring-mainblue focus:ring-1 sm:text-sm" placeholder="Title" type="text" wire:model="title" />
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <textarea class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-400 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-mainblue focus:ring-mainblue focus:ring-1 sm:text-sm" placeholder="Description" type="text" rows="5" wire:model="description" maxlength="300"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            <div class="text-sm text-grey-300 mt-2">{{$descriptionCount}} characters left</div>
        </div>
        <div class="mt-4">
            <select wire:model="categorySelected" class="placeholder:italic placeholder:text-slate-400 block bg-white w-2/4 md:w-1/4 border border-slate-400 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-mainblue focus:ring-mainblue focus:ring-1 sm:text-sm">
                <option value=0>Select Category</option>
                @if($categories)
                    @foreach($categories as $cat)
                        <option value={{$cat['id']}}>{{$cat['name']}}</option>
                    @endforeach
                @endif
            </select>
            @error('categorySelected') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-1/3 border border-slate-400 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-mainblue focus:ring-mainblue focus:ring-1 sm:text-sm" placeholder="Amount" type="text" wire:model="amount" />
            @error('amount') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-1/3 border border-slate-400 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-mainblue focus:ring-mainblue focus:ring-1 sm:text-sm" placeholder="Enter date of publish - YYYY-MM-DD" type="text" wire:model="onlineAt" />
            @error('onlineAt') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-1/3 border border-slate-400 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-mainblue focus:ring-mainblue focus:ring-1 sm:text-sm" placeholder="Mobile" type="text" wire:model="mobile" />
            @error('mobile') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-1/3 border border-slate-400 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-mainblue focus:ring-mainblue focus:ring-1 sm:text-sm" placeholder="Email" type="text" wire:model="email" />
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button class="inline-flex items-center mt-4 px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-maingold bg-mainblue" wire:click="createListing">Create Listing</button>
    </div>
    @if($isCreated)
    <div class="fixed top-8 right-0 bottom-0 left-0 w-screen h-screen flex flex-col justify-center items-center bg-mainblue text-maingold">
        <div class="flex text-base sm:text-2xl text-center">
            Your listing has been created successfully!
        </div>
        <div class="mt-8">
            <button class="inline-flex items-center mt-4 px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-mainblue bg-maingold" wire:click="redirectToHome">Go back to home page</button>
            <button class="inline-flex items-center mt-4 px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-mainblue bg-maingold" wire:click="closeModal">Create another listing</button>
        </div>
    </div>
@endif
</div>