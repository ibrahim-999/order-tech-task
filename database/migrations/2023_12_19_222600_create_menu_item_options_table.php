<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_item_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_item_id');
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onUpdate('cascade')->onDelete('cascade');

            $table->string('name');
            $table->integer('max_qty');
            $table->float('price');
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
        Schema::dropIfExists('menu_item_options');
    }
}
