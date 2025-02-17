<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex flex-row pt-24 px-10 pb-4">
        
        <!-- Barra Lateral -->
        <aside class="w-2/12 mr-6 space-y-6">
            @foreach ([
                'Parceiros' => [
                    ['Criar', '/partners/create'],
                    ['Editar', '/partners/edit'],
                    ['Eliminar', '/partners/delete']
                ],
                'Equipamentos' => [
                    ['Criar', '/equipments/create'],
                    ['Editar', '/equipments/edit'],
                    ['Eliminar', '/equipments/delete']
                ],
                'Marcas' => [
                    ['Criar', '/brands/create'],
                    ['Editar', '/brands/edit'],
                    ['Eliminar', '/brands/delete']
                ]
            ] as $section => $links)
                <div class="bg-white rounded-xl shadow-lg p-4">
                    <p class="font-semibold text-gray-700 mb-2">{{ $section }}</p>
                    @foreach ($links as [$label, $url])
                        <a href="{{ $url }}" class="block text-gray-600 hover:text-black my-2">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            @endforeach
        </aside>
    </div>
</x-app-layout>
