<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::leftJoin('categories', 'products.id_category', '=', 'categories.id')
                ->select(
                    'products.id',
                    'products.nama_product as nama_product',
                    'products.qty_product as qty_product',
                    'products.harga_product as harga_product',
                    'categories.nama_category as nama_category'
                );

            return DataTables::eloquent($products)
                ->addColumn('DT_RowIndex', function ($product) {
                    static $index = 0;
                    return ++$index;
                })
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && !empty($request->input('search.value'))) {
                        $value = $request->input('search.value');
                        $query->where('products.nama_product', 'like', '%' . $value . '%')
                            ->orWhere('categories.nama_category', 'like', '%' . $value . '%')
                            ->orWhere('products.qty_product', 'like', '%' . $value . '%')
                            ->orWhere('products.harga_product', 'like', '%' . $value . '%');
                    }
                })
                ->toJson();
        }

        return view('products.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
        $product = new Product;
        $product->nama_product = $request->nama_product;
        $product->id_category = $request->nama_category;
        $product->qty_product = $request->qty_product;
        $product->harga_product = $request->harga_product;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::leftJoin('categories', 'products.id_category', '=', 'categories.id')
            ->select(
                'products.id',
                'products.nama_product as nama_product',
                'products.qty_product as qty_product',
                'products.harga_product as harga_product',
                'categories.nama_category as nama_category'
            )
            ->findOrFail($product->id);

        return response()->json([
            'data' => [
                'nama_product' => $product->nama_product,
                'nama_category' => $product->nama_category,
                'qty_product' => $product->qty_product,
                'harga_product' => $product->harga_product
            ]
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = Product::leftJoin('categories', 'products.id_category', '=', 'categories.id')
            ->select(
                'products.id',
                'products.nama_product as nama_product',
                'products.qty_product as qty_product',
                'products.harga_product as harga_product',
                'categories.nama_category as nama_category'
            )
            ->findOrFail($product->id);

        $category = Category::all();

        return response()->json([
            'data' => [
                'nama_product' => $product->nama_product,
                // 'nama_category' => $product->id,
                'qty_product' => $product->qty_product,
                'harga_product' => $product->harga_product
            ],

            'category' =>[
                // 'id' => $category->id,
                'nama_category' => $category->nama_kategori
            ]
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
