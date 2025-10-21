<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Camera Page | LensRoute</title>

    @vite('resources/css/app.css')
</head>
<body class="pattern-bg min-h-screen">
    <header class="p-6 bg-gray-50 border-b border-gray-100">
        <nav class="flex justify-between items-center max-w-7xl mx-auto mr-85">
            {{-- Logo: LensRoute --}}
            <a href="/" class="text-2xl font-bold text-gray-800 tracking-wide">Lens<span style="color: #A6CFD5;">Route</span></a>

            {{-- Main Navigation Links --}}
            <nav class="flex space-x-6 font-medium text-gray-600">
                <a href="{{ route('cameras.index') }}" class="hover:text-cyan-700 transition duration-150">Camera</a>
                <a href="{{ route('lenses.index') }}" class="hover:text-cyan-700 transition duration-150">Lens</a>
                <a href="{{ route('accessories.index') }}" class="hover:text-cyan-700 transition duration-150">Accessories</a>
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

    {{-- Main Content Area --}}
    <main class="max-w-7xl mx-auto px-6 py-12">
        {{ $slot }}
    </main>

</body>
</html>