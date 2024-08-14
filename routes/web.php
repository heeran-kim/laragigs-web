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

// Single Listing
Route::get('/listings/{listing}',
[ListingController::class, 'show']);