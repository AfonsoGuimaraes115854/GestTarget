<x-appLayout>
<div class="container mx-auto p-4">
  <h1 class="text-3xl font-bold text-[black] mb-6">Criar Parceiro</h1>
  <form class="grid grid-cols-1 gap-6">
    <div class="p-2">
      <label for="title" class="sr-only">Nome Parceiro</label>
      <input type="text" id="title" name="title" placeholder="Nome Parceiro" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" style="background-color: #f6f6f6;">
    </div>
    <div class="p-2 grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="Descrição" class="sr-only">Descrição</label>
        <textarea id="Descrição" name="Descrição" rows="3" placeholder="Descrição do parceiro" class="block w-full h-48 rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" style="background-color: #f6f6f6;"></textarea>
      </div>
      <div>
        <label for="upload-imagem" class="block w-full h-48 border-2 border-dashed border-gray-300 rounded-md cursor-pointer flex flex-col items-center justify-center bg-[#f6f6f6] hover:bg-gray-50">
          <button type="button" class="bg-[#8c0327] hover:bg-[#6b0220] text-white rounded-full py-2 px-4">Selecionar do computador</button>
          <p class="text-gray-500">Colocar imagem aqui</p>
          <p class="text-gray-500 text-sm mt-1">PNG</p>
        </label>
        <input id="upload-imagem" name="image" type="file" accept="image/*" class="sr-only">
      </div>
    </div>
    <div class="p-2 grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="flex items-center bg-[#f6f6f6] rounded-md">
        <select id="status" name="status" class="block w-full h-12 rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50" style="background-color: #f6f6f6; padding: 0;">
          <option value="">Selecionar Status</option>
          <option value="active">Ativo</option>
          <option value="inactive">Inativo</option>
        </select>
      </div>
    </div>
    <div class="col-span-full mt-6 p-2">
      <button type="submit" class="block w-full bg-[#8c0327] hover:bg-[#6b0220] text-white font-bold py-3 px-4 rounded-full">Registrar Parceiro<button>
    </div>
  </form>
</div>
</x-appLayout>