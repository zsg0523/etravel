<?php

use Illuminate\Database\Seeder;
use App\Models\Travel;
use App\Models\Route;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取所有 travel id 的数组
        $travel_ids = Travel::all()->pluck('id')->toArray();

        // 获取 faker 实例
        $faker = app(Faker\Generator::class);

        $routes = factory(Route::class)
        		 ->times(50)
        		 ->make()
        		 ->each(function ($route, $index)
        		 	use ($travel_ids, $faker)
        		  {
        		  	$route->travel_id = $faker->randomElement($travel_ids);
        		  });

        // 将数据集合转换为数组，并写入数据库
        Route::insert($routes->toArray());
    }
}
