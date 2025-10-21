<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    public function index(){
        $cameras = Camera::orderBy('created_at', 'desc')->paginate(9);

        return view('cameras.index', ["cameras" => $cameras]);
    }
    
    public function addItem()
    {
        return view('cameras.upload');
    }
    public function show($id)
    {
        $cameras = Camera::findOrFail($id);
        return view('cameras.show', ["camera" => $cameras, "reviews" => $cameras->reviews()->with('user')->orderBy('created_at', 'desc')->get()]);
    }

    public function store(Request $request)
    {
        //
    }
}
