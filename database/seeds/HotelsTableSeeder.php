<?php

use App\Models\Travel;
use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $travel_ids = Travel::all()->pluck('id')->toArray();

        foreach ($travel_ids as $travel_id) {
        	$hotel = factory(Hotel::class)
                        ->make()
                        ->toArray();

            // 从旅游项目的 ID 数组中随机取出一个数
            $hotel['travel_id'] = $travel_id;

            Hotel::insert($hotel);
        }
    }
}
