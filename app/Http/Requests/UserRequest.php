<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('user');
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),            
            ],
            'role_id' => 'required|exists:roles,id',
            'business_unit_id' => [
                Rule::requiredIf(fn() => ! $this->isSuperAdminRole()), 
                'exists:business_units,id',
            ]
        ];
    }

    public function validatedData(): array
    {
        $data = $this->validated();
        if (empty($data['password'])) {
            unset($data['password']);
        }
        return $data;
    }

    public function isSuperAdminRole(): bool
    {
        return $this->input('role_id') == config('app.super_admin_role_id');
    }
}
