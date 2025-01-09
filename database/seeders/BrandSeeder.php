<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->truncate();

        Brand::create([
            'name' => 'TargetTools',
        ]);

        Brand::create([
            'name' => 'Badeco',
        ]);

        Brand::create([
            'name' => 'ElettroLaser',
        ]);

        Brand::create([
            'name' => 'Elma',
        ]);

        Brand::create([
            'name' => 'Hatho',
        ]);

        Brand::create([
            'name' => 'Indutherm',
        ]);

        Brand::create([
            'name' => 'Menzerna',
        ]);

        Brand::create([
            'name' => 'Mpf',
        ]);

        Brand::create([
            'name' => 'Otec',
        ]);

        Brand::create([
            'name' => 'PandoraAlloys',
        ]);

        Brand::create([
            'name' => 'Radwag',
        ]);

        Brand::create([
            'name' => 'SuperPike',
        ]);

        Brand::create([
            'name' => 'Vallorbe',
        ]);

        Brand::create([
            'name' => 'Niqua',
        ]);

    }
}
