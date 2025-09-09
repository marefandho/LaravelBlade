<?php

namespace App\Interfaces;

use App\Models\Brand;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


interface BrandRepositoryInterface
{
    public function getAllPaginated(int $perPage): LengthAwarePaginator;
    public function find($id): ?Brand;
    public function create(array $data): Brand;
    public function update(Brand $brand, array $data): bool;
    public function delete($id): bool;
    
}
