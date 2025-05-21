<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Equipment;
use App\Models\Brand;

class DashboardController extends Controller
{
    public function index()
    {
        // Contando os equipamentos ativos
        $activeEquipments = Equipment::where('status', 'ativo')->count();

        // Contando os parceiros ativos
        $activePartners = Partner::all()->count();


        // Contagem total de parceiros
        $totalPartners = Partner::count();

        // Contagem total de marcas
        $brandCount = Brand::count();

        // Equipamentos
        $equipments = Equipment::all();

        // Atividades recentes (exemplo de atividades, pode ser personalizado)
        $recentActivities = [
            'Novo parceiro adicionado.',
            'Novo equipamento registrado.',
            'Notícia publicada.'
        ];

        return view('dashboard', [
            'totalPartners' => $totalPartners,
            'activeEquipments' => $activeEquipments,
            'brandCount' => $brandCount,
            'activePartners' => $activePartners,
            'equipments' => $equipments,
            'recentActivities' => $recentActivities,
        ]);
    }
}
