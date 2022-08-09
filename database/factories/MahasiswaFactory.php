<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_mahasiswa' => fake()->name(),
            'alamat' => fake()->address(),
            'no_tlp' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'remember_token' => Str::random(10),
        ];
    }
}
