<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;

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
        $categories=categories::all();
        return view('admin.product',compact('categories'));
    }

    public function add_product(Request $request)
    {
        $product= new product;
        $product->title=$request->title;
        $product->description=$request->desc;
        $product->category=$request->categories;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->dis;
        $product->for=$request->for;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('Product',$imagename);
        $product->image=$imagename;

        
        $product->save();

        return redirect()->back()->with('message','Product Added Successfully');
    }

    public function show_product(){

        $product=product::all();
        return view('admin.showproduct',compact('product'));
    }
    public function delete_product($id){
        $product=product::find($id);
        if (file_exists(public_path() . '/product/'. $product->image)) {
            unlink(public_path() . '/product/'. $product->image);
        }
        $product->delete();
        return redirect()->back()->with('message','Deleted uccessfully');
    }
    public function update_product($id){
        $categories=categories::all();
        $product=product::find($id);
        return view('admin.updateproduct',compact('product','categories'));
    }
    public function updateproduct_confirm(Request $request,$id){
        $product=product::find($id);

        $product->title=$request->title;
        $product->description=$request->desc;
        $product->category=$request->categories;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->dis;
        $product->for=$request->for;

        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('Product',$imagename);
            $product->image=$imagename;

        }
        

        $product->save();

        return redirect()->back()->with('message','Product updated Successfully');

    }
}
