<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create([
            "name" => $request->name,
        ]);

        return new CategoryResource($category);
    }

    public function update(Category $category, CategoryStoreRequest $request)
    {
        $category->update(
            ["name" => $request->name]
        );

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(["message" => $category->name . " category deleted successfully"], Response::HTTP_ACCEPTED);
    }

}
