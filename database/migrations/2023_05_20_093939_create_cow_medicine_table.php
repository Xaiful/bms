<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCowMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cow_medicine', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cow_id')->constrained('cows');
            $table->foreignId('medicine_id')->constrained('medicines');
            $table->decimal('quantity');
            // $table->decimal('taka', 8, 2);
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
        Schema::dropIfExists('cow_medicine');
    }
}
