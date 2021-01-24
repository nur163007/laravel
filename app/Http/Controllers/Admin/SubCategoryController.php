<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\SubCategory;
use Carbon\Carbon;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('admin.subcategory.index',compact('subcategories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create',compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'subcategory_name' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        $subcategories = new SubCategory;

        $date = Carbon::now()->format('his')+rand(1000,9999);

        if($image = $request->file('image')){
            $extention = $request->file('image')->getClientOriginalExtension();
            $imageName = $date.'.'.$extention;
            $path = public_path('uploads/category');
            $image->move($path,$imageName);
            $subcategories->image = $imageName;
        }  
        else{
            $subcategories->image = "null";
        }
        $subcategories->category_id =$request->category_name;
        $subcategories->subcategory_name = $request->subcategory_name;
        $subcategories->status = $request->status;
    //     echo '<pre>';
    //    var_dump($subcategories);
    //    exit;
        if ($subcategories->save()) {
            return redirect('index/subcategory')->with('success','SubCategory information successfully saved.');
         }
         else{
             return back()->with('error','Something Error Found, Please try again.');
         }
    }

    public function edit($id){
        //$data=[];
        $data['category'] = Category::all();
        $data['subcategory'] = SubCategory::findOrFail($id);
        //  return view('admin.subcategory.edit',compact('subcategory','category'));
         return view('admin.subcategory.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'subcategory_name' => 'required',
            'status' => 'required',
        ]);

        $categories = SubCategory::findOrFail($id);

        $date = Carbon::now()->format("his")+rand(1000,9999);

        if ($image = $request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = $date.'.'.$extension;
            $path = public_path('uploads/category');
            $image->move($path, $imageName);

           if(file_exists('uploads/category/'.$categories->image) AND !empty($categories->image)){
                unlink('uploads/category/'.$categories->image);
            }

            $categories->image = $imageName;
        }
        else{
            $categories->image = $categories->image;
        }

        $categories->category_id =$request->category_name;
        $categories->subcategory_name = $request->subcategory_name;
        $categories->status = $request->status;

        if ($categories->save()) {
           return redirect('index/subcategory')->with('success','Category information successfully updated.');
        }
        else{
            return back()->with('error','Something Error Found, Please try again.');
        }
    }
    public function delete($id)
    {
        $category = SubCategory::findOrFail($id);
        if($category){
            if(file_exists('uploads/category/'.$category->image) AND !empty($category->image)){
                unlink('uploads/category/'.$category->image);
            }
            $category->delete();
            return redirect()->back()->with('success','Sub Category information successfully deleted.');
        }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.');
        }
    }
}
