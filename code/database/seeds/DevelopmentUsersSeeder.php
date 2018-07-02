<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevelopmentUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $studentId = DB::table('user_types')
            ->where('name','=','Student')
            ->get()->first()->id;

        $tutorId = DB::table('user_types')
            ->where('name','=','Tutor')
            ->get()->first()->id;

        $adminId = DB::table('user_types')
            ->where('name','=','Admin')
            ->get()->first()->id;


        DB::table('users')->insert([
            'name' => 'TestStudent',
            'email' => 'student@student.com',
            'password' => bcrypt('student123'),
            'user_type_id' => $studentId,
        ]);

        DB::table('users')->insert([
            'name' => 'TestTutor',
            'email' => 'tutor@tutor.com',
            'password' => bcrypt('tutor123'),
            'user_type_id' => $tutorId,
        ]);

        DB::table('users')->insert([
            'name' => 'TestAdmin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'user_type_id' => $adminId,
        ]);

    }
}
