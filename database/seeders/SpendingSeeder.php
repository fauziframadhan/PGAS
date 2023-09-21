<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spendings')->insert([
            'employeeid' => '1',
            'date' => '2023-07-31',
            'value' => '7000000',
        ]);
    }
}