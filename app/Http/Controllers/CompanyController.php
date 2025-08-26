<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{
    public function edit()
    {
        $company = Auth::user()->company;
        return view('company.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $user = User::find(Auth::id());
        if ($user && $user->company) {
            $user->company->update($request->only('name', 'address'));
        } else if ($user) {
            $company = Company::create($request->only('name', 'address'));
            $user->company_id = $company->id;
            $user->save();
        }

        return redirect()->route('company.edit')->with('success', 'Company profile updated successfully.');
    }
}
