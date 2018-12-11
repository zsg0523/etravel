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
        // $this->call(TelephonesTableSeeder::class);
        // $this->call(TravelsTableSeeder::class);
        // $this->call(AssembliesTableSeeder::class);
        // $this->call(SchoolsTableSeeder::class);
        // $this->call(StudentsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
    }
}
