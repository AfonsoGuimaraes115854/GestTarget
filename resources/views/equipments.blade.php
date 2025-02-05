<x-guestLayout>
  <div class="container mx-auto flex flex-col md:flex-row mt-10">
    <!-- Barra Lateral de Filtros -->
    <aside class="w-full md:w-1/5 bg-white shadow-md p-4 rounded-lg mb-6 md:mb-0">
      <!-- Filtro: Categorias -->
      <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2 flex justify-between">
          Categoria
        </h3>
        <ul class="space-y-2 text-gray-700">
          <li>
            <label class="flex items-center">
              <input type="checkbox" class="form-checkbox h-4 w-4 text-red-600 rounded">
              <span class="ml-2">Ultrasons</span>
            </label>
          </li>
          <li>
            <label class="flex items-center">
              <input type="checkbox" class="form-checkbox h-4 w-4 text-red-600 rounded">
              <span class="ml-2">Alicates</span>
            </label>
          </li>
        </ul>
      </div>

      <!-- Filtro: Marca -->
      <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2 flex justify-between">
          Marca <span class="text-sm text-gray-500">({{ $brands->count() }})</span>
        </h3>
        <ul class="space-y-2 text-gray-700">
          @foreach ($brands as $brand)
            <li>
              <label class="flex items-center">
                <input type="checkbox" class="form-checkbox h-4 w-4 text-red-600 rounded" value="{{ $brand->id }}">
                <span class="ml-2">{{ $brand->name }} ({{ $brand->c() }})</span>
              </label>
            </li>
          @endforeach
        </ul>
      </div>

      <!-- Botões de Filtro -->
      <div class="mt-6 flex flex-col gap-2">
        <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 focus:outline-none">
          Redefinir Filtros
        </button>
        <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:outline-none">
          Aplicar Filtros
        </button>
      </div>
    </aside>

    <!-- Grid de Equipamentos -->
    <section id="Projects"
      class="w-full md:w-4/5 grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center gap-y-16 gap-x-10">
      @foreach ($equipments as $equipment)
        <div class="w-64 h-64 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
          <a href="/equipments/{{ $equipment->reference }}">
            <img src="/images/equipments/{{ $equipment->image }}" 
                 alt="{{ $equipment->name }}" 
                 class="h-48 w-64 object-cover rounded-t-xl">
            <div class="px-4 py-2">
              <span class="text-gray-400 uppercase text-xs">{{ $equipment->brand }}</span>
              <p class="text-sm font-bold text-black truncate capitalize">{{ $equipment->name }}</p>
              <div class="flex items-center mt-2">
                <div class="ml-auto">
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </section>
  </div>
</x-guestLayout>
