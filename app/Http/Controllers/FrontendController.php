<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function contact(){
        // $var='hello world';
        // return view('pages.contact',compact('var'));
        return view('pages.contact',[
            'var' => 'hello world',
            // oporer $var coment line k niche aivabe likha jai
        ]);
    }

    function about(){
        // $var='hello world';
        // return view('pages.contact',compact('var'));
        return view('pages.contact',[
            'var' => 'hello about 1',
            // oporer $var coment line k niche aivabe likha jai
        ]);
    }

    function look(){
        // $var='hello world';
        // return view('pages.contact',compact('var'));
        return view('pages.contact',[
            'var' => 'hello look 12',
            // oporer $var coment line k niche aivabe likha jai
        ]);
    }

    function over(){
        // $var='hello world';
        // return view('pages.contact',compact('var'));
        return view('pages.contact',[
            'var' => 'hello over 12',
            // oporer $var coment line k niche aivabe likha jai
        ]);
    }
}
