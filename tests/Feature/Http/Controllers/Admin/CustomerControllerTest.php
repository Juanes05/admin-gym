<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
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
    
}
