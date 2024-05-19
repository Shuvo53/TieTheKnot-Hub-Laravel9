<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cart()
    {


        return view('cart');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->name,
                "photo" => $product->image,
                "price" => $product->selling_price,
                "quantity" => 1
            ];
        }


        session()->put('cart', $cart);





        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function success()
    {
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $cart = session('cart');
        foreach ($cart as $id => $details) {
            $item = Product::findOrFail($id);
            $order = new Order();
                $order->user_id = auth()->user()->id;
                $order->lname = auth()->user()->name;
                $order->email = auth()->user()->email;
                $order->phoneno = '01721213161';
                $order->address1 = 'KUET';
                $order->address2 = 'Fulbari';
                $order->city = 'Khulna';
                $order->state = 'Khulna';
                $order->country = 'Bangladesh';
                $order->pincode = '9203';
                $order->total_price = $details['price'];
                $order->status = 1;
                $order->tracking_no = generateRandomString();

                $order->save();

            $orderlist = new OrderItem();

            $orderlist->order_id = Order::all()->count();
            $orderlist->prod_id = $id;
            $orderlist->qty = 1;
            $orderlist->price = $details['price'];

            $orderlist->save();
        }
        session()->forget('cart');
        return view('success');
    }
}
