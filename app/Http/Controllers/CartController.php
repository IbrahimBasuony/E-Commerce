<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(){
        return view('pages.cart');
    }

    public function addToCart(Request $request ,$id ){
        $user=Auth::user();
        $userId=$user->id;

        $data=$request->validate([
            "quantity"=>'required|numeric'
        ]);

        $product=Product::find($id);

        // Cart::clear();


        Cart::add(array(

            'id' => $product->id ,
             'name' => $product->title,
             'price' => $product->price,
             'quantity' =>  $request->quantity ,
            'attributes'=> ['desc'=>$product->description,
            'image'=>$product->image
            ]


        ));

        return redirect(url('cart'));

    }

    public function destroy($id)
    {
        Cart::remove($id);
        return redirect(url('cart'));
    }


}
