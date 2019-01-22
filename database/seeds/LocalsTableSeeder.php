<?php

use Illuminate\Database\Seeder;
use App\Models\Travel;
use App\Models\Local;

class LocalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // 获取 travel_ids
       $travel_ids = Travel::all()->pluck('id')->toArray();

       $faker = app(Faker\Generator::class);

       $locals = factory(Local::class)
       			->times(20)
       			->make()
       			->each(function ($local, $index) 
       				use ($faker, $travel_ids) 
       				{
       					$local->travel_id = $faker->randomElement($travel_ids);
       				});
       	Local::insert($locals->toArray());
    }
}
