<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::leftJoin('categories', 'products.id_category', '=', 'categories.id')
            ->select(
                'products.id',
                'products.nama_product as nama_product',
                'products.qty_product as qty_product',
                'products.harga_product as harga_product',
                'categories.nama_category as nama_category',
                'categories.id as id_category'
            );

        if ($request->has('category_id')) {
            $categoryId = $request->input('category_id');

            if (!empty($categoryId)) {
                $query->where('categories.id', '=', $categoryId);
            }
        }

        $products = $query->paginate(5);

        return ProductResource::collection($products);
    }


    public function getCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
        $product = new Product;
        $product->nama_product = $request->nama_product;
        $product->id_category = $request->id_category;
        $product->qty_product = $request->qty_product;
        $product->harga_product = $request->harga_product;
        $product->save();

        return response()->json(['message' => 'Product created successfully!', 'product' => new ProductResource($product)], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->update($validated);

        return response()->json(['message' => 'Product updated successfully', 'product' => new ProductResource($product)], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
