<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleProductRawmaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_product_rawmaterials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('raw_materials_id')->constrained('raw_materials');
            $table->foreignId('single_product_id')->constrained('single_products');
            // $table->foreignId('packaging_id')->constrained('packagings');
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
        Schema::dropIfExists('single_product_rawmaterials');
    }
}
