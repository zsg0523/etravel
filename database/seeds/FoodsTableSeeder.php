<?php

use Illuminate\Database\Seeder;
use App\Models\Food;
use App\Models\Route;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取所有分类 ID 数组
        $route_ids = Route::all()->pluck('id')->toArray();
        // 获取Faker实例
        $faker = app(Faker\Generator::class);

        $foods = factory(Food::class)
        			->times(100)
        			->make()
        			->each(function ($food,$index) 
        				use ($route_ids,$faker)
        			{
        				// 从分类的 ID 数组中随机取出一个数
        				$food->route_id = $faker->randomElement($route_ids);
        			});
        // 将数据集合转换为数组，并写入数据库
        Food::insert($foods->toArray());
    }
}
