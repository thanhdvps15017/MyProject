<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;

class HomeController extends Controller
{
    public function Index()
    {
        //láy 8 sản phẩm  mới  nhất
        $productsNew = DB::table('product')
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        //láy toàn bộ
        $brand = DB::table('product')
            ->orderBy('created_at', 'desc')
            ->get();
        //slider
        $slider = DB::table('slider')->get();
        //cart
        $data = session()->get('cart');
        //top-product-nike
        $topNike = DB::table('product')->where('brand', '=', 'Nike')->orderBy('created_at', 'desc')->limit(8)->get();
        //top-product-adidas
        $topAdidas = DB::table('product')->where('brand', '=', 'adidas')->orderBy('created_at', 'desc')->limit(8)->get();
        //top-product-Jordan
        $topJordan = DB::table('product')->where('brand', '=', 'Jordan')->orderBy('created_at', 'desc')->limit(8)->get();
        $products = DB::table('product')->get();
        return view('pages.home', [
            'data' => $data,
            'productsNew' => $productsNew,
            'brand' => $brand,
            'slider' => $slider,
            'topNike' => $topNike,
            'topAdidas' => $topAdidas,
            'topJordan' => $topJordan,
            'products' => $products
        ]);
    }
    public function Contact()
    {
        return view('pages.contact');
    }
    public function About()
    {
        return view('pages.about');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $results = Product::where('name', 'like', '%' . $query . '%')->get();

        return response()->json($results);
    }

}
