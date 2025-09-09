<?php

namespace App\Services;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(private UserRepositoryInterface $repository){}

    public function getAllPaginated($perPage = 10)
    {
        return $this->repository->getAllPaginated($perPage);
    }
    
    public function find($id): ?User
    {
        return $this->repository->find($id);
    }   

    public function create(array $data): User
    {
        $data['password'] = Hash::make('567password');
        $data['role_id'] = $data['role_id'];
        $data['company_id'] = Auth::user()->company_id;
        $data['business_unit_id'] = $data['business_unit_id'] ?? null;
        return $this->repository->create($data);
    }

    public function update($id, array $data): bool
    {
        $user = User::findOrFail($id);
        if (!empty($data['password'])) {
          $data['password'] = Hash::make($data['password']);
        }
        return $this->repository->update($user, $data);
    }

    public function delete($id): bool
    {
        return $this->repository->delete($id);
    }

    public function resetPassword($id): bool
    {
        $user = User::findOrFail($id);
        return $this->repository->resetPassword($user);
    }

    public function changePassword($id, array $data): bool
    {
        $user = User::findOrFail($id);
        $data['password'] = Hash::make($data['new_password']);
        return $this->repository->changePassword($user, $data);
    }
}
