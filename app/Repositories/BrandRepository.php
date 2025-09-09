<?php

namespace App\Repositories;

use App\Interfaces\BrandRepositoryInterface;
use App\Models\Brand;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BrandRepository implements BrandRepositoryInterface
{
    public function getAllPaginated(int $perPage): LengthAwarePaginator
    {
        return Brand::paginate($perPage);
    }

    public function find($id): ?Brand
    {
        return Brand::findOrFail($id);
    }

    public function create(array $data): Brand
    {
        return Brand::create($data);
    }

    public function update(Brand $brand, array $data): bool
    {
        return $brand->update($data);
    }

    public function delete($id): bool
    {
        $brand = Brand::findOrFail($id);
        return $brand ? $brand->delete() : false;
    }
}
