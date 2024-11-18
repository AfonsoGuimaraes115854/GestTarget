<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipment::create([
            'name' => 'Elmasonic Select 100',
            'brand' => 'Elma',
            'description' => 'Não disponível',
            'image' => 'equipment_images/elma_machine_1.png'
        ]);
    }
}
