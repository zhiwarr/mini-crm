<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use App\PermissionEnum;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['project','user','client'])->paginate(10);
        return view('tasks.index', compact('tasks'));
    }
    public function create()
    {
        $users = User::select(['id','first_name', 'last_name'])->get();
        $clients = Client::select(['id','company_name'])->get();
        $projects = Project::select(['id','title'])->get();
        return view('tasks.form', compact('users', 'clients','projects'));
    }
    public function store(TaskRequest $request)
    {
        Task::create($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
    public function edit(Task $task)
    {
        $users = User::select(['id','first_name', 'last_name'])->get();
        $clients = Client::select(['id','company_name'])->get();
        $projects = Project::select(['id','title'])->get();
        return view('tasks.form', compact('task', 'users', 'clients','projects'));
    }
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }
    public function destroy(Task $task)
    {
        Gate::authorize(PermissionEnum::DELETE_TASK->value);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}