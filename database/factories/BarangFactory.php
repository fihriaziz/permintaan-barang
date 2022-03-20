<?php

namespace Database\Factories;

use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'lokasi' => $this->faker->streetAddress(),
            'stok' => $this->faker->randomNumber([1,0]),
            'satuan' => "PAK",
            'keterangan' => '-'
        ];
    }
}
