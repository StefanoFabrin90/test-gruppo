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
            $table->tinyInteger('category_id');
            $table->string('name', 100);
            $table->string('slug')->unique();
            $table->text('body');
            $table->float('price', 8, 2)->unsigned();
            $table->float('old_price', 8, 2)->unsigned();
            $table->text('image');
            $table->boolean('frozen', false);
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
