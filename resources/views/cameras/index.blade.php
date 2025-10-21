
<x-layout>

    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Cameras</h1>
        <p class="text-gray-600">Explore our collection of cameras you can review.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($cameras as $camera)
            <x-card :camera="$camera" />
        @endforeach
    </div>

    <div class="mt-12"> 
        {{ $cameras->links() }}
    </div>
</x-layout>