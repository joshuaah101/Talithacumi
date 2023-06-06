<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Certification;


use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    private $menuId;

    //
    private function info()
    {
        $categories = Category::all();
        $contact = Contact::all();
        $certifications = Certification::all();

        $products = DB::table('catalogues')
                    ->inRandomOrder()
                    ->take(20)
                    ->get();

        $products_below_30k = DB::table('catalogues')
                            ->inRandomOrder()
                            ->where('price', '<=', 30000)
                            ->take(20)
                            ->get();
        $sliders = DB::table('sliders')
                    ->inRandomOrder()
                    ->take(5)
                    ->get();

        $kidsCorner = DB::table('catalogues')
                        ->inRandomOrder()
                        ->where('catId', 102233)
                        ->take(20)
                        ->get();


        return [
            'categories' => $categories,
            'contacts' => $contact,
            'sliders' => $sliders,
            'products' => $products,
            'priceCheckBelow30k' => $products_below_30k,
            'certifications' => $certifications,
            'kidsCorner' => $kidsCorner
        ];
    }

    public function index ()
    {
        return view('index', $this->info());
    }

    public function catalog($category_id)
    {
        $categories = Category::all();
        $contact = Contact::all();

        $catalog = DB::table('catalogues')
                    ->rightJoin('categories', 'catalogues.catId', '=', 'categories.catId')
                    ->select('catalogues.*','catalogues.img_name', 'catalogues.product_name', 'catalogues.img_ext', 'catalogues.description', 'catalogues.price', 'categories.icon', 'categories.category')
                    ->where('catalogues.catId', $category_id)
                    ->get();

        $catalog_label = DB::table('categories')
                ->select('category', 'catId')
                ->where('catId', $category_id)
                ->get();

        $exist = Category::all()->pluck('catId')->toArray();

        if(in_array($category_id, $exist)){
            return view('pages.catalog.index',
            [
                'category_id' => $category_id,
                'categories' => $categories,
                'exist' => $exist,
                'contacts' => $contact,
                'catalogues' => $catalog,
                'catalog_label' => $catalog_label
            ]);
        }
        else
        return view('pages.catalog.not-found');
        // abort(404, view('catalog.not-found'));
    }

    public function aboutPage ()
    {
        return view('pages.about', $this->info());
    }
}
