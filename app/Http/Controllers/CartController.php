<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\User;
use App\Models\orderDetail;
use Auth;

class CartController extends Controller
{
    // CartController.php
    public function add(Product $product)
    {
        $cart = session()->get('cart');
        // Nếu giỏ hàng chưa tồn tại, tạo mới
        if (!$cart) {
            $cart = [
                $product->id => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'quantity' => 1,
                    'price' => $product->price,
                    'total' => $product->price,
                ]
            ];
        } else {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity']++;
            } else {
                // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
                $cart[$product->id] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'quantity' => 1,
                    'price' => $product->price,
                ];
            }
        }

        // Lưu giỏ hàng vào session

        session()->put('cart', $cart);

        session()->flash('message', 'Thêm  sản  phẩm  vào  giỏ  hàng thành  công.');

        return back();
    }
    public function remove(Product $product)
    {
        $cart = session()->get('cart');

        unset($cart[$product->id]);

        session()->put('cart', $cart);

        return redirect()->route('cart.show');
    }
    public function update(Request $request)
    {

        // Lấy giỏ hàng từ session, nếu không có thì tạo mới một mảng trống
        $cart = session()->get('cart');

        // Duyệt qua từng sản phẩm trong yêu cầu và cập nhật giỏ hàng
        foreach ($request->items as $item) {
            $id = $item['id'];
            $quantity = $item['quantity'];

            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            $existingIndex = null;
            foreach ($cart as $index => $cartItem) {
                if ($cartItem['id'] == $id) {
                    $existingIndex = $index;
                    break;
                }
            }

            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            if ($existingIndex !== null) {
                $cart[$existingIndex]['quantity'] = $quantity;
            } else {
                // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
                $cart[] = [
                    'id' => $id,
                    'quantity' => $quantity,
                    // Bạn cần lấy giá sản phẩm từ cơ sở dữ liệu hoặc tính toán dựa trên sản phẩm
                ];
            }
        }

        // Cập nhật giỏ hàng trong session
        Session::put('cart', $cart);

        // Chuyển hướng lại đến trang giỏ hàng sau khi cập nhật thành công
        return redirect('/cart');
    }
    public function checkout()
    {
        $user = Auth::user();
        $cart = session()->get('cart');
        $total = 0;

        foreach ($cart as $item) {
            // Thêm trường mới 'totalPrice'
            $item['totalPrice'] = $item['quantity'] * $item['price']; // Giả sử có trường 'price'
            $total += $item['totalPrice'];
        }
        Session::put('total', $total);
        return view('Cart.checkout', compact('cart'), ['total' => $total, 'user' => $user]);
    }
    public function payment(Request $request)
    {

        $user = Auth::user();
        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $item) {
            // Thêm trường mới 'totalPrice'
            $item['totalPrice'] = $item['quantity'] * $item['price']; // Giả sử có trường 'price'
            $total += $item['totalPrice'];
        }
        if ($request->payment == 'COD') {
            $order = new order;
            $order->userID = $user->id;
            $order->name = $request->name;
            $order->tel = $request->tel;
            $order->city = $user->district ?? $request->city;
            $order->district = $user->district ?? $request->district;
            $order->ward = $user->ward ?? $request->ward;
            $order->address = $user->address ?? $request->address;
            $order->note = $request->note;
            $order->payment = $request->payment;
            $order->total = $total ?? $request->total;
            $order->save();

            foreach ($cart as $key => $value) {
                $product = Product::where('id', $value['id'])->first();
                $order_details = new orderDetail;
                $order_details->order_id = $order->id;
                $order_details->user_id = $user->id;
                $order_details->product_id = $product->id;
                $order_details->productName = $product->name;
                $order_details->quantity = $value['quantity'];
                $order_details->price = $product->price;
                $order_details->save();
            }

            session()->forget('cart');
            return redirect()->route('home')->with('message', 'Đặt  hàng  thành công');
        }
        if ($request->payment == 'CART') {
            dd($request->payment);
        }

    }
    public function index()
    {
        $cart = session()->get('cart');

        return view('Cart.show', compact('cart'));
    }

}
