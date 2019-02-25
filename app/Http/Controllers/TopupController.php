<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Topup;
use App\Order;

use DB;
use Auth;

class TopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules      =   [ 
            'phone' => 'required|digits_between:7,12|phone_number',
        ];
        
        $messages   =   [
            'required'  => 'Field :attribute harus diisi.',
            'digits_between' => 'Field :attribute panjang nya harus 7 - 12.',
            'phone_number' => 'Field :attribute tidak sesuai format.'
        ];

        $this->validate($request, $rules, $messages);

        $diskon = $request->value * 0.05;
        $total = $request->value+$diskon;
        
        DB::beginTransaction();

        $topup = new Topup();
        $topup->phone = $request->phone;
        $topup->value = $request->value;

        $topup->save();

        $create = new Order();
        $create->total = $total;
        $create->order_no = rand(0000000000,9999999999);
        $create->user_id = Auth::user()->id;
        $create->other_id = $topup->id;
        $create->status     = 0;


        $create->save();
        DB::commit();

        $message = "Your mobile phone number  ".$request->phone." will receive Rp ".number_format($topup->value,0,".",".");

        return view('success_order',compact('message','create'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
