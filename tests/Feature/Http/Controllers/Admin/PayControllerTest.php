<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Pay;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PayControllerTest extends TestCase
{
    use WithFaker,RefreshDatabase;

    public function test_guest()
    {
      
        $this->get('admin/pays')->assertRedirect('login');
        $this->get('admin/pays/1')->assertRedirect('login');
        $this->get('admin/pays/1/edit')->assertRedirect('login');
        $this->put('admin/pays/1')->assertRedirect('login');
        $this->delete('admin/pays/1')->assertRedirect('login');
        $this->delete('admin/pays/create')->assertRedirect('login');
        $this->post('admin/pays/')->assertRedirect('login');
    }

    public function test_index_with_data()
    {
        $user = User::factory()->create();
        $pay= Pay::factory()->create();

        $this
        ->actingAs($user)
        ->get('admin/pays')
        ->assertStatus(200)
        ->assertSee($pay->id)
        ->assertSee($pay->customer->name)
        ->assertSee($pay->pay);
    }

    public function test_store()
    {


        $user = User::factory()->create();
        $customer =  Customer::factory()->create();
        

        $data = [
            'customer_id' => $customer->id,
            'pay' => 60000,
            'pay_reference' => rand(1111,5555),
           
        ];

        $this
        ->actingAs($user)
        ->post('admin/pays',$data)
        ->assertRedirect('admin/pays');


        $this->assertDatabaseHas('pays',$data);

    }


    public function test_redirect_store_by_customer_id()
    {


        $user = User::factory()->create();
        $customer =  Customer::factory()->create();
        


        $this
        ->actingAs($user)
        ->get("admin/pays/create/$customer->id")
        ->assertStatus(200)
        ->assertSee($customer->id);


       

    }


    

    
}
