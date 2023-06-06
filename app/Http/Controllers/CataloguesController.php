<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;
use Illuminate\Support\Facades\DB;

class CataloguesController extends Controller
{
    //
    public function getBlockCatalog()
    {
        // $products = DB::table('catalogues')
        //             ->select('catID', 'product_name','img_name','img_ext')
        //             ->inRandomOrder()
        //             ->take(8)
        //             ->get();
        // return view('index', ['products', $products]);

        $products = Catalogue::inRandomOrder()
                    ->take(8)
                    ->get();

        return view('index', ['products' => $products]);
    }
}
