<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => fake()->unique()->numerify('2026-#####'),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->optional()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'mobile_number' => '09'.fake()->numerify('#########'),
            'date_of_birth' => fake()->dateTimeBetween('-30 years', '-16 years')->format('Y-m-d'),
            'gender' => fake()->randomElement(Student::GENDERS),
            'program' => fake()->randomElement(Student::PROGRAMS),
            'year_level' => fake()->randomElement(Student::YEAR_LEVELS),
            'address' => fake()->address(),
            'profile_picture' => null,
        ];
    }
}
