<?php

namespace App\Http\Controllers;
// namespace App\Models;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
//ses er ta model er category.php er class name

class CategoryController extends Controller
{
    function categories(){
         $cats=Category::OrderBy('category_name','asc')->paginate(7);
        //  return $cat;
        return view('backend.category.category_view',compact('cats'));
    }

    function addcategory(){
        return view('backend.category.category_form');
    }

    // function viewcategory(){
    //     return view('backend.category.category_view');
    // }
    function postcategory(Request $request){
        // $request->validate([
        //     'category_name' => ['required','min:2','max:500']
        // ]);



        $request->validate([
            'category_name' => ['required','min:2','max:500','unique:categories'],
            // unique er mane holo table er same name thaka jabe na
            // 'slug' => ['required','unique:categories,slug']
            // nicherta single delimeter string dea dekhano hoisay
            //duita neom dekhano hocche
            'slug' => 'required | unique:categories,slug',
        ],[
            'category_name.max' => 'category name must have 6 charecter long'
        ]);
        //oporer ongso jodi custom massage korte hoi tobe porer array te aivabe likhte hobe

        // return 'okay';
        //FUNCTION ER MODDHE class er por variable nila oitake obj bole dhora hobe
        // Request=ata holo server er request ai function er moddhe thakle object buzai 
        // $request =ata variable
        // print_r($_POST);nicher dd function er moton e kaj korbe
        // dd($_POST); ata dea form er token and server e ki ki table er collam ase ta janar jonno
        

       // return $request->all();
        // all() = table er sob collam dekhabe 
        
    //ELUQUENT ER DARA UPDATE KORA
        $cat = new Category;
        // return Category::all();
        // print_r ($cat);
        //cat variable e model class er object create
        $cat->category_name = $request->category_name;
        //database er field er name = form er name field thakay category_name ta dhora hoisay 
        // ata form thakay nea database e rakhbe
        $cat->slug = $request->slug;
        //database er field er name = form er name field thakay category_name ta dhora hoisay 
        $cat->slug = Str::slug($request->category_name, '-');
        $cat->save();
        //save function ta database e time date ta save korbe
        //eta charao ata database e data insert korbe inserrt function er moto
        
        // return back();
        //back function er  kaj holo ata from er data server e rekhe abar ager jaigai fire ashe ;web page redirected hoi

        return redirect('/categories');
        //ata dea je kono page e move kora jabe    

    }
    // function deletecategory($var){
    //     return $var;
    // }
    // jodi web.php er url er id dhorte hoi tobe function e parameter pass korbo oporer niom
    
    function deletecategory($data){
        //oporer parameter jkono variable dile hobe
    //    return Category::find($data);
       //delete or insert button er database er full row show korbe 
       Category::findorFail($data)->delete();
        return back()->with('success','category Deleted Successfully');

    }

    function editcategory($data){
        return view('backend.category.category_edit',[
          'cat' =>  Category::findorFail($data),
        ]);
    }
    //ata update er 1st niom (Eloquent ORM) dia

    // function updatecategory(Request $request){
    //     $cat=Category::findorFail($request->cat_id);
    //     //oporer ongsota menually id receive korsilo tai
    //     //nicher onchota eluquent er dara kora
    //     $cat->category_name = $request->category_name;
    //     //database er field er name = form er name field thakay category_name ta dhora hoisay 
    //     // ata form thakay nea database e rakhbe
    //     $cat->slug = $request->slug;
    //     //database er field er name = form er name field thakay category_name ta dhora hoisay 
    //     $cat->slug = Str::slug($request->category_name, '-');
    //     $cat->save();
    //     return back()->with('success','category Updated Successfully');
    // }


    //Eloquent ORM eta baad e 2nd neom ta
    function updatecategory(Request $request){
        Category::findorFail($request->cat_id)->update([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
        ]);
        return back()->with('success','category Updated Successfully');
    
    }
    function trashedcategory(){
        return view('backend.category.trashed',[
            'categories' => Category::onlyTrashed()->paginate()
        ]);
    }
    function restorecategory($id){
        Category::onlyTrashed()->findorFail($id)->restore();
        return back()->with('success','category restore successfully');
    }
    function permanentcategory($id){
        Category::onlyTrashed()->findorFail($id)->forceDelete();
        return back()->with('success','category permanent delete successfully');
    }
 
}
