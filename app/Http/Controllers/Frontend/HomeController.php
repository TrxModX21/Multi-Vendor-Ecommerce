<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\HomePageSetting;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        $flashSaleDate = FlashSale::first();
        $flashSaleItem = FlashSaleItem::where('show_at_home', 1)
            ->where('status', 1)->get();
        $popularCategories = HomePageSetting::where('key', 'popular_category_section')->first();
        $brands = Brand::where('status', 1)->where('is_featured', 1)->get();
        $typeBaseProduct = $this->getTypeBaseProduct();
        $categoryProductSliderSectionOne = HomePageSetting::where('key', 'product_slider_section_one')->first();
        $categoryProductSliderSectionTwo = HomePageSetting::where('key', 'product_slider_section_two')->first();
        $categoryProductSliderSectionThree = HomePageSetting::where('key', 'product_slider_section_three')->first();

        return view('frontend.home.home', compact('sliders', 'flashSaleDate', 'flashSaleItem', 'popularCategories', 'brands', 'typeBaseProduct', 'categoryProductSliderSectionOne', 'categoryProductSliderSectionTwo', 'categoryProductSliderSectionThree'));
    }

    public function getTypeBaseProduct()
    {
        $typeBaseProduct = [];

        $typeBaseProduct['new_arrival'] = Product::where(['product_type' => 'new_arrival', 'is_approved' => 1, 'status' => 1])
            ->orderBy('id', 'DESC')
            ->take(8)
            ->get();
        $typeBaseProduct['featured_product'] = Product::where(['product_type' => 'featured_product', 'is_approved' => 1, 'status' => 1])
            ->orderBy('id', 'DESC')
            ->take(8)
            ->get();
        $typeBaseProduct['top_product'] = Product::where(['product_type' => 'top_product', 'is_approved' => 1, 'status' => 1])
            ->orderBy('id', 'DESC')
            ->take(8)
            ->get();
        $typeBaseProduct['best_product'] = Product::where(['product_type' => 'best_product', 'is_approved' => 1, 'status' => 1])
            ->orderBy('id', 'DESC')
            ->take(8)
            ->get();

        return $typeBaseProduct;
    }
}
