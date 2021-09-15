<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use DB;
use App\Customer;
use App\shipping;
use App\OrderDetail;
use PDF;

class OrderController extends Controller
{
    public function manage_order_info()
    {
        $orders = Order::all();
        return view('dashboard.order.order_manage',['orders'=>$orders]);
    }
    public function order_detail_by_order_id($order_id)
    {
        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = shipping::find($order->shipping_id);
        $order_details = OrderDetail::where('order_id',$order->id)->get();
        return view('dashboard.order.order_details',['order'=>$order,'customer'=> $customer,'shipping'=>$shipping,'order_details'=>$order_details]);
    }
    public function order_invoice_view_by_order_id($order_id)
    {
        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = shipping::find($order->shipping_id);
        $order_details = OrderDetail::where('order_id',$order->id)->get();
        return view('dashboard.order.order_invoice',['order'=>$order,'customer'=> $customer,'shipping'=>$shipping,'order_details'=>$order_details]);
    }
    public function order_invoice_download_by_order_id($order_id)
    {
        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = shipping::find($order->shipping_id);
        $order_details = OrderDetail::where('order_id',$order->id)->get();

        $pdf = PDF::loadView('dashboard.order.order_invoice_download', ['order'=>$order,'customer'=> $customer,'shipping'=>$shipping,'order_details'=>$order_details]);
        return $pdf->download($customer->first_name.' '.$customer->last_name.'id '.$order->id);

        return back();

    }
}
