<?php

use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// 获取 faker 实例
        $faker = app(Faker\Generator::class);

       	$schools = factory(School::class)
       				->times(5)
       				->make();
       	School::insert($schools->toArray());
    }
}
