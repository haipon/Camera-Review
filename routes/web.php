<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cameras', function () {

    $cameras = [
        ["id" => 1, "name" => "Canon EOS R5", "is_featured" => true],
        ["id" => 2, "name" => "Nikon Z7 II", "is_featured" => false],
        ["id" => 3, "name" => "Sony A7R IV", "is_featured" => true],
        ["id" => 4, "name" => "Fujifilm X-T4", "is_featured" => false],
    ];

    return view('cameras.index', ["greeting" => "Welcome to the Camera Rental Page", "cameras" => $cameras]);
});

Route::get('/cameras/upload', function () {
    return view('cameras.upload');
});

Route::get('/cameras/{id}', function ($id) {

    return view('cameras.show', ["id" => $id]);
});