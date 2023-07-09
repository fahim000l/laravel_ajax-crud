<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function products(){

        $products = Product::latest()->paginate(5);



        return view('products', compact('products'));
    }

    public function addProduct(Request $request){
        $request->validate(
            [
                'name'=>'required|unique:products',
                'price'=> 'required'
            ],
            [
                'product_name.required'=> 'Product Name is required',
                'product_name.unique' => 'This product already exixts',
                'product_price.required' => 'Product Price is required'
            ]
        );

        // dd($request->product_name);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return response()->json([
            'status'=>'success'
        ]);
    }

    public function updateProduct(Request $request){

        $request->validate(
            [
                'up_name'=>'required|unique:products,name,'.$request->up_id,
                'up_price'=>'required'
            ],
            [
                'up_name.required'=>'Product Name is required',
                'up_name.unique'=>'This product already exists',
                'up_price.required'=> 'Product Price is required'
            ]
        );

        Product::where('id',$request->up_id)->update([
            'name'=>$request->up_name,
            'price'=>$request->up_price
        ]);

        return response()->json([
            'status'=>'success'
        ]);

    }

    public function deleteProduct(Request $request){

        Product::find($request->productId)->delete();

        return response()->json([
            'status'=>'success'
        ]);

    }



}