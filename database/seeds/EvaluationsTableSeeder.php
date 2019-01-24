<?php

use Illuminate\Database\Seeder;
use App\Models\Evaluation;
use App\Models\EvaluationCategory;

class EvaluationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取 evaluation_category_ids
        $evaluation_category_ids =  EvaluationCategory::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $evaluations = factory(Evaluation::class)
        		  		->times(50)
        		  		->make()
        		  		->each(function ($evalution, $index) 
        		  			use ($evaluation_category_ids, $faker) 
        		  			{
        		  				$evalution->evaluation_category_id = $faker->randomElement($evaluation_category_ids);
        		  			});

        Evaluation::insert($evaluations->toArray());
    }
}
