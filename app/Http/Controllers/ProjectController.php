<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use App\PermissionEnum;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['user','client'])->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::select(['id','first_name', 'last_name'])->get();
        $clients = Client::select(['id','company_name'])->get();
        return view('projects.form', compact('users', 'clients'));
    }

    public function store(ProjectRequest $request)
    {
        Project::create($request->validated());
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $users = User::select(['id','first_name', 'last_name'])->get();
        $clients = Client::select(['id','company_name'])->get();
        return view('projects.form', compact('project', 'users','clients'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        Gate::authorize(PermissionEnum::DELETE_PROJECT->value);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}