<?php

use App\Models\Episode;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

// Root route
Route::get('/', function () {
    return view('main', [
        'heading' => 'Rick & Morty Episodes',
        'episodes' => Episode::paginate(7)
    ]);
});

// Route for fetching data and upload to Database
Route::get('/fetch-api', [ApiController::class,'index'])->name('index');

// Route for sorting data
Route::get('/sorted-episodes/{column}/{direction}', [ApiController::class, 'sortedEpisodes'])->name('sorted-episodes');
