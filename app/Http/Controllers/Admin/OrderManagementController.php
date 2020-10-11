<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderManagementController extends Controller
{
    public function index()
    {
        $ModuleSlug = 'Order History';
        $restaurantId = Session::get('restaurantID');
        $ordersHistory = Order::select('orders.*', 'u.firstName', 'u.lastName')
        ->where('restaurant_id', $restaurantId)
        ->join('users as u', 'u.id', '=', 'orders.user_id')
        ->latest()->get();

        return view('admin.orders', compact('ModuleSlug', 'ordersHistory'));
    }

    public function orderDetail($orderId)
    {
        $ModuleSlug = 'Order History';
        $order = Order::select('orders.*', 'u.firstName', 'u.lastName', 'cd.name', 'cd.number')
        ->join('users as u', 'u.id', '=', 'orders.user_id')
        ->join('card_details as cd', 'cd.order_id', '=', 'orders.id')
        ->where('orders.id', $orderId)
        ->first();

        return view('admin.order-detail', compact('ModuleSlug', 'order'));
    }

    public function markDelivered(Order $order)
    {
        $order->order_status = 'delivered';
        $order->save();

        return redirect()->back();
    }
    
    public function markCompleted(Order $order)
    {
        $order->order_status = 'completed';
        $order->save();

        return redirect()->back();
    }
}
