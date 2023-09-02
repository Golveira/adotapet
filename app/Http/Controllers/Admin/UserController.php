<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;

class UserController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index');
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        toast(__('users.created'), 'success');

        return redirect()->route('admin.users.index');
    }

    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        toast(__('users.updated'), 'success');

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        toast(__('users.deleted'), 'success');

        return redirect()->route('admin.users.index');
    }
}
