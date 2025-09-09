<?php

namespace App\Interfaces;

use App\Models\ItemCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ItemCategoryRepositoryInterface
{
    public function getAllPaginated(int $perPage): LengthAwarePaginator;
    public function find($id): ?ItemCategory;
    public function create(array $data): ItemCategory;
    public function update(ItemCategory $itemCategory, array $data): bool;
    public function delete($id): bool;
}
