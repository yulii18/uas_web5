<?php

namespace Database\Factories;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kategori_id'  => Kategori::inRandomOrder()->first()->id,
            'judul'        => fake()->sentence(3),
            'penulis'      => fake()->name(),
            'penerbit'     => fake()->company(),
            'tahun_terbit' => fake()->year(),
            'isbn'         => fake()->unique()->isbn13(),
            'stok'         => fake()->numberBetween(1, 20),
            'deskripsi'    => fake()->paragraph(),
            'cover'        => null,
        ];
    }
}