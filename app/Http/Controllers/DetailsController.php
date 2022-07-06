<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index(Request $request, $category, $listingUuid)
    {
        $listing = Listing::where('uuid', $listingUuid)->firstOrFail();

        return view('details', ['listing' => $listing->toArray()]);
    }
}
