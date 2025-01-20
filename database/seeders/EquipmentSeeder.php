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
            'reference' => '123213',
            'description' => 'Não disponível',
            'image' => 'elma_machine_1.png'
        ]);

        Equipment::create([
            'name' => 'Alicate TargetTools',
            'brand' => 'TargetTools',
            'reference' => '12321311',
            'description' => '',
            'image' => '/alicate_targettools/2.jpeg'
        ]);
    }
}
