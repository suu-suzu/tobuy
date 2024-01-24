<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class GroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_users')->insert([
            'user_id' => 2,
            'group_id' => 1,
            'application' => 1,
        ]);
        DB::table('group_users')->insert([
            'user_id' => 2,
            'group_id' => 2,
            'application' => 1,
        ]);

    }
}
