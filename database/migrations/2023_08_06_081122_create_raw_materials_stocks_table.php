<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMaterialsStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_materials_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rawmaterial_id')->constrained('raw_materials');
            $table->float('quantity')->default(0);
            $table->foreignId('unit_id')->constrained('units');
            $table->float('unit_price');
            $table->integer('memo_no');
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('raw_materials_stocks');
    }
}
