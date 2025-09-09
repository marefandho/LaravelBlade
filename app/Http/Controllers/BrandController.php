<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use App\Http\Requests\BrandRequest;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function __construct(private BrandService $service) {}
    public function index()
    {
        $brands = $this->service->getAllPaginated();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.form');
    }

    public function store(BrandRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit(string $id): View
    {
        $brand = $this->service->find($id);
        return view('brands.form', compact('brand'));
    }

    public function update(BrandRequest $request, string $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
