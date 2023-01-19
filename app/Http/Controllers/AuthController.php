<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function shop()
    {
        $products=Product::paginate(3);
        return view('pages.shop',compact('products'));
    }

    public function signupForm(){
        return view('auth.signup');
    }
    public function signup(Request $request){
        //validation
        $data=$request->validate([
            "name"=>'required|string|max:100',
            "email"=>'required|email|unique:users,email',
            "password"=>'required|min:6|string|confirmed'
        ]);

        $data['password']=bcrypt($data['password']);

        $user=User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$data['password'],
            "phone"=>$request->phone,
            "address"=>$request->address
        ]);

        Auth::login($user);

        session()->flash("success","You signed up successfully");

        return redirect(url('shop'));

    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data=$request->validate([
            "email"=>'required|email',
            "password"=>'required|min:6|string'
        ]);
        $is_login=Auth::attempt(["email"=>$data['email'],"password"=>$data['password']]);

        if($is_login == true){

             $user=User::where('email','=',$data['email'])->first();
            // $user=Auth::user();
            $user_id=$user->id;
            //  dd($user_id);

             if(Auth::user()->role == 'admin'){
                session()->flash("success","Hello again");
                return redirect(url('allProducts'));
             }else{
                session()->flash("success","You loged In successfuly");
                return redirect(url('shop'));
             }
            }else{
            return redirect(url('login'))->withErrors("credinitial not correct");
        }

    }

    public function logout(){
        Auth::logout();
        return redirect(url('login'));
     }
}
