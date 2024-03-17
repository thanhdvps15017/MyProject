<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\orderDetail;
use DB;

class BEOrderController extends Controller
{
    public function index()
    {
        $order = Order::paginate(5);
    
        return view('Admin.Oder.index', ['order' => $order])->with('i', (request()->input('page', 1) - 1) * 5);
        ;
    }
    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();
        $orderDetail = orderDetail::all();
        // foreach ($orderDetail as $key => $value) {
        //     $detail = DB::table('order_detail')->where('order_id', '=', $id)->get();
        //     $detail->delete();
        // }
        return redirect()->route('order.show')->with('success', 'Đơn hàng đã được xóa.');
    }

    public function detail($id)
    {
        // $detail = orderDetail::where('order_id', '=', $id);
        $detail = DB::table('order_detail')->where('order_id', '=', $id)->get();

        return view('Admin.Oder.detail', ['detail' => $detail])->with('i', 0);
    }
}
