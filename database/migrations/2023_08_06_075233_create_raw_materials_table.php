<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('size')->nullable();
            $table->decimal('quantity',12,4)->default(0);
            $table->foreignId('subcategory_id')->nullable()->constrained('subcategories');
            // $table->foreignId('raw_materials_shop_id')->constrained('raw_materials_shops');
            $table->foreignId('unit_id')->constrained('units');
            $table->integer('memo_no');
            $table->decimal('unit_price',12,4);
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
        Schema::dropIfExists('raw_materials');
    }
}
