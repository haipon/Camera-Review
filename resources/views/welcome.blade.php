<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LensRoute</title>

    @vite('resources/css/app.css')

</head>
<body class="bg-gray-50 min-h-screen flex flex-col relative">
    <div class="pattern-bg w-full flex flex-col flex-grow"> 
        <header class="p-6 bg-gray-50 border-b border-gray-100">
        <nav class="flex justify-between items-center max-w-7xl mx-auto mr-85">
            <a href="/" class="text-2xl font-bold text-gray-800 tracking-wide">Lens<span style="color: #A6CFD5;">Route</span></a>
            
            <nav class="flex space-x-6 font-medium text-gray-600">
                <a href="/cameras" class="hover:text-cyan-700 transition duration-150">Camera</a>
                <a href="/lenses" class="hover:text-cyan-700 transition duration-150">Lens</a>
                <a href="/accessories" class="hover:text-cyan-700 transition duration-150">Accessories</a>
            </nav>

            <div class="text-gray-600 flex">
                @auth
                    {{-- Displayed when user is logged in --}}
                    <form method="POST" action="{{ route('logout') }}" class="my-auto">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="hover:text-cyan-700 transition duration-150 font-medium">
                            Log out
                        </a>
                    </form>
                @endauth

                @guest
                    {{-- Displayed when user is logged out --}}
                    <a href="{{ route('login') }}" class="hover:text-cyan-700 transition duration-150 font-medium">Log in</a>
                    <span class="text-gray-400 mx-1">|</span>
                    <a href="{{ route('register') }}" class="hover:text-cyan-700 transition duration-150 font-medium">Register</a>
                @endguest
            </div>
        </nav>
        </header>

        <main class="flex flex-col items-center flex-grow justify-center">
            <div class="flex flex-col items-center -mt-48 ml-20">
                <h2 class="text-5xl font-extrabold text-gray-800 tracking-widest">Lens<span style="color: #A6CFD5;">Route</span></h2>
                
                <p class="mt-4 text-xl text-gray-700">Your next lens is here.</p>

                <a href="/cameras" class="mt-8 px-5 py-3 bg-cyan-600 text-white font-semibold rounded-lg shadow-lg hover:bg-cyan-700 transition duration-300 transform hover:scale-105">
                    View our cameras
                </a>
            </div>
        </main>
    </div>
</body>
</html>
