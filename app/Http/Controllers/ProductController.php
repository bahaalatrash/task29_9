<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products =    Product::query()->get();
        return response()->json([
            "message" => "all products in database ",
            "products" => $products
        ]);
    }






    public function store(ProductStoreRequest $request)
    {

        $product = Product::query()->create($request->validated());
        return response()->json([
            "message" => " the product was created successfully ",
            "product" => $product
        ]);
    }


    public function show(int $id)
    {
        $product = Product::query()->where('id', $id)->get();
        return response()->json([
            "message" => " the product with id $id is ",
            "product" => $product
        ]);
    }


    public function update(ProductUpdateRequest $request, int $id)
    {

        $product = Product::query()->where('id', $id)->update($request->validated());

        return response()->json([
            "message" => " the product was updated successfully ",
            "product" => $product
        ]);
    }

    public function destroy(int $id)
    {

        $product = Product::query()->where('id', $id)->delete();
        return response()->json([
            "message" => " the product was deleted successfully ",
            "product" => $product
        ]);
    }

    public function updatestock(Request $request, int $id)
    {

         $product=Product::query()->where('id', $id)->decrement('quantity', $request->input('quantity'));

         return response()->json([
            "message" => " the product stock was updated successfully ",
            "product" => $product
        ]);
    }
}
