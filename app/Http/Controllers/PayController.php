<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;

use DB;

class PayController extends Controller
{
    public function index($order_no){
        return view('payment',compact('order_no'));
    }

    public function pay(Request $request){
        $data = Order::where('order_no',$request->order_no)->first();

        $data->status = 1;

        $data->update();

        // return view('history');
        return redirect()->route('pay.history');
    }

    public function history(Request $request){
        $search = "";
        $data = Order::with('topup','produk');

        if($request->input('search')){
            $search = $request->search;

            $data = $data->whereRaw("order_no Like '%$search%'");
        }

        $data = $data->paginate(20);
        

        return view('history',compact('data'));
    }
}
