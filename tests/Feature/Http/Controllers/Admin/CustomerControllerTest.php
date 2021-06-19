<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer;
use App\Models\User;

class CustomerControllerTest extends TestCase
{
   
    use WithFaker,RefreshDatabase;

    public function test_guest()
    {
      
        $this->get('admin/customers')->assertRedirect('login');
        $this->get('admin/customers/1')->assertRedirect('login');
        $this->get('admin/customers/1/edit')->assertRedirect('login');
        $this->put('admin/customers/1')->assertRedirect('login');
        $this->delete('admin/customers/1')->assertRedirect('login');
        $this->delete('admin/customers/create')->assertRedirect('login');
        $this->post('admin/customers/')->assertRedirect('login');
    }

    public function test_store()
    {


        $customer = User::factory()->create();

        $data = [
            'name' => $this->faker->firstNameMale,
            'lastname' => $this->faker->lastName,
            'document' => rand(1111,5555),
            'state' => rand(0,1),
        ];

        $this
        ->actingAs($customer)
        ->post('admin/customers',$data)
        ->assertRedirect('admin/customers');


        $this->assertDatabaseHas('customers',$data);

    }

    public function test_upgrade()
    {
        $user = User::factory()->create();

        $customer = Customer::factory()->create();

        $data = [
            'name' => $this->faker->firstNameMale,
            'lastname' => $this->faker->lastName,
            'document' => rand(1111,5555),
            'state' => rand(0,1),
        ];

        $this
        ->actingAs($user)
        ->put("admin/customers/$customer->id",$data)
        ->assertRedirect("admin/customers/");


        $this->assertDatabaseHas('customers',$data);
    }

    public function test_validate_store()
    {


        $customer = User::factory()->create();

        $data = [
            'name' => $this->faker->firstNameMale,
            'lastname' => $this->faker->lastName,
            'document' => rand(1111,5555),
            'state' => rand(0,1),
        ];

        $this
        ->actingAs($customer)
        ->post('admin/customers',[])
        ->assertStatus(302)
        ->assertSessionHasErrors(['name','document']);



    }

    public function test_validate_upgrade()
    {


        $customer = User::factory()->create();

        $data = [
            'name' => $this->faker->firstNameMale,
            'lastname' => $this->faker->lastName,
            'document' => rand(1111,5555),
            'state' => rand(0,1),
        ];

        $this
        ->actingAs($customer)
        ->post('admin/customers',[])
        ->assertStatus(302)
        ->assertSessionHasErrors(['name','document']);



    }

   

    public function test_index_with_data(){

        $user = User::factory()->create();
        $customer= Customer::factory()->create();

        $this
        ->actingAs($user)
        ->get('admin/customers')
        ->assertStatus(200)
        ->assertSee($customer->name)
        ->assertSee($customer->document);

        
    }

    public function test_delete()
    {
        $user = User::factory()->create();

        $customer = Customer::factory()->create();

        $this
        ->actingAs($user)
        ->delete("admin/customers/$customer->id")
        ->assertRedirect('admin/customers');

        $this->assertDatabaseMissing('customers', ['id' => $customer->id, 'name' => $customer->name]);
    }
    

    public function test_edit()
    {
        $user = User::factory()->create();

        $customer = Customer::factory()->create();

        $this

        ->actingAs($user)
        ->get("admin/customers/$customer->id/edit")
        ->assertStatus(200)
        ->assertSee($customer->name)
        ->assertSee($customer->document);

      
        
        
    }
}
