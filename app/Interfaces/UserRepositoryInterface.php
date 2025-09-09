<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function getAllPaginated(int $perPage): LengthAwarePaginator;
    public function find($id): ?User;
    public function create(array $data): User;
    public function update(User $user, array $data): bool;
    public function delete($id): bool;
    public function resetPassword(User $user): bool;
    public function changePassword(User $user, array $data): bool;
}
