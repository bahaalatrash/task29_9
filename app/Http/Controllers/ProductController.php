<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

 return Product::query()->get();}



public function store(ProductStoreRequest $request){

Product::query()->create($request->validated());


}


public function show(int $id){
     return Product::query()->where('id', $id)->get();}


public function update (ProductUpdateRequest $request, int $id){

      Product::query()->where('id', $id)->update($request->validated());


}

public function destroy(int $id){

      Product::query()->where('id', $id)->delete();
}

public function updatestock(Request $request, int $id ){

Product::query()->where('id', $id)->decrement('quantity', $request->input('quantity'));


}

}
