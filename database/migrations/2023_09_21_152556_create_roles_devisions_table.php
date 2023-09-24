<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesDevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_devisions', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('role_id')->constrained('roles');
            $table->foreignId('user_id')->constrained('users')->nullable();
            // $table->foreignId('role_id')->constrained('roles')->nullable();
            $table->foreignId('devision_id')->nullable()->constrained('devisions')->nullable();
            $table->foreignId('district_id')->nullable()->constrained('districts')->nullable();
            $table->foreignId('sub_district_id')->nullable()->constrained('sub_districts')->nullable();
            $table->foreignId('area_id')->nullable()->constrained('areas')->nullable();
            $table->foreignId('warehouse_id')->nullable()->constrained('warehouses')->nullable();
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
        Schema::dropIfExists('roles_devisions');
    }
}
