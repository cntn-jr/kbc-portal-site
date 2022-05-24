<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdministratorSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            SemesterSeeder::class,
            ClassesSeeder::class,
            LessonSeeder::class,
            CurriculumSeeder::class,
        ]);
    }
}
