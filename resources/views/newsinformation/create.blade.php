<x-guestLayout>
<div class="container mx-auto p-4">
  <h1 class="text-3xl font-bold text-[black] mb-6">Criar Notícia</h1>
  <form action="{{ route('newsinformation.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6">
    @csrf <!-- Token de segurança para proteger o envio do formulário -->
    <div class="p-2">
      <label for="name" class="sr-only">Nome Notícia</label>
      <input 
        type="text" 
        id="name" 
        name="name" 
        placeholder="Nome Notícia" 
        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" 
        style="background-color: #f6f6f6;"
        required>
    </div>
    <div class="p-2 grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="description" class="sr-only">Descrição</label>
        <textarea 
          id="description" 
          name="description" 
          rows="3" 
          placeholder="Descrição do item" 
          class="block w-full h-48 rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" 
          style="background-color: #f6f6f6;"
          required></textarea>
      </div>
      <div>
        <label for="image" class="block w-full h-48 border-2 border-dashed border-gray-300 rounded-md cursor-pointer flex flex-col items-center justify-center bg-[#f6f6f6] hover:bg-gray-50">
          <button type="button" class="bg-[#8c0327] hover:bg-[#6b0220] text-white rounded-full py-2 px-4">Selecionar do computador</button>
          <p class="text-gray-500">Colocar imagem aqui</p>
          <p class="text-gray-500 text-sm mt-1">PNG</p>
        </label>
        <input 
          id="image" 
          name="image" 
          type="file" 
          accept="image/*" 
          class="sr-only">
      </div>
    </div>
    <div class="p-2 grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="flex items-center bg-[#f6f6f6] rounded-md">
        <select 
          id="status" 
          name="status" 
          class="block w-full h-12 rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50" 
          style="background-color: #f6f6f6; padding: 0;" 
          required>
          <option value="">Selecionar Status</option>
          <option value="active">Ativo</option>
          <option value="inactive">Inativo</option>
        </select>
      </div>
    </div>
    <div class="col-span-full mt-6 p-2">
      <button 
        type="submit" 
        class="block w-full bg-[#8c0327] hover:bg-[#6b0220] text-white font-bold py-3 px-4 rounded-full">Registrar Notícia</button>
    </div>
  </form>
</div>
</x-guestLayout>
