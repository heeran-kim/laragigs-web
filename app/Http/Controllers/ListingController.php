<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index() {
        // dd(request('tag'));
        return view('listings.index', [
            // 'listings' => Listing::all()
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
            // 'listings' => Listing::latest()->filter(request(['tag', 
            // 'search']))->simplePaginate(2)
        ]);
    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listings.show', ['listing' => $listing]);
    }

    // Create - show form to create new listing
    public function create() {
        return view('listings.create');
    }

    // Store - store new listing
    public function store(Request $request) {
        // dd($request->all());
        dd($request->file());
        // dd($request->file('logo')->store()); // storage > app > public

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // folder name: logos
        }
        // php artisan storage:link (to directly access to the stored images)
        // http://laragigs.test/storage/logos/uX9NTIIXIfNYtgBFJaqxD34xsHQPkvTqOXi1vNzs.png

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        // Session::flash('message', 'Listing Created');        
        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // Edit - show form to edit listing
    public function edit(Listing $listing) {
        // dd($listing->title);
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update - update listing
    public function update(Request $request, Listing $listing) {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorised Action');
        }

        // Validaton
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // folder name: logos
        }

        $listing->update($formFields);
  
        return redirect("/listings/{$listing->id}")->with('message', 'Listing updated successfully!');
    }

    // Destroy - delete listing
    public function destroy(Listing $listing) {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorised Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }

    // Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
