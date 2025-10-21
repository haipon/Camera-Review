<?php

namespace App\Http\Controllers;

use App\Models\{Lens, Camera, Accessory, Review};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $type, $id)
    {
        // 1. Validation (simple validation for the review body)
        $request->validate(['body' => 'required|string|max:1000']);

        // 2. Determine the model based on the URL type ('lenses', 'cameras', etc.)
        $modelClass = match ($type) {
            'lenses' => Lens::class,
            'cameras' => Camera::class,
            'accessories' => Accessory::class,
            default => abort(404),
        };
        
        $product = $modelClass::findOrFail($id);

        // 3. Create the review using the relationship
        $product->reviews()->create([
            'user_id' => Auth::id(), 
            'body' => $request->body,
        ]);

        // 4. Redirect back to the product page
        return back()->with('success', 'Review submitted successfully!');
    }

    public function destroy(Review $review)
    {
        // 1. Authorization: Verify the logged-in user is the review owner
        // The underlined 'if (auth()->id() !== $review->user_id)' in your image is correct.
        if (Auth::id() !== $review->user_id) {
        abort(403, 'You do not have permission to delete this review.');
    }

        // 2. Delete the review
        $review->delete();

        // 3. Redirect back to the page the review was deleted from
        return back()->with('success', 'Review successfully deleted.');
    }
}
