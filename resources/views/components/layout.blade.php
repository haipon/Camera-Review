<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Page | LensRoute</title>

    @vite('resources/css/app.css')
</head>
<body class="pattern-bg min-h-screen">
    <header class="p-6 border-b border-gray-100">
        <nav class="flex justify-between items-center max-w-7xl mx-auto mr-82">
            {{-- Logo: LensRoute --}}
            <a href="/" class="text-2xl font-bold text-gray-800 tracking-wide">Lens<span style="color: #A6CFD5;">Route</span></a>

            {{-- Main Navigation Links --}}
            <nav class="flex space-x-6 font-medium text-gray-600">
                <a href="/cameras" class="hover:text-cyan-700 transition duration-150">Camera</a>
                <a href="/lenses" class="hover:text-cyan-700 transition duration-150">Lens</a>
                <a href="/accessories" class="hover:text-cyan-700 transition duration-150">Accessories</a>
            </nav>

            <div class="text-gray-600">
                <a href="/login" class="hover:text-cyan-700 transition duration-150">Log in</a>
            </div>
        </nav>
    </header>

    {{-- Main Content Area --}}
    <main class="max-w-7xl mx-auto px-6 py-12">
        {{ $slot }}
    </main>

</body>
</html>