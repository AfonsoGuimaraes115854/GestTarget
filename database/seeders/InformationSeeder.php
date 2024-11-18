<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Information::create([
            'name' => 'Manuais',
            'slug' => 'manuais',        
        ]);
      
        Information::create([
            'name' => 'Cidadania e Desenvolvimento',
            'slug' => 'ced',
            'description' => 'Nesta categoria poderá encontrar informações sobre os domínios da área curricular de Cidadania e Desenvolvimento'            
        ]);
      
        Information::create([
            'name' => 'Programação e Sistemas de Informação',
            'slug' => 'psi',            
        ]);
      
        Information::create([
            'name' => 'Redes de Comunicação',
            'slug' => 'rc',            
        ]);
    }
}
