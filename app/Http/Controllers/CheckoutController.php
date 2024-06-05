<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        return view('checkout', compact('cartItems'));
    }

    private function updateProductQuantity($productId, $k)
    {
        $product = Product::find($productId);

        if ($product) {
            $product->quantity -= $k;

            if ($product->quantity < 0) {
                $product->quantity = 0;
            }

            $product->save();
        }
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                's_name' => 'required|string|max:120',
                's_phone' => 'required|numeric|digits:10',
                's_locality' => 'required|string|max:120',
                's_address' => 'required',
                's_city' => 'required|string|max:120',
                's_country' => 'required',
                's_state' => 'required'
            ],
            [
                'required' => ':attribute must be required',
                'string' => ':attribute must be string',
                'numeric' => '::attribute must be numeric',
                'max' => ':attribute maximum 120 characters',
                'digits' => ':attribute maximum 10 digits',
            ],
            [
                's_name' => 'Name',
                's_phone' => 'Phone',
                's_locality' => 'Locality',
                's_address' => 'Address',
                's_city' => 'City',
                's_country' => 'Country',
                's_state' => 'State'
            ]
        );
        $name = $request->s_name;
        $phone = $request->s_phone;
        $locality = $request->s_locality;
        $note = $request->s_note;
        $address = $request->s_address;
        $city = $request->s_city;
        $country = $request->s_country;
        $state = $request->s_state;
        $payment = $request->s_payment;
        $time = Carbon::now()->format('Y-m-d H:i:s');
        $code = strtoupper(time() . Str::random(10));

        $customer = Customer::create([
            'name' => $name,
            'phone' => $phone,
            'locality' => $locality,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'state' => $state,
            'note' => $note
        ]);

        $order = Order::create([
            'code' => $code,
            'quantity' => Cart::instance('cart')->count(),
            'subtotal' => Cart::instance('cart')->subtotal(),
            'total' => Cart::instance('cart')->total(),
            'tax' => Cart::instance('cart')->tax(),
            'shipping' => 5,
            'orderDate' => $time,
            'payment' => $payment,
            'customer_id' => $customer->id,
        ]);

        foreach (Cart::instance('cart')->content() as $item) {
            $order_item = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'image_url' => $item->model->image,
                'quantity' => $item->qty,
                'price' => $item->price,
            ]);
            $this->updateProductQuantity($item->id, $item->qty);
        }
        Cart::instance('cart')->destroy();
        return redirect()->route('checkout.thankyou', ['code' => $code]);
    }

    public function thankyou($code){
        $order =  Order::where('code', $code)->first();
        $order_id = $order->id;
        $dateOrder = Carbon::parse($order->orderDate)->format('F j, Y');
        $orderItems = OrderItem::where('order_id', $order_id)->get();
        $customer_id = $order->customer_id;
        $customer = Customer::where('id', $customer_id)->first();
        return view('thankyou', compact('order', 'code', 'order_id', 'orderItems', 'customer', 'dateOrder'));
    }
}
