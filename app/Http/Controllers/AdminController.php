<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=categories::all();

        return view('admin.categories',compact('data'));
    }
    public function add_categories(Request $request)
    {
        $data=new categories;

        $data->categories=$request->categories;

        $data->save();

        return redirect()->back()->with('message','Added Success');
    }

    public function delete_category($id){
        $data=categories::find($id);
        $data->delete();
        return redirect()->back()->with('message','Deleted uccessfully');
    }

    public function view_product(){
        return view('admin.product');
    }
}
