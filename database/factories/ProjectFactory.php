<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use App\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'title'=>fake()->title(),
            'description'=>fake()->paragraph(),
            'deadline_at'=> now()->addDays(rand(1,30))->format('Y-m-d'),
            'status'=>fake()->randomElement(ProjectStatus::cases())->value,
            'client_id'=>Client::factory(),
            'user_id'=>User::factory(),

        ];
    }
}