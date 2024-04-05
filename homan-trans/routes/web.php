<?php

use App\Models\Episode;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\EpisodeController;


// Root route
Route::get('/', function () {
    return view('main', [
        'episodes' => Episode::paginate(7)
    ]);
});


// Route for fetching data and upload to Database
Route::get('/fetch-api', [ApiController::class,'index'])->name('index');


// Route for sorting data
Route::get('/sorted-episodes/{column}/{direction}', [EpisodeController::class, 'sortedEpisodes'])->name('sorted-episodes');


// Route for filtering data
Route::get('/filtered-episodes', [EpisodeController::class, 'filterEpisodes'])->name('filtered-episodes');