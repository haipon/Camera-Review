<x-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="relative h-96 mb-8 shadow-lg rounded-lg overflow-hidden">
            <img src="{{ asset('images/slideshows/japan1.jpg') }}" class="absolute w-full h-full object-cover rounded-lg opacity-100 slide" />
            <img src="{{ asset('images/slideshows/japan2.jpg') }}" class="absolute w-full h-full object-cover rounded-lg opacity-0 slide" />
            <img src="{{ asset('images/slideshows/japan3.jpg') }}" class="absolute w-full h-full object-cover rounded-lg opacity-0 slide" />
            <img src="{{ asset('images/slideshows/japan4.jpg') }}" class="absolute w-full h-full object-cover rounded-lg opacity-0 slide" />
            <img src="{{ asset('images/slideshows/japan5.jpg') }}" class="absolute w-full h-full object-cover rounded-lg opacity-0 slide" />
            <div class="absolute inset-0 bg-black/20 rounded-lg"></div> <!-- optional dim overlay -->
        </div>

        <div class="bg-white border border-blue-300 p-6 mb-10 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center mb-2">
                {{ $lens->model ?? 'Lens Name' }}
            </h2>
            <div class="flex justify-center space-x-6 mb-4 text-sm font-medium text-gray-600">
                <span>
                    <strong class="text-gray-800">Manufacturer:</strong> {{ $lens->manufacturer ?? 'N/A' }}
                </span>
                <span>
                    <strong class="text-gray-800">Focal Length:</strong> {{ $lens->focal_length ?? 'N/A' }}
                </span>
                <span>
                    <strong class="text-gray-800">Aperture:</strong> {{ $lens->aperture ?? 'N/A' }}
                </span>
            </div>
            <p class="text-gray-700 text-center">
                {{ $lens->description ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor...' }}
            </p>
        </div>

        <h3 class="text-3xl font-bold text-center mb-6">Reviews</h3>

        @auth
            <form action="{{ route('reviews.store', ['type' => 'lenses', 'id' => $lens->id]) }}" method="POST" class="mb-10">
                @csrf
                
                <div class="relative mb-3">
                    <textarea name="body" rows="4" 
                        class="block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Leave a review!">{{ old('body') }}</textarea>
                    @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="text-right">
                    <button type="submit" 
                        class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-1 px-4 rounded-md text-sm shadow-md transition duration-150">
                        Review
                    </button>
                </div>
            </form>
        @else
             <div class="p-4 bg-gray-100 rounded-lg text-center mb-10">
                Please <a href="/login" class="text-blue-600 font-semibold">log in</a> to write a review.
            </div>
        @endauth

        <div class="space-y-4">
            @forelse ($reviews as $review)
                <div class="relative p-4 bg-gray-100 rounded-lg shadow-sm border border-gray-200">
        
                    <div class="flex justify-between items-start mb-2 text-sm"> 
                        
                        <div class="flex items-baseline space-x-1">
                            <span class="font-bold text-gray-800">
                                {{ $review->user->name ?? 'username' }} 
                            </span> 
                            <span class="text-gray-500 text-xs">
                                | {{ $review->created_at->timezone('Asia/Jakarta')->format('H:i a, M d, Y') }} WIB
                            </span>
                        </div>
                        
                        @auth
                            @if (auth()->id() === $review->user_id)
                                <form 
                                    action="{{ route('reviews.destroy', $review) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('Are you sure you want to delete this review?');" 
                                    class="absolute -bottom-2 right-2"
                                >
                                    @csrf
                                    @method('DELETE') 
                                    <button type="submit" 
                                        class="text-gray-700 hover:text-red-500 p-1 transition duration-150 text-sm"
                                        title="Delete Review"
                                    >
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>

                            @endif
                        @endauth
                    </div>

                    <p class="text-gray-700 text-sm mt-0">
                        {{ $review->body }}
                    </p>
                </div>
            @empty
                <p class="bg-gray-100 text-gray-500 text-center p-8 border rounded-lg">No reviews yet.</p>
            @endforelse
        </div>
    </div>
</x-layout>