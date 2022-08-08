<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class GenresTest extends TestCase
{

    
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_an_admin_can_create_a_genre()
    {
        $response = $this->post('/api/genres', [
            'genreName' => 'blues',
        ]);
        $response->assertOk()

            ->assertJson([
                'success' => true,
                'message' => 'Genre created.',
                "data" => [
                    "genreName" => "blues",
                    'id'=> "1"
                ]

                

            ]);
    }

    public function test_an_admin_can_get_informations_from_all_the_genres()
    {
        $response = $this->get('/api/genres', [

        ]);
        $response->assertOk()
        ->assertJson([
            'message' => 'Genres fetched.',

        ]);

    }

    public function test_an_admin_can_get_informations_from_a_genre()
    {


        $response = $this->get('/api/genres/1', [

        ]);
        $response->assertOk();

         
    }

    public function test_an_admin_can_update_informations_from_a_genre()
    {
        $response = $this->put('/api/genres/1', [

            'genreName' => 'acid jazz'

        ]);
        $response->assertOk();

         
    }

    public function test_an_admin_can_delete_a_genre()
    {
        $response = $this->delete('/api/genres/1', [

            

        ]);
        $response->assertOk();

         
    }
}
