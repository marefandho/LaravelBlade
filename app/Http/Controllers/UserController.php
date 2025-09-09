<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\BusinessUnit;
use App\Models\Role;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(private UserService $service) {}

    public function index(): View
    {
        $users = $this->service->getAllPaginated();
        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        $roles = Role::all()->sortBy('label');
        $units = BusinessUnit::all()->sortBy('name');
        return view('users.form', compact('roles', 'units'));
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $this->service->create($request->validatedData());
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(string $id): View
    {
        $user = $this->service->find($id);
        return view('users.show', compact('user'));
    }

    public function edit(string $id): View
    {
        $user = $this->service->find($id);
        $roles = Role::all()->sortBy('label');
        $units = BusinessUnit::all()->sortBy('name');
        return view('users.form', compact('user', 'roles', 'units'));     
    }

    public function update(UserRequest $request, string $id): RedirectResponse
    {
        $this->service->update($id, $request->validatedData());
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->service->delete($id);
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function resetPassword(string $id): RedirectResponse
    {
        $this->service->resetPassword($id);
        return redirect()->route('users.index')->with('success', 'User password has been reset to default.');
    }

    public function changePassword(string $id, ChangePasswordRequest $request): RedirectResponse
    {
        $this->service->changePassword($id, $request->validated());
        return redirect()->route('users.index')->with('success', 'Your password has been changed successfully.');
    }
}
