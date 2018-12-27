<?php

use App\Models\Telephone;
use App\Models\Travel;
use Illuminate\Database\Seeder;

class TelephonesTableSeeder extends Seeder
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

    	// 获取faker 实例
        $faker = app(Faker\Generator::class);

        $telephones = factory(Telephone::class)
        			->times(200)
        			->make()
                    ->each(function ($telephone, $index)
                     use ($travel_ids, $faker) 
                     {
                        // 从 travel_id 中随机获取数组
                        $telephone->travel_id = $faker->randomElement($travel_ids);
                     });


        // 将数据集合插入数据库
        Telephone::insert($telephones->toArray());
    }
}
