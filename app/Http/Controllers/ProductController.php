<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class ProductController extends Controller
{
    public function Index()
    {
        $products = Product::paginate('12');
        $brand = DB::table('brand')->get();
        return view('Product.index', ['products' => $products, 'brand' => $brand])->with('i', (request()->input('page', 1) - 1) * 12);
        ;
    }
    public function detail($id)
    {
        $productsNew = DB::table('product')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();
        $product = DB::table('product')->find($id);
        return view('Product.detail', ['product' => $product, 'productsNew' => $productsNew]);
    }

}
