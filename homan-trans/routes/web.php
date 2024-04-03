<?php

use App\Models\Episode;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/', function () {
    return view('main', [
        'heading' => 'Rick & Morty Episodes',
        'episodes' => Episode::paginate(7)
    ]);
});

Route::get('/fetch-api', [ApiController::class,'index'])->name('index');
