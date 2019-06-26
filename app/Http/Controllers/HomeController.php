<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Layout;
use App\Social;
use App\Footer;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CheckoutRequest;
use Mail;
use App\Mail\OrderMail;

class HomeController extends Controller
{
    public function index(Request $req)
    {
        $social = Social::first();
        $layout = Layout::first();
        $products = Product::where('status', 1)
            ->get();
        $populars = Product::where('status', 1)
            ->orderBy('sold', 'DESC')
            ->limit(20)
            ->get();
        $newProducts = Product::where('new', 1)
            ->get();
        return view('public.home')
            ->with('products', $products)
            ->with('populars', $populars)
            ->with('newProducts', $newProducts)
            ->with('layout', $layout)
            ->with('social', $social);
    }
    public function list(Request $req, $cat)
    {
        $products = DB::table('view_product')
            ->where('status', 1)
            ->where('category_name', $cat)
            ->orWhere('type_name', $cat)
            ->paginate(20);
        return view('public.product-list')
            ->with('products', $products)
            ->with('title', $cat);
    }
    public function newArrival(Request $req)
    {
        $products = DB::table('view_product')
            ->where('status', 1)
            ->where('new', 1)
            ->paginate(20);
        $title = "New arrivals";
        return view('public.product-list')
            ->with('products', $products)
            ->with('title', $title);
    }
    public function offers(Request $req)
    {

        $products = DB::table('view_product')
            ->where('status', 1)
            ->where('discount', '>', 0)
            ->paginate(20);
        $title = "Offers";
        return view('public.product-list')
            ->with('products', $products)
            ->with('title', $title);
    }
    public function details(Request $req, $code)
    {
        $product = DB::table('view_product')
            ->where('code', $code)
            ->first();
        $product->specification = json_decode($product->specification);
        return view('public.product-details')
            ->with('product', $product);
    }
    public function checkout(Request $req, $code)
    {
        return view('public.checkout');
    }
    public function order(CheckoutRequest $req, $code)
    {
        $product = Product::where('code', $code)
            ->first();
        if ($product->quantity > 0){
            $order = new Order();
            $order->product_id = $product->id;
            if ($product->discount > 0){
                $order->selling_price = $product->discount_price;
            }else{
                $order->selling_price = $product->price;
            }
            $order->name = $req->name;
            $order->mobile1 = $req->mobile1;
            if ($req->mobile2){
                $order->mobile2 = $req->mobile2;
            }
            if ($req->email){
                $order->email = $req->email;
            }
            $order->address = $req->address;
            $order->order_date = date('Y-m-d');
            $order->status = 3;
            if ($order->save() > 0){
                $product->quantity = $product->quantity - 1;
                $product->sold= $product->sold + 1;
                $product->save();
                if ($req->email){
                    Mail::send(new OrderMail($order->id));
                }
            }
        }
        return view('public.confirm-order')
            ->with('order', $order)
            ->with('product', $product);
    }
//    public function confirm(Request $req)
//    {
//        return view('public.confirm-order');
//    }
    public function search(Request $req)
    {
        $key = $req->key;
        $products = DB::table('view_product')
            ->where('status', 1)
            ->where('name', 'like', '%'.$key.'%')
            ->orWhere('code', 'like', '%'.$key.'%')
            ->orWhere('category_name', 'like', '%'.$key.'%')
            ->orWhere('type_name', 'like', '%'.$key.'%')
            ->orWhere('specification', 'like', '%'.$key.'%')
            ->paginate(20);
        return view('public.product-list')
            ->with('products', $products)
            ->with('title', $key);
    }
    public function policy(Request $request, $key)
    {
        $footer = Footer::first();
        $data = json_decode($footer->pluck($key)->first());
        return view('public.footer-details')
            ->with('data', $data);
    }
}
