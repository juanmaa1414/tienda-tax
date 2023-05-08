<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::create([
            'id' => '34c4c97e-38bd-4b62-91de-89150b32fcee',
            'name' => 'Mochila Gris Rockstore Norte',
            'img' => 'https://static.dafiti.com.ar/p/rockstore-2219-1277221-1-zoom.jpg',
            'unit_price' => 15600,
        ]);
    }
}
