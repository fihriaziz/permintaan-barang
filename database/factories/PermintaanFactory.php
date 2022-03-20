<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permintaan>
 */
class PermintaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'permintaan_id' => Permintaan::factory(),
            'user_id' => User::factory(),
            'barang_id' => Barang::factory(),
            'kuantiti' => $this->faker->randomNumber(),
            'tgl_permintaan' => $this->faker->date()
        ];
    }
}
