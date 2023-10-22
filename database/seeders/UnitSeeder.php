<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            ['name'=>'kg'],
            ['name'=>'gram'],
            ['name'=>'mili-gram'],
            ['name'=>'litre'],
            ['name'=>'mili-litre'],
            ['name'=>'pices'],
        ];
        Unit::insert($units);
    }
}
