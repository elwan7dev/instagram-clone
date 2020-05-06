<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // practice - Routs & controllers 
    public function index()
    {
        $name = "ahmed";
        $pass = '123';  // using compact() if you will pass vars
        // using with() if you will pass an array
        $data = array(
            'name' => 'ali',
            'id' => '123'
        );

        // pass using with()
        return \view('pages.index')->with($data);

        /* // pass using compact()
        return \view('pages.index' , \compact('name' , 'pass'));

        // pass using array - that retrived from DB
        return \view('pages.index' , ['data' => $data]) ;
         */
    }
    public function about()
    {
        return \view('pages.about');
    }
    public function service()
    {
        return \view('pages.services');
    }
}
