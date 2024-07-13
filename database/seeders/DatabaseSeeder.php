<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    // public $categories = ["Casalinghi", "Cucina", "Giardinaggio", "Manutenzione", "Meccanica", "Ristrutturazione", "Telefonia", "Abbigliamento", "Videogiochi", "Sport"];

    public function run(): void
    {
        // foreach ($this->categories as $category) {
        // Category::create(['name' => $category]);
        // }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
