<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title', 255);
            $table->string('seotitle', 255);
            $table->string('mini_description', 255);
            $table->string('description', 255);
            $table->float('old_price', 8, 2);
            $table->float('new_price', 8, 2);
            $table->boolean('action');
            $table->boolean('new');
            $table->integer('attr');
            $table->boolean('watched');
            $table->integer('category_id');
           
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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
