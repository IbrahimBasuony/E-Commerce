<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryForm(){
        return view('admin.addCategory');
    }

    public function createCategory(Request $request)
    {
        $data=$request->validate([
            "name"=>'required|string'
        ]);
        Category::create($data);
        session()->flash("success","Category inserted successfully");
        return redirect(url('allProducts'));
    }

    public function deleteCategory($id)
    {
        $category=Category::findorfail($id);
        $category->delete();
        session()->flash("success","Category Deleted successfully");
        return redirect(url('allProducts'));
    }
}
