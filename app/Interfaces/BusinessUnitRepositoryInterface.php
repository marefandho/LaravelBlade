<?php

namespace App\Interfaces;
use App\Models\BusinessUnit;

interface BusinessUnitRepositoryInterface
{
    public function getAllPaginated(int $perPage);
    public function find($id): ?BusinessUnit;
    public function create(array $data): BusinessUnit;
    public function update($id, array $data): bool;
    public function delete($id): bool;
}
