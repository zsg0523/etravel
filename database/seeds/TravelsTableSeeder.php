<?php

use App\Models\Travel;
use Illuminate\Database\Seeder;

class TravelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);

        $travels = factory(Travel::class)
        			->times(10)
        			->make();
       	Travel::insert($travels->toArray());
    }
}
