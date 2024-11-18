<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipment')->truncate();

        Equipment::create([
            'name' => 'Elmasonic Select 100',
            'brand' => 'Elma',
            'description' => 'Não disponível',
            'image' => 'elma_machine_1.png'
        ]);
    }
}
