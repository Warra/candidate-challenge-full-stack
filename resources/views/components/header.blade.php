<div class="absolute top-0 left-0 w-screen py-4 bg-mainblue z-10">
    <div class="relative flex">
        <span class="text-2xl text-maingold ml-16">ListR</span>
    </div>
    <div class="absolute top-0 right-0 mt-5 mr-16">
        @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                    <a
                        href="{{ route('create-listing') }}"
                        class="font-medium text-maingold hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                    >
                        Create Listing
                    </a>
                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="font-medium text-maingold hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                    >
                        Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="font-medium text-maingold hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-medium text-maingold hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</div>