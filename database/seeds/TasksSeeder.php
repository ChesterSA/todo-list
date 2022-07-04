<?php

use App\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
            'due_date' => Carbon::parse('+2 days'),
            'is_complete' => false
        ]);
        DB::table('tasks')->insert([
            'name' => 'Overdue Task',
            'due_date' => Carbon::parse('-1 day'),
            'is_complete' => false
        ]);
        DB::table('tasks')->insert([
            'name' => 'Completed Task',
            'due_date' => Carbon::parse('+1 day'),
            'is_complete' => true
        ]);
        DB::table('tasks')->insert([
            'name' => 'Old Task',
            'due_date' => Carbon::parse('-2 days'),
            'is_complete' => true
        ]);
    }
}
