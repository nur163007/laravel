<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProductDetails;

class ProductController extends Controller
{

    public function index()
    {
        $product_details = ProductDetails::all();
        //dd($categories);
        return view('admin.product_details.index',compact('product_details'));
    }
    public function create(){
        return view('admin.product_details.create');
    }

    public function store(Request $request){
        // dd($request->all());

        $this->validate($request,[
            'product_color' => 'required',
            'product_size' => 'required',
        ]);
        $product_details = new ProductDetails;

        $product_details->product_color = $request->product_color;
        $product_details->product_size = $request->product_size;

        if ($product_details->save()) {
            return redirect('product_details/index')->with('success','Product details successfully saved.');
         }
         else{
             return back()->with('error','Something Error Found, Please try again.');
         }

    }

    public function delete($id)
    {
        $product_details = ProductDetails::findOrFail($id);
        
        if($product_details){
            $product_details->delete();
            return redirect()->back()->with('success','Product information successfully deleted.');
        }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.');
        }

    }

   
    public function edit($id){
        $product_details  = ProductDetails::findOrFail($id);
         return view('admin.product_details.edit',compact('product_details'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'product_color' => 'required',
            'product_size' => 'required',
        ]);

        $product_details = ProductDetails::findOrFail($id);

        $product_details->product_color = $request->product_color;
        $product_details->product_size = $request->product_size;

        if ($product_details->save()) {
           return redirect('product_details/index')->with('success','Product information successfully updated.');
        }
        else{
            return back()->with('error','Something Error Found, Please try again.');
        }
    }
    
}
