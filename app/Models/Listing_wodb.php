<?php
// php artisan make:model Listing
namespace App\Models;

class Listing_old {
    public static function all() {
        return [
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
        ];
    }

    public static function find($id) {
        $listings = self::all();

        foreach($listings as $listing) {
            if($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}