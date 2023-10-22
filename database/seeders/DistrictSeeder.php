<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            ['name'=>'Khulna','devision_id'=>1,'created_at'=>now() ,'updated_at'=>now()],
            ['name'=>'Bagerhat','devision_id'=>1,'created_at'=>now() ,'updated_at'=>now()],
            ['name'=>'Shatkhira','devision_id'=>1,'created_at'=>now() ,'updated_at'=>now()],
        ];
        District::insert($districts);
    }
}
