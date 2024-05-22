<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projects = Project::where('title', 'like', '%' . $request->query('q', '') . '%')->get();
        return view('projects.index', ['projects' => $projects]);
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
    public function store(Request $request)
    {
        $data = $request->all();
        
        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->content = $data['content'];
        $newProject->user_id = Auth::user()->id;
        $newProject->save();

        return redirect()->route('projects.index')->with('create_success', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        if(Auth::user()->id !== $project->user_id) abort(401);
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        if(Auth::user()->id !== $project->user_id) abort(401);
        $data = $request->all();
        
        $project->title = $data['title'];
        $project->content = $data['content'];
        $project->update();

        return redirect()->route('projects.index')->with('update_success', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if(Auth::user()->id !== $project->user_id) abort(401);
        $project->delete();
        return redirect()->route('projects.index')->with('delete_success', $project);
    }
}
