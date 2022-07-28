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
            // GakuensaiTeacherSeeder::class,
            TeacherSeeder::class,
            // GakuensaiStudentSeeder::class,
            StudentSeeder::class,
            SemesterSeeder::class,
            // GakuensaiClassSeeder::class,
            ClassesSeeder::class,
            // GakuensaiLessonSeeder::class,
            LessonSeeder::class,
            // GakuensaiCurriculumSeeder::class,
            CurriculumSeeder::class,
            // GakuensaiAnnouncementSeeder::class,
            AnnouncementSeeder::class,
            // GakuensaiBelongClassSeeder::class,
            BelongClassSeeder::class,
            // GakuensaiScheduleSeeder::class,
            ScheduleSeeder::class,
        ]);
    }
}
