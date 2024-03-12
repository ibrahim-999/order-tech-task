<?php

use App\Models\MenuItem;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('menu_item_options', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('max_qty');
            $table->float('price');

            $table->foreignIdFor(MenuItem::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_item_options');
    }
}
