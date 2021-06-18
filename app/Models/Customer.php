<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable =[

        'name','lastname','document','state'
    ];


    public function pays()
    {
        return $this->hasMany(Pay::class);
    }
}
