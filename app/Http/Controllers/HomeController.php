<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Topbar;
use Illuminate\Http\Request;
use App\Models\Perfume;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $perfumes = Perfume::where('top_sell','=','1')->get();
        $topBars = Topbar::all();
        $onSale=Perfume::where('discount_price','!=','0')->limit(4)->get();
        return view("pages.main.home",compact('perfumes','topBars','brands','onSale'));
    }

}
