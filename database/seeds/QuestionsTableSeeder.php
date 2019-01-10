<?php

use Illuminate\Database\Seeder;
use App\Models\Study;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取所有工作纸 ID
        $study_ids = Study::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $questions = factory(Question::class)
        			->times(100)
        			->make()
        			->each(function ($question, $index)
        			 use($faker, $study_ids) 
        			{
        				// 随机获取学习工作纸 id
        				$question->study_id = $faker->randomElement($study_ids);
        			});

        Question::insert($questions->toArray());
    }
}
