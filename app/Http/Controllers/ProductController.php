<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Str;
// use Image;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    function products(){
        return view('backend.product.product_view',[
            'products' => Product::paginate(),
        ]);
    }
    function addproducts(){
        return view('backend.product.product_form',[
            'cats' => Category::all()
        ]);
    }

    function postproducts(Request $request){
        $request->validate([
            // 'title' => ['required'],
         

            'thumbnail' => ['required','mimes:jpeg,jpg,png']
        ]);
        $product = new Product;
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->scategory_id;
        $product->summary = $request->summary;
        $product->description = $request->description;

        $slug = Str::slug($request->title);
        // return $request->all();

        if($request->hasFile('thumbnail'))
        {

           $image = $request->file('thumbnail');
         $ext = Str::random(3).'-'.$slug.'.'.$image->getClientOriginalExtension();
         Image::make($image)->save(public_path('thumbnail/'.$ext), 70);
         $product->thumbnail = $ext;

        }

        $product->save();
        return back()->with('success', 'Product added successfully');

      
    

    }
    
    function GetSubCat($id){
        $scat =SubCategory::where('category_id', $id)->get();
        return response()->json($scat);
    }

    

}
