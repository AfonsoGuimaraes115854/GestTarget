<x-appLayout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-[black] mb-6">Criar Notícia</h1>
        <form action="{{ route('newsinformation.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6">
            @csrf
            <div class="p-2">
                <label for="name" class="sr-only">Nome Notícia</label>
                <x-input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Nome Notícia" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" 
                    style="background-color: #f6f6f6;"
                    required 
                />
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
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
                    <x-label>Upload de Imagem</x-label>
                    <input 
                        type="file" 
                        name="image" 
                        id="image" 
                        accept="image/*" 
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" 
                    />
                    @error('image')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
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
                <x-button type="submit" class="block w-full bg-[#8c0327] hover:bg-[#6b0220] text-white font-bold py-3 px-4 rounded-full">Registrar Notícia</x-button>
            </div>
        </form>
    </div>
</x-appLayout>
