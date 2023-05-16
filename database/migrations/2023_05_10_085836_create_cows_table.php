<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cows', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2023_05_10_085836_create_cows_table.php
            $table->text('name');
            $table->integer('age');
            $table->enum('gender', ['male', 'female']);
            $table->integer('weight');
            $table->string('color');
            $table->string('importer');
=======
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->integer('price');
            $table->text('images');
            $table->boolean('status')->default(1);
>>>>>>> parent of 9875aff (First commit):database/migrations/2022_11_23_050024_create_posts_table.php
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
        Schema::dropIfExists('cows');
    }
}
