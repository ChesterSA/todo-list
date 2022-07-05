<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'name' => 'Ongoing Task',
            'due_at' => Carbon::parse('+2 days')->setTime(12, 00),
            'completed_at' => null
        ]);
        DB::table('tasks')->insert([
            'name' => 'Overdue Task',
            'due_at' => Carbon::parse('-1 day')->setTime(9, 00),
            'completed_at' => null
        ]);
        DB::table('tasks')->insert([
            'name' => 'Completed Task',
            'due_at' => Carbon::parse('+1 day')->setTime(16, 30),
            'completed_at' => Carbon::now()
        ]);
        DB::table('tasks')->insert([
            'name' => 'Old Task',
            'due_at' => Carbon::parse('-2 days')->setTime(10, 00),
            'completed_at' => Carbon::parse('-3 days')->setTime(11, 00)

        ]);
    }
}
