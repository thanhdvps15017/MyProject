<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BEBrandController extends Controller
{
    public function index()
    {
        $brand = Brand::paginate(5);
        return view('Admin.Brand.brand', ['brand' => $brand])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên thương hiệu !',
        ]);

        $brand = new Brand([
            'name' => $request->name,
        ]);
        $brand->save();
        return redirect()->route('brand.show')->with('success', 'Thêm thành thương hiệu thành công !');

    }
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('Admin.Brand.edit', ['brand' => $brand]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên thương hiệu !',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('brand.show')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brand.show')->with('success', 'Sản phẩm đã được xóa.');
    }
}
