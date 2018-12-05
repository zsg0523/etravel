<?php

use App\Models\Telephone;
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
    	//获取faker 实例
        $faker = app(Faker\Generator::class);

        $telephones = factory(Telephone::class)
        			->times(50)
        			->make();
        //将数据集合插入数据库
        Telephone::insert($telephones->toArray());
    }
}
