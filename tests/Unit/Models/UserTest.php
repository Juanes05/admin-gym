<?php

namespace Tests\Unit\Models;

use App\Models\Customer;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_has_many_pays()
    {

        $customer = new Customer();
        $this->assertInstanceOf(Collection::class,$customer->pays);
    }
}
