<div class="border-solid border-2 border-gray-300">
    @auth
        <div class="bg-mainblue text-maingold text-center p-2">
            Get in contact
        </div>
        <div class="p-4 text-sm">
            <div>
                <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Email" type="text" wire:model="email" />
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Mobile" type="text" wire:model="mobile" />
                @error('mobile') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div x-data={count:0} class="mt-4">
                <textarea class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Message" type="text" rows="5" wire:model="message" maxlength="300" x-ref="contactMessage" x-on:keyup="count = $refs.contactMessage.value.length"></textarea>
                @error('message') <span class="text-red-500">{{ $message }}</span> @enderror
                <span class="text-sm text-grey-300 mt-2" x-html="300 - count"></span><span>&nbsp;characters left</span>
            </div>
            <button class="inline-flex items-center mt-4 px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-maingold bg-mainblue" wire:click="saveContact({{$listingId}})">Contact Seller</button>
        </div>
        @if($saved)
            <div class="fixed top-8 right-0 bottom-0 left-0 w-screen h-screen flex flex-col justify-center items-center bg-mainblue text-maingold">
                <div class="flex text-base sm:text-2xl text-center">
                    Your details have been saved. The seller will be in contact with you shortly.
                </div>
                <div class="mt-8">
                    <button class="inline-flex items-center mt-4 px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-mainblue bg-maingold" wire:click="redirectToHome">Continue Shopping</button>
                    <button class="inline-flex items-center mt-4 px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-mainblue bg-maingold" wire:click="closeModal">Stay Here</button>
                </div>
            </div>
        @endif
    @else
        <div class="bg-mainblue text-maingold text-center p-2">
            Sign in to contact List owner
        </div>
    @endauth
</div>