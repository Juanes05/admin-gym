<?php

namespace Tests\Unit\Models;

use App\Models\Customer;
use App\Models\Pay;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PayTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_belongs_to_customer()
    {
        

        $pay = Pay::factory()->create();
        $this->assertInstanceOf(Customer::class,$pay->customer);
    }
}
