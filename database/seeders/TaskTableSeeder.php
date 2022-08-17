<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Task;
use database\factories\TaskFactory;

class TaskTableSeeder extends Seeder{

    public function run() {
    Task::factory()->times(50)->create();//we will generate 50 records
    }

}   