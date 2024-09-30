<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Models\Jiri;
use App\Models\Project;
use Illuminate\Support\Facades\Request;

class ProjectController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());
        return to_route("project.show", $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(ProjectStoreRequest $request, Project $project)
    {
        $project->update($request->validated());
        return to_route('project.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(Project $project)
    {
        $project->delete();
        return to_route('projects.index');
    }
}
