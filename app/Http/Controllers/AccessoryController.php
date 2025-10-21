<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    public function index(){
        $accessories = Accessory::orderBy('created_at', 'desc')->paginate(9);

        // Using singular folder 'accessory' as per your folder structure image
        return view('accessories.index', ["accessories" => $accessories]);
    }

     public function show($id)
    {
        $accessories = Accessory::findOrFail($id);

        return view('accessories.show', ["accessory" => $accessories, "reviews" => $accessories->reviews()->with('user')->orderBy('created_at', 'desc')->get()]);
    }
    
    public function addItem()
    {
        return view('accessories.add-item');
    }

    public function store(Request $request)
    {
        //
    }
}
