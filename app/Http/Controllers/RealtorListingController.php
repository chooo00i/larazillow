<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RealtorListingController extends Controller
{
    use AuthorizesRequests;
    public function __construct()
    {
        // $this->authorizeResource(Listing::class, "listing");
    }

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
        ];
        return inertia('Realtor/Index', [
            'listings' => Auth::user()
                    ->listings()
                    ->mostRecent()
                    ->filter($filters)
                    ->get(),
        ]);
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();
        return redirect()->back()
            ->with('success', 'Listing was deleted');
    }
}
