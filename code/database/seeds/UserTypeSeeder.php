<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'name' => 'Student'
        ]);

        DB::table('user_types')->insert([
            'name' => 'Tutor'
        ]);

        DB::table('user_types')->insert([
            'name' => 'Admin'
        ]);
    }
}
