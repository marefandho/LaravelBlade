<?php

namespace App\Repositories;

use App\Interfaces\ItemCategoryRepositoryInterface;
use App\Models\ItemCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ItemCategoryRepository implements ItemCategoryRepositoryInterface
{
    public function getAllPaginated(int $perPage): LengthAwarePaginator
    {
        return ItemCategory::paginate($perPage);
    }   

    public function find($id): ?ItemCategory
    {
        return ItemCategory::findOrFail($id);
    }   

    public function create(array $data): ItemCategory
    {
        return ItemCategory::create($data);
    }   

    public function update($itemCategory, array $data): bool
    {
        return $itemCategory->update($data);
    }

    public function delete($id): bool
    {
        return ItemCategory::findOrFail($id)->delete();
    }
}
