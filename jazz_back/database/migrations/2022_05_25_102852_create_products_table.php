<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artist');
            $table->string('label');
            $table->year("millesime");
            $table->integer("price");
            $table->longText("description");
            $table->string("picture1")->nullable();
            $table->string("picture2")->nullable();
            $table->string("picture3")->nullable();
            $table->string("picture4")->nullable();
            $table->unsignedBigInteger("genre_id");
            $table->foreign("genre_id")->references('id')->on("genres")->onDelete("cascade");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references('id')->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("type_id");
            $table->foreign("type_id")->references('id')->on("types")->onDelete("cascade");
            $table->string('statut');
            $table->string('available');
            $table->integer('views');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
