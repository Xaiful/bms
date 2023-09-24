<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ['name'=>'Shib Bari 1','sub_district_id'=>1,'start'=>'Shib Bari','end'=>'Shonadanga','created_at'=>now() ,'updated_at'=>now()],
            ['name'=>'Shib Bari 2','sub_district_id'=>1,'start'=>'Shib Bari','end'=>'Moylapota','created_at'=>now() ,'updated_at'=>now()],
            ['name'=>'Shib Bari 3','sub_district_id'=>1,'start'=>'Shib Bari','end'=>'Boyra','created_at'=>now() ,'updated_at'=>now()],
        ];
        Area::insert($areas);
    }
}
