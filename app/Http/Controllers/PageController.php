<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // practice - Routs & controllers 
    public function index()
    {
        return \view('pages.index');
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
