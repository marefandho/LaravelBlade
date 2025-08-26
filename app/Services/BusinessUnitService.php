<?php

namespace App\Services;
use App\Interfaces\BusinessUnitRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class BusinessUnitService
{
    protected $repository;

    public function __construct(BusinessUnitRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

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
        $data['company_id'] = Auth::user()->company_id; 
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        $data['company_id'] = Auth::user()->company_id;
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }


}
