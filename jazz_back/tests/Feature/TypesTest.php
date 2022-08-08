<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class TypesTest extends TestCase
{

   
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_an_admin_can_create_a_type()
    {
        $response = $this->post('/api/types', [
            'typeName' => '33t',
        ]);
        $response->assertOk()

            ->assertJson([
                'message' => 'Type created.',

            ]);
    }

    public function test_an_admin_can_get_informations_from_all_the_types()
    {
        $response = $this->get('/api/types', [

        ]);
        $response->assertOk()
        ->assertJson([
            'message' => 'Types fetched.',

        ]);

    }

    public function test_an_admin_can_get_informations_from_a_type()
    {

        
        $response = $this->get('/api/types/1', [

        ]);
        $response->assertOk();

         
    }

    public function test_an_admin_can_update_informations_from_a_type()
    {
        $response = $this->put('/api/types/1', [

            'typeName' => '45t'

        ]);
        $response->assertOk();

         
    }

    public function test_an_admin_can_delete_a_type()
    {
        $response = $this->delete('/api/types/1', [

            

        ]);
        $response->assertOk();

         
    }
}
