<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRawMaterialsPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_raw_materials_pivot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('raw_materials_id')->constrained('raw_materials');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('quantity');
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
        Schema::dropIfExists('product_raw_materials_pivot');
    }
}
