<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

public function ordersList()
{
    $orders = Order::with(['user', 'items.package'])->latest()->get();

    return view('admin.orders.list', compact('orders'));
}


public function orderDetails($id)
{
   $order = Order::with(['user', 'items.package.typess'])->findOrFail($id);

    return view('admin.orders.view-detail', compact('order'));
}
}
