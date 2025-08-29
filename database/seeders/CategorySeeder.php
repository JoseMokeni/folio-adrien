<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Nourriture et Boissons',
            'Transport',
            'Logement',
            'Santé',
            'Divertissement',
            'Éducation',
            'Shopping',
            'Voyages',
            'Services',
            'Autres'
        ];

        foreach($categories as $cat){
            Category::create([
                'name' => $cat,
                'user_id' => null,
            ]);
        }
    }
}
