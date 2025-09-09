<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemCategoryRequest;
use App\Models\ItemCategory;
use App\Services\ItemCategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ItemCategoryController extends Controller
{
    public function __construct(private ItemCategoryService $service) {}

    public function index(): View
    {
        $itemCategories = $this->service->getAllPaginated();
        return view('item-categories.index', compact('itemCategories'));
    }

    public function create(): View
    {
        return view('item-categories.form');
    }

    public function store(ItemCategoryRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());
        return redirect()->route('item-categories.index')->with('success', 'Item category created successfully.');
    }

    public function edit(string $id): View
    {
        $itemCategory = $this->service->find($id);
        return view('item-categories.form', compact('itemCategory'));
    }

    public function update(ItemCategoryRequest $request, string $id): RedirectResponse
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('item-categories.index')->with('success', 'Item category updated successfully.');
    }
    
    public function destroy(string $id): RedirectResponse
    {
        $this->service->delete($id);
        return redirect()->route('item-categories.index')->with('success', 'Item category deleted successfully.');
    }
}
