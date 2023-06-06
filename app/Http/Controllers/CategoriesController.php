<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoriesController extends Controller
{
    //
    public function getCat()
    {
        // $categories =  Category::all();
        // return view('cat.index', ['categories' => $categories]);
        $categories = Category::all();
        
    }

}
