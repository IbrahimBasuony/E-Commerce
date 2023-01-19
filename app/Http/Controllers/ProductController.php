<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function allProducts()
    {
        $products=Product::all();
        $categories=Category::all();
        return view('admin.index',compact('products','categories'));
    }
    public function productForm()
    {
        $categories=Category::all();
        return view('admin.addProduct',compact('categories'));
    }

    public function createProduct(Request $request)
    {
        $data=$request->validate([
            "title"=>'required|string',
            "description"=>'required|string',
            "price"=>'required|numeric',
            "quantity"=>'required|numeric',
            "image"=>'image|mimes:png,jpg,gif,jpeg',
            "category_id"=>'exists:categories,id|required'
        ]);
        $data['image']=Storage::putFile("products",$data['image']);

        Product::create($data);
        session()->flash("success","Product inserted successfully");
        return redirect(url('allProducts'));
    }



    public function delete($id)
    {
        $product=Product::findorfail($id);
        $product->delete();
        session()->flash("success","Product Deleted successfully");
        return redirect(url('allProducts'));
    }



}
