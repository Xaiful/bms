<?php

namespace Database\Seeders;

use App\Models\Cow;
use Illuminate\Database\Seeder;

class CowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $cows = [ 
            [
                'name'=>'Laal',
                'age'=>'150',
                'gender'=>'male',
                'weight'=>'200',
                'color'=>'Red',
                'importer'=>'Mamun',
            ],
            
                
            ];
            Cow::insert($cows);

            $cows = [ 
                [
                    'name'=>'Kalu',
                    'age'=>'220',
                    'gender'=>'male',
                    'weight'=>'300',
                    'color'=>'Black',
                    'importer'=>'Masum',
                ],
                
                    
                ];
                Cow::insert($cows);
        }
    }
}
