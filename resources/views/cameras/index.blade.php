
<x-layout>

    <h2>Currently Available Cameras</h2>
    <ul>
        @foreach ($cameras as $camera)
            <li>
                <x-card href="/cameras/{{ $camera['id'] }}" highlight="{{ $camera['is_featured'] }}">
                    <h3>{{ $camera['name'] }}</h3>
                </x-card>
            </li>
        @endforeach
    </ul>
</x-layout>