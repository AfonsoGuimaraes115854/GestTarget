@props(['brands', 'categories'])


<aside class="w-full md:w-1/5 bg-white shadow-md p-4 rounded-lg mb-6 md:mb-0">

  <div class="mb-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-2 flex justify-between cursor-pointer" onclick="toggleSection('categories')">
      Categorias <span id="categories-icon">▼</span>
    </h3>
    <ul id="categories" class="space-y-2 text-gray-700">
      @foreach ($categories as $category)
        <li>
          <label class="flex items-center">
            <input type="checkbox" class="form-checkbox h-4 w-4 text-red-600 rounded" value="{{ $category->id }}">
            <span class="ml-2">{{ $category->name }}</span>
          </label>
        </li>
      @endforeach
    </ul>
  </div>

  <!-- Filtro: Marca -->
  <div class="mb-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-2 flex justify-between cursor-pointer" onclick="toggleSection('brands-list')">
      Marcas <span class="text-sm text-gray-500">({{ $brands->count() }})</span>
      <span id="brands-list-icon">▼</span>
    </h3>
    <ul id="brands-list" class="space-y-2 text-gray-700">
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

<script>
  function toggleSection(id) {
    const section = document.getElementById(id);
    const icon = document.getElementById(id + '-icon');

    if (section.style.display === 'none') {
      section.style.display = 'block';
      icon.textContent = '▼';
    } else {
      section.style.display = 'none';
      icon.textContent = '▶';
    }
  }

  // Esconder as listas por padrão
  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("categories").style.display = "none";
    document.getElementById("brands-list").style.display = "none";
  });
</script>
