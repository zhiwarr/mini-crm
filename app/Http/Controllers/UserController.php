<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\PermissionEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.form');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function edit(User $user)
    {
        return view('users.form', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    public function destroy(User $user)
    {
        Gate::authorize(PermissionEnum::MANAGE_USER->value);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}