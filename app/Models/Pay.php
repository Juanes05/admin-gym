<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;


    protected $fillable =[

        'customer_id','pay','pay_reference'
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
