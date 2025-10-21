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
}
