<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use DB;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('Admin.Slider.slider', ['slider' => $slider]);
    }

    public function update(Request $request, $id)
    {

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);

            $slider = Slider::findOrFail($id);
            $slider->content1 = $request->content1;
            $slider->content2 = $request->content2;
            $slider->content3 = $request->content3;
            $slider->content4 = $request->content4;
            $slider->images = $imageName;
            $slider->save();
        } else {
            $slider = Slider::findOrFail($id);
            $slider->content1 = $request->content1;
            $slider->content2 = $request->content2;
            $slider->content3 = $request->content3;
            $slider->content4 = $request->content4;
            $slider->save();
        }
        return redirect()->route('slider.show')->with('success', 'Cập  nhập  thành  công.');

    }

}
