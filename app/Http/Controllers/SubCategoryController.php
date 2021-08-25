<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    function subcategories(){
            return view('backend.subcategory.subcategory_view',[
                'subcats' => SubCategory::paginate(10)

                //ai sub_cats ta akta variable ja front page e $sub_cats name porichito.... 
                //SubCategory ata holo model er class
            ]);
           
    }

   // subcategory_name


    function addsubcategory(){
        



        return view('backend.subcategory.subcategory_form',[
            'categories' => Category::orderBy('category_name','asc')->get()
        ]);
        //return 'ok';
    }
    function postsubcategory(Request $request){
        $request->validate([
            'subcategory_name' => ['required'],
            // 'category_name' => ['required','min:2','max:500','unique:categories'],

            // 'thumbnail' => ['required','image']
        ]);
        $sub = new SubCategory;
        $sub->subcategory_name = $request->subcategory_name;
        $sub->slug = Str::slug($request->subcategory_name);
        $sub->category_id = $request->category_id;
        $sub->save();
        return back();
    }
//check-box sub-cetagory delate
    function AllDeleteSubCategory(Request $request){

        
        // return $request->all();
        foreach($request->scat_id as $scat_id){
            // $scat=SubCategory::findorFail($scat_id);
            // $scat->delete();
            SubCategory::findorFail($scat_id)->delete();
        }
        return back();

    }
    function subtrashedcategory(){
        return view('backend.subcategory.sub_trashed',[
            'sub_categorie' => SubCategory::onlyTrashed()->paginate()
        ]);
    }
      
     
    
}
