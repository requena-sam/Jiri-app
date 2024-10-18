<?php

namespace App\Http\Controllers;

use App\Enums\ContactRole;
use App\Models\Jiri;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\JiriStoreRequest;

class JiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $upcomingJiris = Auth::user()->upcomingJiris;
        $pastJiris = Auth::user()->pastJiris;

        return view('jiri.index', compact('pastJiris', 'upcomingJiris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $contacts = Auth::user()->contacts;
        $projects = Auth::user()->projects;
        return view('jiri.create', compact('contacts', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JiriStoreRequest $request)
    {
        $jiri = Jiri::create($request->validated());

        if ($request->has('roles')) {

            $roles = $request->input('roles');
            $roles = collect($roles);

            //Students
            $students = collect($roles->filter(fn($value, $key) => str_ends_with($value, ContactRole::Student->value)
            ));
            $students = $students->map(fn($value, $key) => explode('-', $value)[0]
            )->toArray();

            //Evaluators
            $evaluators = collect($roles->filter(fn($value, $key) => str_ends_with($value, ContactRole::Evaluator->value)
            ));
            $evaluators = $evaluators->map(fn($value, $key) => explode('-', $value)[0])->toArray();

            $jiri->students()->attach($students);
            $jiri->evaluators()->attach($evaluators);
        }


        if ($request->has('projects')) {
            $jiri->projects()->attach($request->input('projects'));
        }
        return to_route('jiri.show', $jiri);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jiri $jiri): View
    {
        $jiri->load(['students', 'evaluators', 'projects']);

        return view('jiri.show', compact('jiri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jiri $jiri): View
    {
        if (!Gate::allows('view', $jiri)) {
            abort(403);
        }

        return view('jiri.edit', compact('jiri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JiriStoreRequest $request, Jiri $jiri): RedirectResponse
    {
        if (!Gate::allows('update', $jiri)) {
            abort(403);
        }

        $jiri->update($request->validated());

        return to_route('jiri.show', $jiri);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jiri $jiri): RedirectResponse
    {
        if (!Gate::allows('delete', $jiri)) {
            abort(403);
        }

        $jiri->delete();

        return to_route('jiri.index');
    }
}
