<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use App\TaskStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'title'=>fake()->sentence(),
            'description'=>fake()->paragraph(),
            'deadline_at'=> fake()->dateTimeBetween('+1 month','+6 months'),
            'status'=>fake()->randomElement(TaskStatus::cases())->value,
            'client_id'=>Client::factory(),
            'user_id'=>User::factory(),
            'project_id'=>Project::factory(),
        ];
    }
}