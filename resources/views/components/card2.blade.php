@props(['accessory', 'type' => 'accessories'])

@php
    // The path starts from 'images/' since files are in public/images/{type}/
    $imagePath = 'images/' . $type . '/'; 
    
    // Get the image file name from the accessory data
    // Assuming the key is 'image_name' from your seeder
    $imageFile = $accessory['image_name'] ?? 'placeholder.jpg'; 
    
    // Construct the full path (e.g., asset('images/accessories/peak_design_strap.jpg'))
    $fullImagePath = asset($imagePath . $imageFile);
@endphp

<a href="/{{ $type }}/{{ $accessory['id'] ?? '#' }}" 
   class="block p-4 border border-gray-200 rounded-lg bg-[#e0f2f1] hover:shadow-lg transition duration-200 ease-in-out">
    
    <div class="flex space-x-4 items-start">
        
        {{-- 2. IMAGE DISPLAY (REPLACING PLACEHOLDER) --}}
        <div class="w-40 h-40 flex-shrink-0">
            <img 
                src="{{ $fullImagePath }}" 
                alt="{{ $accessory['name'] ?? 'Product Image' }}"
                class="w-full h-full object-cover rounded-md border border-gray-300"
            >
        </div>

        {{-- Product Details (Right side) --}}
        <div class="flex flex-col justify-between">
            
            {{-- Product Name/Model --}}
            <h4 class="text-xl font-semibold text-gray-800 mt-0">
                {{ $accessory['name'] ?? 'Product Name' }}
            </h4>
            
            {{-- Small Description --}}
            <p class="text-sm text-gray-600 mb-1 leading-tight">
                {{ $accessory['description'] ?? 'Small Description' }}
            </p>
        </div>
    </div>
</a>