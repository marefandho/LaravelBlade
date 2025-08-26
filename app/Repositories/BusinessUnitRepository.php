<?php

namespace App\Repositories;
use App\Models\BusinessUnit;
use App\Interfaces\BusinessUnitRepositoryInterface;

class BusinessUnitRepository implements BusinessUnitRepositoryInterface
{
    public function getAllPaginated(int $perPage)
    {
        return BusinessUnit::paginate($perPage);   
    }

    public function find($id): ?BusinessUnit
    {
        return BusinessUnit::findOrFail($id);
    }

    public function create(array $data): BusinessUnit
    {
        return BusinessUnit::create($data);
    }

    public function update($id, array $data): bool
    {
        $unit = BusinessUnit::findOrFail($id);
        return $unit ? $unit->update($data) : false;
    }

    public function delete($id): bool
    {
        $unit = BusinessUnit::findOrFail($id);
        return $unit ? $unit->delete() : false;
    }
}
