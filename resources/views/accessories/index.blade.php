<x-layout>
    
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Accessories</h1>
        <p class="text-gray-600">Explore our collection of accessories you can review.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($accessories as $accessory)
            <x-card2 :accessory="$accessory" />
        @endforeach
    </div>

    <div class="mt-12"> 
        {{ $accessories->links() }}
    </div>

</x-layout>