<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

class BEProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(10);
        // $product = Product::all();
        $brand = Brand::all();
        return view('Admin.Product.product', ['brand' => $brand], ['product' => $product])->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'brand' => 'required',
            'quantity' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm!',
            'price.required' => 'Vui lòng nhập giá tên sản phẩm!',
            'price.numeric' => 'Vui lòng nhập số!',
            'price.min' => 'Vui lòng nhập giá lớn hơn 0!',
            'brand.required' => 'Vui lòng chọn thương hiệu!',
            'quantity.required' => 'Vui lòng nhập giá tên sản phẩm!',
            'quantity.numeric' => 'Vui lòng nhập số!',
            'quantity.min' => 'Vui lòng nhập giá lớn hơn 0!',
            'image.required' => 'Vui lòng upload hình ảnh sản phẩm !',
            'description.required' => 'Vui lòng nhập mô tả sản  phẩm!',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $product = new Product;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->brand = $request->brand;
            $product->quantity = $request->quantity;
            $product->image = 'uploads/' . $imageName;
            $product->description = $request->description;
            $product->save();
            return redirect()->route('product.show')->with('success', 'Sản phẩm đã  được  thêm  mới  thành  công.');
        }
    }

    public function edit($id)
    {
        $brand = Brand::all();
        $product = Product::find($id);
        return view('Admin.Product.edit', ['brand' => $brand, 'product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'brand' => 'required',
            'quantity' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm!',
            'price.required' => 'Vui lòng nhập giá tên sản phẩm!',
            'price.numeric' => 'Vui lòng nhập số!',
            'price.min' => 'Vui lòng nhập giá lớn hơn 0!',
            'brand.required' => 'Vui lòng chọn thương hiệu!',
            'quantity.required' => 'Vui lòng nhập giá tên sản phẩm!',
            'quantity.numeric' => 'Vui lòng nhập số!',
            'quantity.min' => 'Vui lòng nhập giá lớn hơn 0!',
            'image.required' => 'Vui lòng upload hình ảnh sản phẩm !',
            'description.required' => 'Vui lòng nhập mô tả sản  phẩm!',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->brand = $request->brand;
            $product->quantity = $request->quantity;
            $product->image = 'uploads/' . $imageName;
            $product->description = $request->description;
            $product->save();
        }


        return redirect()->route('product.show')->with('success', 'Sản phẩm đã  được sửa  thành  công.');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.show')->with('success', 'Sản phẩm đã được xóa.');
    }
}
