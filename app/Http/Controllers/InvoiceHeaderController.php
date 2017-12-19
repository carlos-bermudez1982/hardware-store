<?php

namespace App\Http\Controllers;

use App\InvoiceHeader;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Item;
use DB;
use Carbon\Carbon;

class InvoiceHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pay');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('invoice_headers')->insertGetId(
            ['user_id' => $request->user_id, 'address_id' => $request->address_id,
             'phone_id' => $request->phone_id, 'card_id' => $request->card_id, 
             'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );
        foreach(Cart::instance(auth()->user()->email)->content() as $items) {
            DB::table('invoice')->insert(
                ['invoice_id' => $id, 'item_id' => $items->id, 
                 'quantity' => $items->qty, 'price' => $items->price, 
                 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            );
        }
        Cart::instance(auth()->user()->email)->destroy();
        return redirect()->route('cart.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvoiceHeader  $invoiceHeader
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceHeader $invoiceHeader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvoiceHeader  $invoiceHeader
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceHeader $invoiceHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvoiceHeader  $invoiceHeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceHeader $invoiceHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoiceHeader  $invoiceHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        Cart::instance($email)->destroy();
        return redirect()->route('cart.index');
    }
}
