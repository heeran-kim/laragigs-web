<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index() {
        // dd(request('tag'));
        return view('listings.index', [
            // 'listings' => Listing::all()
            'listings' => Listing::latest()->filter(
                request(['tag', 'search']))->get()
        ]);
    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Create - show form to create new listing

    // Store - store new listing

    // Edit - show form to edit listing

    // Update - update listing

    // Destroy - delete listing
}
