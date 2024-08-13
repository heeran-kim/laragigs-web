<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Dummy text'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Dummy text second'
            ]
        ]
    ]);
});
