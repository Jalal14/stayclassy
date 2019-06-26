<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $req)
    {
        $status = "orders";
        $orders = DB::table('view_order')
            ->orderBy('order_date', 'DESC')
            ->get();
        return view('admin.order.list')
            ->with('orders', $orders)
            ->with('status', $status);
    }
    public function pending(Request $req)
    {
        $status = "pending orders";
        $orders = DB::table('view_order')
            ->where('status', 3)
            ->orderBy('order_date', 'DESC')
            ->get();
        return view('admin.order.list')
            ->with('orders', $orders)
            ->with('status', $status);
        return view('admin.order.list');
    }
    public function returns(Request $req)
    {
        $status = "returned orders";
        $orders = DB::table('view_order')
            ->where('status', 5)
            ->orderBy('order_date', 'DESC')
            ->get();
        return view('admin.order.list')
            ->with('orders', $orders)
            ->with('status', $status);
        return view('admin.order.list');
    }
    public function delivered(Request $req)
    {
        $status = "delivered orders";
        $orders = DB::table('view_order')
            ->where('status', 4)
            ->orderBy('order_date', 'DESC')
            ->get();
        return view('admin.order.list')
            ->with('orders', $orders)
            ->with('status', $status);
        return view('admin.order.list');return view('admin.order.list');
    }
    public function cancelled(Request $req)
    {
        $status = "cancelled orders";
        $orders = DB::table('view_order')
            ->where('status', 6)
            ->orderBy('order_date', 'DESC')
            ->get();
        return view('admin.order.list')
            ->with('orders', $orders)
            ->with('status', $status);
        return view('admin.order.list');return view('admin.order.list');
    }
    public function show(Request $req, $id)
    {
        $order = DB::table('view_order')
            ->where('id', $id)
            ->first();
        return view('admin.order.details')
            ->with('order', $order);
    }
    public function deliver(Request $req, $id)
    {
        $order = Order::find($id);
        $order->status = 4;
        $order->save();
        return redirect()->route('order.index');
    }
    public function return(Request $req, $id)
    {
        $order = Order::find($id);
        $order->status = 5;
        $order->save();
        return redirect()->route('order.index');
    }
    public function cancel(Request $req, $id)
    {
        $order = Order::find($id);
        $order->status = 6;
        $order->save();
        return redirect()->route('order.index');
    }
}
