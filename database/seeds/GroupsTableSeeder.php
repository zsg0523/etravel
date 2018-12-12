<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Travel;
use App\Models\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取所有用户 ID 数组
        $user_ids = User::all()->pluck('id')->toArray();
        // 获取所有分类 ID 数组
        $travel_ids = Travel::all()->pluck('id')->toArray();
        // 获取Faker实例
        $faker = app(Faker\Generator::class);

        $groups = factory(Group::class)
        			->times(50)
        			->make()
        			->each(function ($group,$index) 
        				use ($user_ids,$travel_ids,$faker)
        			{
        				// 从用户的 ID 数组中随机取出一个数
        				$group->user_id = $faker->randomElement($user_ids);

        				// 从分类的 ID 数组中随机取出一个数
        				$group->travel_id = $faker->randomElement($travel_ids);
        			});
        // 将数据集合转换为数组，并写入数据库
        Group::insert($groups->toArray());
    }
}
