<?php

namespace App\Http\Controllers;

use App\hasImagesVariant;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Intervention\Image\Laravel\Facades\Image;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use hasImagesVariant;
    public function index()
    {
        $contacts = Auth::user()->contacts;

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        Auth::user()->contacts;
        return view("contacts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactStoreRequest $request)
    {

        $validated = $request->validated();
        $path = self::imageStoreVariant($request);

        $validated['image'] = $path;
        $contact = Auth::user()->contacts()->create($validated);
        $contact->image = $path;
        $contact->save();

        return to_route('contact.show', $contact);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view("contacts.edit", compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactStoreRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        return to_route("contact.show", $contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return to_route('contact.index');
    }
}
