<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        $requestParam = request(['tag', 'search']);
        return view('listing.index', [
            'listings' => Listing::latest()->filter($requestParam)->paginate(6)
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listing.show', [
            'listing' => $listing,
        ]);
    }

    public function create()
    {
        return view('listing.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            "title" => "required",
            "company" => ['required', Rule::unique('listings', 'company')],
            "location" => "required",
            "website" => "required",
            "email" => "required|email",
            "tags" => "required",
            "description" => "required",
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', "listing created sucessfully");
    }

    //show edit form
    public function edit(Listing $listing)
    {
        return view('listing.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        if ($listing->user_id !=  auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            "title" => "required",
            "company" => "required",
            "location" => "required",
            "website" => "required",
            "email" => "required|email",
            "tags" => "required",
            "description" => "required",
        ]);

        if ($request->hasFile('logo')) {
            $listing['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', "listing updated sucessfully");
    }

    public function delete(Listing $listing)
    {
        if ($listing->user_id !=  auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $listing->delete();
        return back()->with('message', 'Listing deleted successfully');
    }

    public function manage()
    {
        return view('listing.manage', ['listings' => Auth::user()->listings]);
    }
}
