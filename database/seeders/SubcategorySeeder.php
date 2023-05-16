<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $subcategories = [ 
            [
                'category_id' => 1,
                'name'=>'Latex'
            ],
              
            ];
            Subcategory::insert($subcategories);
        }
    }
}
