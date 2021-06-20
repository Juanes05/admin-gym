<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pay;
use Illuminate\Http\Request;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pays',
        [
            'pays' => Pay::with('customer')->get()
        ]
        
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.pay-create');
    }

    public function create_by_id($customer_id)
    {
        return view('admin.pay-create',compact('customer_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'pay' => 'numeric',
            'pay_reference'  => 'unique:pays'
            
        ]);

       Pay::create($request->all());

        return redirect()->route('pays.index')->with('status', 'Pago Agregado');
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
    public function edit(Request $request,Pay $pay)
    {
        return view('admin.pay-edit',compact('pay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay $pay)
    {
      

        $pay->update($request->all());

        return redirect()->route('pays.index')->with('status', 'Pago Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay $pay)
    {
       
        $pay->delete();

        return redirect()->route('pays.index')->with('status_destroy', 'Pago Eliminado');
    }
}
