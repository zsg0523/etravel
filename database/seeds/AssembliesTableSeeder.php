<?php

use Illuminate\Database\Seeder;
use App\Models\Travel;
use App\Models\Assembly;

class AssembliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取数组
        $travel_ids = Travel::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $assemblies = factory(Assembly::class)
                      ->times(100)
                      ->make()
                      ->each(function ($assembly, $index) 
                        use ($faker, $travel_ids) 
                        {
                            $assembly->travel_id = $faker->randomElement($travel_ids);
                        });
                      
        Assembly::truncate();

        Assembly::insert($assemblies->toArray());
        
    }
}
