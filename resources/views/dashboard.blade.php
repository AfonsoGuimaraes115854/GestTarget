<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800">Dashboard</h2>
            <div class="text-sm text-gray-500">Bem-vindo de volta, {{ Auth::user()->name }}!</div>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 px-10 pt-10 pb-32">
        <!-- Sidebar -->
        <aside class="lg:col-span-3 space-y-6">
             @foreach ([ 
                // 'Parceiros' => [
                //     ['Criar', '/partners/create'],
                    // ['Editar', '/partners/edit'],
                    // ['Eliminar', '/partners/delete']
                // ],
                'Equipamentos' => [
                    ['Criar', '/equipamentos/create'],
                    // ['Editar', '/equipments/edit'],
                    // ['Eliminar', '/equipments/delete']
                ],
                'Noticías' => [
                    ['Criar', '/noticías/create'],
                    // ['Editar', '/newsinformation/edit'],
                    // ['Eliminar', '/newsinformation/delete']
                ]
            ] as $section => $links)
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <h3 class="font-semibold text-lg text-red-600 mb-3">{{ $section }}</h3>
                    <ul class="space-y-2">
                        @foreach ($links as [$label, $url])
                            <li>
                                <a href="{{ $url }}" class="block text-gray-700 hover:text-red-600 transition">
                                    {{ $label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </aside>

        <!-- Main Content -->
        <main class="lg:col-span-9 space-y-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h4 class="text-gray-600">Total Parceiros</h4>
                    <p class="text-3xl font-bold text-red-600">{{ $totalPartners ?? '0' }}</p>
                </div>
                {{-- <div class="bg-white rounded-xl shadow-md p-6">
                    <h4 class="text-gray-600">Equipamentos Ativos</h4>
                    <p class="text-3xl font-bold text-red-600">{{ $activeEquipments ?? '0' }}</p>
                </div> --}}
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h4 class="text-gray-600">Noticías Registradas</h4>
                    <p class="text-3xl font-bold text-red-600">{{ $newsinformationCount ?? '0' }}</p>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h4 class="text-gray-600">Parceiros Ativos</h4>
                    <p class="text-3xl font-bold text-green-600">{{ $activePartners ?? '0' }}</p>
                </div>
            </div>
            <!-- Equipamentos Criados -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Equipamentos Ativos</h3>
            
                @if($equipments->isEmpty())
                    <p class="text-gray-500">Nenhum equipamento criado ainda.</p>
                @else
                    <table class="min-w-full bg-white border border-gray-200 rounded-md">
                        <thead>
                            <tr class="text-left border-b">
                                <th class="px-4 py-2 text-gray-600">#</th>
                                <th class="px-4 py-2 text-gray-600">Nome</th>
                                <th class="px-4 py-2 text-gray-600">Categoria</th>
                                <th class="px-4 py-2 text-gray-600">Status</th>
                                <th class="px-4 py-2 text-gray-600">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipments as $equipment)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $equipment->id }}</td>
                                    <td class="px-4 py-2">{{ $equipment->name }}</td>
                                    <td class="px-4 py-2">{{ $equipment->category->name ?? 'Sem categoria' }}</td>
                                    <td class="px-4 py-2">
                                        <span class="px-3 py-1 text-xs font-medium rounded-full {{ $equipment->status == 'ativo' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                            {{ ucfirst($equipment->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('equipments.show', $equipment->reference) }}" class="text-blue-600 hover:text-blue-800">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Ações Rápidas</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    {{-- <a href="/partners/create" class="bg-red-600 text-white py-3 px-4 rounded-xl text-center hover:bg-red-700 transition">+ Parceiro</a> --}}
                    <a href="/equipamentos/create" class="bg-red-600 text-white py-3 px-4 rounded-xl text-center hover:bg-red-700 transition">+ Equipamento</a>
                    <a href="/noticías/create" class="bg-red-600 text-white py-3 px-4 rounded-xl text-center hover:bg-red-700 transition">+ Noticías</a>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
