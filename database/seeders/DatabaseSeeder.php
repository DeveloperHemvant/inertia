<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;

use App\Models\Task;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ProjectFactory;
use Database\Factories\TaskFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Hemvant',
            'email' => 'hemvantkk45@gmail.com',
            'password'=>bcrypt('Hemvant@123'),'email_verified_at'=>time()
        ]);
        Project::factory()->count(50)->create();
        Task::factory()->count(50)->create();
    }
}
