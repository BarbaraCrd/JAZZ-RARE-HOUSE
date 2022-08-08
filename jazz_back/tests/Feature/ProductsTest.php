<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class ProductsTest extends TestCase
{

   
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // public function test_an_admin_or_an_user_can_add_a_product_to_the_bdd()
    // {
    //     $response = $this->post('/api/products', [

    //         'title' => 'best of',
    //         'artist' => 'marvin Gay',
    //         'label' => 'motown',
    //         'millesime' => '1965',
    //         'price' => '999',
    //         'description' => 'the very best of',
    //         'picture1' => 'required',
    //         'picture2' => 'required',
    //         'picture3' => 'required',
    //         'picture4' => 'required',
    //         'type_id' => '1',
    //         'user_id' => '2',
    //         'genre_id' => '1',
    //         'statut' => 'ok',
    //         'views' => '1'

    //     ]);
    //     $response->assertOk()

    //         ->assertJson([
    //             "message" => "product created successfully."

    //         ]);
    // }




}