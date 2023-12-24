<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class TobuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tobuys')->insert([
            'tobuy' => '買うもの１',
            'group_id' => 1,
            'deadline' => '2024-01-31',
            'memo' => 'メモ１',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
