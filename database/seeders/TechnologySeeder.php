<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            'php', 'vue', 'laravel', 'javascript',
            'HTML', 'css', 'SASS','MySql','Vite'
        ];

        foreach ($technologies as $technology){
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->save();
        }
    }
}