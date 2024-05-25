<?php

namespace Database\Factories;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 
     * @return array<string, mixed>
     * 
     */
    protected $model = Task::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'due_date' => $this->faker->optional()->dateTimeBetween('+1 week', '+1 year'),
            'status' => $this->faker->randomElement(['pending', 'in progress', 'completed']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'image_path' => $this->faker->optional()->imageUrl(),
            'assign_user_id' => User::inRandomOrder()->first()->id,
            'project_id' => Project::inRandomOrder()->first()->id,
            'created_by' => User::inRandomOrder()->first()->id,
            'updated_by' => User::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
