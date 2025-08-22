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
        //
        $categories = [
            'name' => 'Nourriture et Boissons',
            'name' => 'Achats',
            'name' => 'Logement',
            'name' => 'Transport',
            'name' => 'Vie et Divertissements',
            'name' => 'Depenses Financières',
            'name' => 'Revenus',
            'name' => 'Investissements',
            'name' => 'Autres',
        ];

        foreach($categories as $cat){
            Category::create([
                'name' => $cat ,
                'user_id' => null ,
            ]);
        }

    }
}
