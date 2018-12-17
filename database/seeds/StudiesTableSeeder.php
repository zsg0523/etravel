<?php

use Illuminate\Database\Seeder;
use App\Models\Study;
use App\Models\Route;

class StudiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取faker实例
        $faker = app(Faker\Generator::class);

        // 头像假数据
        $images = [
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png?imageView2/1/w/200/h/200',
        ];

        // 获取行程 ID 数组
        $route_ids = Route::all()->pluck('id')->toArray();

        $studys = factory(Study::class)
        		   ->times(100)
        		   ->make()
        		   ->each(function ($study, $index) 
        		   	use($faker, $route_ids, $images) 
        		   	{
        		   		$study->image = $faker->randomElement($images);
        		   		$study->route_id = $faker->randomElement($route_ids);
        		   	});

        Study::insert($studys->toArray());

    }
}
