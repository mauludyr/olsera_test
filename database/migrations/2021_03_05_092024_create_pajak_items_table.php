<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePajakItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pajak_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pajak_id');
            $table->foreignId('item_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pajak_id')->references('id')->on('pajaks');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pajak_items');
    }
}
