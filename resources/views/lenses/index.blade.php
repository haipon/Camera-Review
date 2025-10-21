<x-layout>

    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Lenses</h1>
        <p class="text-gray-600">Explore our collection of lenses you can review.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($lenses as $lens)
            <x-card3 :lens="$lens" type="lenses" />
        @endforeach
    </div>

    <div class="mt-12"> 
        {{ $lenses->links() }}
    </div>

</x-layout>