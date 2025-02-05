<x-guestLayout>
  <x-banner></x-banner>
<div class="container mx-auto p-4">
  <h1 class="text-3xl font-bold text-[black] mb-6">Criar Produto</h1>
  <form action="{{ route('equipments.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6">
    @csrf
    <div class="p-2">
      <label for="title" class="sr-only">Nome Produto</label>
      <input type="text" id="name" name="name" placeholder="Nome Produto" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" style="background-color: #f6f6f6;" required>
    </div>
    <div class="p-2">
      <label for="brand" class="sr-only">Marca</label>
      <select id="brand" name="brand" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" style="background-color: #f6f6f6;" required>
        <option value="">Selecionar Marca</option>
        @foreach ($brands as $brand)
          <option value="{{ $brand->name }}">{{ $brand->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="p-2 grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="description" class="sr-only">Descrição</label>
        <textarea id="description" name="description" rows="3" placeholder="Descrição do item" class="block w-full h-48 rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" style="background-color: #f6f6f6;"></textarea>
      </div>
      <div>
        <label for="image" class="block w-full h-48 border-2 border-dashed border-gray-300 rounded-md cursor-pointer flex flex-col items-center justify-center bg-[#f6f6f6] hover:bg-gray-50">
          <input id="image" name="image" type="file" accept="image/*" class="sr-only" onchange="previewImage(event)" required>
          <div id="image-preview" class="w-full h-48 flex items-center justify-center text-gray-500">Colocar imagem aqui</div>
        </label>
      </div>
    </div>
    <div class="p-2">
      <label for="reference" class="sr-only">Referência</label>
      <input type="text" id="reference" name="reference" placeholder="Referência" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] 
focus:ring-[#8c0327] focus:ring-opacity-50 p-2" style="background-color: #f6f6f6;" required>
      </div>
    <div class="p-2 grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="flex items-center bg-[#f6f6f6] rounded-md">
        <select id="status" name="status" class="block w-full h-12 rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50" style="background-color: #f6f6f6; padding: 0;" required>
          <option value="">Selecionar Status</option>
          <option value="active">Ativo</option>
          <option value="inactive">Inativo</option>
        </select>
      </div>
    </div>
    <div class="col-span-full mt-6 p-2">
      <button type="submit" class="block w-full bg-[#8c0327] hover:bg-[#6b0220] text-white font-bold py-3 px-4 rounded-full">Registrar Produto</button>
    </div>
  </form>
</div>
<script>
  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
      const output = document.getElementById('image-preview');
      output.innerHTML = `<img src="${reader.result}" alt="Imagem selecionada" class="w-full h-48 object-cover rounded-md" />`;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
</x-guestLayout>
