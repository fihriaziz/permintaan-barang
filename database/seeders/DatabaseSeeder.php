<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Permintaan;
use Database\Factories\BarangFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            BarangSeeder::class,
            PermintaanSeeder::class,
        ]);
    }
}
