<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
   public function getAllPaginated(int $perPage): LengthAwarePaginator
   {
        return User::with(['role', 'businessUnit'])->paginate($perPage);
   }

   public function find($id): ?User
   {
        return User::with(['role', 'businessUnit'])->where('id', $id)->firstOrFail();
   }

   public function create(array $data): User
   {       
        $user = new User();
        $user->fill($data);
        $user->save();

        return $user;
   }

   public function update(User $user, array $data): bool
   {
        return $user->update($data);
   }

   public function delete($id): bool
   {
        $user = User::find($id);
        return $user->delete();
   }

   public function resetPassword(User $user): bool
   {
        $user->password = bcrypt('password');
        return $user->save();
   }

   public function changePassword(User $user, array $data): bool
   {
        $user->password = $data['password'];
        return $user->save();
   }
}
