<x-guestLayout>
  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap -mx-4">

      <div class="w-full md:w-1/2 px-4 mb-8">
        <img 
          src="/images/equipments/{{ $equipment->image }}" 
          alt="{{ $equipment->name }}" 
          class="w-full h-auto rounded-lg shadow-md mb-4" 
          id="mainImage-{{ $equipment->id }}">
      </div>

      <div class="w-full md:w-1/2 px-4">
        <h2 class="text-3xl font-bold mb-4">{{ $equipment->name }}</h2>
        <p class="text-gray-600 mb-2"><strong>Marca:</strong> {{ $equipment->brand }}</p>
        <p class="text-gray-600 mb-2"><strong>Referência:</strong> {{ $equipment->reference }}</p>
        <p class="text-gray-700 mb-6"><strong>Descrição:</strong> {{ $equipment->description }}</p>

        <div class="flex items-center space-x-4 mb-6">
          <label for="quantity-{{ $equipment->id }}" class="text-gray-600 font-semibold">Quantidade:</label>
          <input 
            type="number" 
            id="quantity-{{ $equipment->id }}" 
            name="quantity_display" 
            min="1" 
            value="1" 
            class="w-20 p-2 border border-gray-300 rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500"
            onchange="document.getElementById('formQuantity-{{ $equipment->id }}').value = this.value;">
        </div>

        <div class="flex space-x-4 mb-6">
          {{-- Formulário para adicionar ao carrinho --}}
          <form action="{{ route('carrinho.adicionar') }}" method="POST">
            @csrf
            <input type="hidden" name="equipment_id" value="{{ $equipment->id }}">
            <input type="hidden" name="quantity" value="1" id="formQuantity-{{ $equipment->id }}">

            <button
              type="submit"
              class="bg-red-600 flex gap-2 items-center text-white px-6 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
              Adicionar ao Carrinho
            </button>
          </form>

          <button
            class="bg-gray-200 flex gap-2 items-center text-gray-800 px-6 py-2 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            Orçamento
          </button>
        </div>
      </div>
    </div>
  </div>
</x-guestLayout>
