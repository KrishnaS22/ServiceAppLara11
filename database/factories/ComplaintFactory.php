<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static ?string $password;
    public function definition(): array
    {
        return [
            'user_id' => random_int(7, 11),
            'service_id' => random_int(1, 10),
            "staff_id" => random_int(1, 10),
            "details" => fake()->sentence(12),
            "status" => false,
        ];
    }
}
