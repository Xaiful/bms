<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMaterialsRawMaterialShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_materials_raw_material_shop', function (Blueprint $table) {
            $table->id();
            $table->foreignId('raw_materials_shop_id')->constrained('raw_materials_shops');
            $table->foreignId('raw_material_id')->constrained('raw_materials');
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
        Schema::dropIfExists('raw_materials_raw_material_shop');
    }
}
