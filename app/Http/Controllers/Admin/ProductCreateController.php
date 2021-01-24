<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Products;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\ProductDetails;

use Carbon\Carbon;
class ProductCreateController extends Controller
{

    public function index(){
        $products = Products::all();
        return view('admin.createProduct.index',compact('products'));
    }
    public function create(){
        $data['categories'] = Category::all();
        $data['subcategories'] = SubCategory::all();
        $data['product_details'] = ProductDetails::all();

        return view('admin.createProduct.create',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'category_name' => 'required',
            'subcategory_name' => 'required',
            'product_name' => 'required',
            'product_discount' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'specification' => 'required',
            'delivary_description' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required',
            'product_color' => 'required',
            'product_size' => 'required',
            'product_unit' => 'required',
            'image' => 'required',
        ]);

        $products = new Products;

        $date = Carbon::now()->format('his')+rand(1000,9999);

        if($image = $request->file('image')){
            $extention = $request->file('image')->getClientOriginalExtension();
            $imageName = $date.'.'.$extention;
            $path = public_path('uploads/category');
            $image->move($path,$imageName);
            $products->image = $imageName;
        }  
        else{
            $products->image = "null";
        }

        $products->category_id = $request->category_name;
        $products->subcategory_id = $request->subcategory_name;
        $products->product_name = $request->product_name;
        $products->short_description = $request->short_description;
        $products->long_description = $request->long_description;
        $products->sku = 12345;
        $products->specification = $request->specification;
        $products->delivary_description = $request->delivary_description;
        $products->product_discount = $request->product_discount;
        $products->product_price = $request->product_price;
        $products->product_stock = $request->product_stock;
        $products->product_color = $request->product_color;
        $products->product_size = $request->product_size;
        $products->product_unit = $request->product_unit;

        // dd($products);
        if ($products->save()) {
            return back()->with('success','Products Created successfully.');
         }
         else{
             return back()->with('error','Something Error Found, Please try again.');
         }
    }
}
