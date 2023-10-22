<?php

namespace Database\Seeders;

use App\Models\SubDistrict;
use Illuminate\Database\Seeder;

class SubDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_districts = [
            ['name'=>'Shonadanga','district_id'=>1,'created_at'=>now() ,'updated_at'=>now()],
            ['name'=>'Rupsha','district_id'=>1,'created_at'=>now() ,'updated_at'=>now()],
            ['name'=>'Daulatput','district_id'=>1,'created_at'=>now() ,'updated_at'=>now()],
        ];
        SubDistrict::insert($sub_districts);
    }
}
