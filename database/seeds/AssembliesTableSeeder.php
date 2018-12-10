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
        $travel_ids = Travel::all()->pluck('id')->toArray();

        foreach ($travel_ids as $key => $value) {
        	$data = array(
        		'travel_id' => $value,
        		'leader' => 'Eden',
        		'duty' => '领队老师',
        		'assembly_station' => 'HK',
        		'assembly_at' => date('Y-m-d H:i:s',time()),
        		'dissolution_at' => date('Y-m-d H:i:s',time()),
        	);

        	Assembly::insert($data);
        }
    }
}
