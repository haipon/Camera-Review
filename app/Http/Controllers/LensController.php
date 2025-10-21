<?php

namespace App\Http\Controllers;

use App\Models\Lens;
use Illuminate\Http\Request;

class LensController extends Controller
{
    public function index(){
        $lenses = Lens::orderBy('created_at', 'desc')->paginate(9);

        return view('lenses.index', ["lenses" => $lenses]);
    }
    public function show($id)
    {
        $lenses = Lens::findOrFail($id);
        return view('lenses.show', ["lens" => $lenses, "reviews" => $lenses->reviews()->with('user')->orderBy('created_at', 'desc')->get()]);
    }

    public function addItem()
    {
        return view('lenses.add-item');
    }

    public function store(Request $request)
    {
        //
    }

    
}
