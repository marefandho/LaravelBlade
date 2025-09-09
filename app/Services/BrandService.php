<?php

namespace App\Services;

use App\Interfaces\BrandRepositoryInterface;
use App\Models\Brand;

class BrandService
{
    public function __construct(private BrandRepositoryInterface $repository){}

    public function getAllPaginated($perPage = 10)
    {
        return $this->repository->getAllPaginated($perPage);
    }

    public function find($id): Brand
    {
        return $this->repository->find($id);
    }

    public function create(array $data): Brand
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data): bool
    {
        $brand = Brand::findOrFail($id);
        return $this->repository->update($brand, $data);
    }

    public function delete($id): bool
    {
        return $this->repository->delete($id);
    }
}
