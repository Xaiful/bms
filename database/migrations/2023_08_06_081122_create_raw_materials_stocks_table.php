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
            $table->decimal('quantity',12,2)->default(0);
            $table->decimal('last_quantity',12,2)->nullable();
            $table->foreignId('unit_id')->constrained('units');
            $table->decimal('unit_price',12,2);            
            $table->integer('memo_no');
            $table->decimal('amount',12,2)->nullable();
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
