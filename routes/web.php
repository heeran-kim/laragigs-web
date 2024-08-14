<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

// All Listings (before making controller)
// Route::get('/', function () {
//     return view('listings', [
//         'listings' => Listing::all()
//     ]);
// });

// All Listings
Route::get('/', [ListingController::class, 'index']);


// Single Listing (before binding model)
// Route::get('/listings/{id}', function ($id) {
//     $listing = Listing::find($id);

//     if($listing){
//         return view('listing', [
//             'listing' => $listing
//         ]);
//     } else {
//         abort(404);
//     }
// });

// Single Listing (before making controller)
// Route::get('/listings/{listing}', function (Listing $listing) {
//     return view('listing', [
//         'listing' => $listing
//     ]);
// });

// Show create form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Edit submit to Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);