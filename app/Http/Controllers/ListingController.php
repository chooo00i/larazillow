<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ListingController extends Controller
{
    use AuthorizesRequests;
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Listing::class, "listing");
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'PriceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                    ->filter($filters)
                    ->paginate(10)
                    ->withQueryString(),
            ]
        );
    }

        /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        // 방법 1
        // if (Auth::user()->cannot('view', $listing)) {
        //     abort(403);
        // }

        // 방법 2
        // if (Gate::inspect('view', $listing)) {
        //     abort(403);
        // }
        
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing,
            ]
        );
    }
}
