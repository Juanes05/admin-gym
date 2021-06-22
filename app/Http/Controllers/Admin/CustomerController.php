<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.people',
        [
            'customers' => Customer::all()
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
        return view('admin.customer-create');
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

            'name' => ['required','max:255'],
            'document' => ['required','unique:customers','numeric'],
        ]);

       Customer::create($request->all());

        return redirect()->route('customers.index')->with('status', 'Usuario creado');
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
    public function edit(Request $request, Customer $customer)
    {
        
       
        return view('admin.customers-edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
  $request->validate([

            'name' => 'required',
            'document' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index');
    }


    public function showPays($customer_id)
    {

        $customer = new Customer();
      
        $customer = $customer->with('pays')->findOrFail($customer_id);

       
        return view('admin.customer-pays-show',compact('customer'));


    }

    public function showInactive()
    {

       

        return view('admin.people',
        [
            'customers' => Customer::where('state',0)->get()
        ]
        
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->pays()->delete();
        $customer->delete();

        return redirect()->route('customers.index')->with('status_destroy', 'Usuario Eliminado');;
    
    }
}
