<x-front-guest-layout>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900&display=swap" rel="stylesheet">

    <main class="bg-white font-montserrat">
        <header class="h-24 sm:h-32 flex items-center">
            <div class="container mx-auto px-6 sm:px-12 flex items-center justify-between">
                <div class="text-black font-black text-2xl flex items-center">
                    <span class="w-6 h-6 rounded-full bg-blue-500 mr-4"></span> Vidyasagar University
                </div>
                <div class="flex items-center">
                    <nav class="text-black text-lg hidden lg:flex items-center">

                        @if(Route::has('admin.login'))
                                <a href="{{ route('admin.login') }}" class="py-2 px-6 flex hover:text-blue-500">Admin</a>

                        @endif

                        @if (Route::has('login'))
                            @auth('front')
                                <a href="{{ url('/dashboard') }}" class="py-2 px-6 flex hover:text-blue-500">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="py-2 px-6 flex hover:text-blue-500">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 py-2 px-6 flex hover:text-blue-500">Register</a>
                                @endif
                            @endauth
                        @endif
                    </nav>
                    <button class="lg:hidden flex flex-col">
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                    </button>
                </div>
            </div>
        </header>
        <div class="container mx-auto px-6 sm:px-12 flex flex-col-reverse sm:flex-row items-center">
            <div class="sm:w-2/5 flex flex-col items-start mt-8 sm:mt-0">
                <h1 class="text-4xl lg:text-6xl leading-none mb-4"><strong class="font-black">Vidyasagar University</strong> </h1>
                <p class="lg:text-lg mb-4 sm:mb-12">Welcome to Vidyasagar University</p>
                <a href="#" class="font-semibold text-lg bg-blue-500 hover:bg-blue-400 text-white py-3 px-10 rounded-full">vidyasagar.ac.in</a>
            </div>
           {{-- roted image --}}
        </div>
    </main>







</x-front-guest-layout>
