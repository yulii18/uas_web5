<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // database/factories/KategoriFactory.php
    public function definition(): array {
        return [
            'nama_kategori' => fake()->randomElement([
                'Fiksi', 'Non-Fiksi', 'Sains', 'Teknologi', 'Sejarah'
            ]),
            'deskripsi' => fake()->sentence(),
        ];
    }   
}
