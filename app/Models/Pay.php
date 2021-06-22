<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Pay extends Model
{
    use HasFactory;


    protected $fillable =[

        'customer_id','pay','pay_reference', 'end_date',
    ];



    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    public static function updateCustomerState()
    {
        $nowDate = Carbon::now();
        
        $registersCustomers= Customer::all();

        foreach ($registersCustomers as $customer) {
            
                $customerId = $customer->id;

            


                if(Pay::where('customer_id',$customerId)->exists())
                {

                    $latestPay=Pay::where('customer_id',$customerId)->latest()->first();

                    

            

                
                if(Carbon::createFromFormat('Y-m-d H:i:s', $latestPay->end_date)->gt($nowDate) )
                {

                    $customerStatus=1;

                }


                else{

                    $customerStatus=0;
                 
                }


        

            }

            else{
                $customerStatus=0;
            }


            DB::table('customers')
            ->where('id', $customerId)
            ->update(['state' => $customerStatus]);


        }


        

    }
}
