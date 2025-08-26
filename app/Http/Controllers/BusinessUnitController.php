<?php

namespace App\Http\Controllers;
use App\Services\BusinessUnitService;
use App\Http\Requests\BusinessUnitRequest;

class BusinessUnitController extends Controller
{
    protected $service;
    public function __construct(BusinessUnitService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $units = $this->service->getAllPaginated(10);
        return view('business-units.index', compact('units'));
    }

    public function create()
    {
        return view('business-units.form');
    }

    public function store(BusinessUnitRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('business-units.index')->with('success', 'Business Unit created successfully.');
    }

    public function show(string $id)
    {
        $units = $this->service->find($id);
        return view('business-units.show', compact('units'));
    }

    public function edit(string $id)
    {
        $units = $this->service->find($id);
        return view('business-units.form', compact('units'));
    }

    public function update(BusinessUnitRequest $request, string $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('business-units.index')->with('success', 'Business Unit updated successfully.');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('business-units.index')->with('success', 'Business Unit deleted successfully.');
    }
}
