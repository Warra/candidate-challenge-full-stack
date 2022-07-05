<div class="flex flex-col w-full h-fit mt-24 px-24">
    <div class="border-solid border-2 border-gray-300 p-8">
        <div class="flex text-xl">
            Create Listing:
        </div>
        <div>
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Title" type="text" wire:model="title" />
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <textarea class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Message" type="text" rows="5" wire:model="message" maxlength="300"></textarea>
            @error('message') <span class="text-red-500">{{ $message }}</span> @enderror
            <div class="text-sm text-grey-300 mt-2">{{$messageCount}} characters left</div>
        </div>
        <div>
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Email" type="text" wire:model="email" />
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Email" type="text" wire:model="email" />
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Email" type="text" wire:model="email" />
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
</div>