<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * @param $categoreName
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryAction($categoreName)
    {
        $category = Categories::where('latin_url', '=', $categoreName)->get();

        if ($category) {
            foreach ($category as $k) {
            $categoryid=  $k->id;
    }
           $goo = Goods::where('category_id', '=', $categoryid)->get();
            return view('goods', ['goo' => $goo]);
       }

   }
}
