<?php

namespace Database\Seeders;

use App\Models\Devision;
use Illuminate\Database\Seeder;

class DevisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Devision::create([
            'name'=>'Khulna'
        ]);
        Devision::create([
            'name'=>'Dhaka'
        ]);
        Devision::create([
            'name'=>'Rangpur'
        ]);
        Devision::create([
            'name'=>'Rajshahi'
        ]);
        Devision::create([
            'name'=>'Mymensingh'
        ]);
        Devision::create([
            'name'=>'Chittagong'
        ]);Devision::create([
            'name'=>'Barisal'
        ]);
    }
}
