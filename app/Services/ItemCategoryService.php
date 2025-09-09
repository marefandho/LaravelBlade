<?php

namespace App\Services;

use App\Interfaces\ItemCategoryRepositoryInterface;

class ItemCategoryService
{
    public function __construct(private ItemCategoryRepositoryInterface $repository){}
    
    public function getAllPaginated($perPage = 10)
    {
        return $this->repository->getAllPaginated($perPage);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data): bool
    {
        $itemCategory = $this->repository->find($id);
        return $this->repository->update($itemCategory, $data);
    }

    public function delete($id): bool
    {
        return $this->repository->delete($id);
    }
}
