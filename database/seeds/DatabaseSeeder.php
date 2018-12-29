<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(TravelsTableSeeder::class);
        // $this->call(TelephonesTableSeeder::class);
        $this->call(AssembliesTableSeeder::class);
        // $this->call(SchoolsTableSeeder::class);
        // $this->call(StudentsTableSeeder::class);
        // $this->call(NewsTableSeeder::class);
        // $this->call(HotelsTableSeeder::class);
        // $this->call(RulesTableSeeder::class);
        // $this->call(GroupsTableSeeder::class);
        // $this->call(RoutesTableSeeder::class);
        // $this->call(SceneriesTableSeeder::class);
        // $this->call(FoodsTableSeeder::class);
        // $this->call(StudiesTableSeeder::class);
        // $this->call(QuestionsTableSeeder::class);
    }

}
