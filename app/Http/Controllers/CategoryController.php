<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    
public function index()
{
    $categories = Category::withCount('products')->latest()->paginate(10);
    return view('master-data.category.index', compact('categories'));
}
 
public function create()
{
    return view('master-data.category.create');
}
 
public function store(StoreCategoryRequest $request)
{
    Category::create($request->validated());
 
    return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
}


}
