<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class DetailsController extends Controller
{
    public function index(Request $request, $category, $listingUuid)
    {
        $listing = Listing::where('uuid', $listingUuid)->firstOrFail();

        return view('details', ['listing' => $listing->toArray()]);
    }
}
