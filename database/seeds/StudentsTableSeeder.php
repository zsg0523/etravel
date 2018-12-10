<?php

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\School;
use App\Models\User;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //获取学校 ID
        $school_ids = School::all()->pluck('id')->toArray();
        //获取用户 ID
        $user_ids = User::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        foreach ($user_ids as $user_id) {
        	$student = factory(Student::class)
        				->make()
        				->toArray();
        	// 从学校的 ID 数组中随机取出一个数
			$student['user_id'] = $user_id;

			// 从分类的 ID 数组中随机取出一个数
			$student['school_id'] = $faker->randomElement($school_ids);

        	Student::insert($student);
        }
    }
}
