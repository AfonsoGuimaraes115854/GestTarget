<x-appLayout>
    <x-validation-errors/>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-[black] mb-6">Criar Equipamento</h1>
        <form action="{{ route('equipments.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6">
            @csrf
            <!-- Nome do Equipamento -->
            <div class="p-2">
                <label for="name" class="sr-only">Nome do Equipamento</label>
                <x-input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Nome do Equipamento" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" 
                    style="background-color: #f6f6f6;"
                    required 
                />
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descrição e Imagem -->
            <div class="p-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="description" class="sr-only">Descrição</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="3" 
                        placeholder="Descrição do equipamento" 
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

            <!-- Marca -->
            <div class="p-2">
                <label for="brand" class="sr-only">Marca</label>
                <select 
                    id="brand" 
                    name="brand" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" 
                    style="background-color: #f6f6f6;" 
                    required
                    onchange="toggleBrandInput()">
                    <option value="">Selecionar Marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                    @endforeach
                    <option value="other">Outro</option>
                </select>
                <input type="text" id="other-brand" name="other_brand" placeholder="Digite a nova marca" class="hidden block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2 mt-2" style="background-color: #f6f6f6;">
                @error('brand')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                @error('other_brand')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Categoria -->
            <div class="p-2">
                <label for="category" class="sr-only">Categoria</label>
                <select 
                    id="category" 
                    name="category" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" 
                    style="background-color: #f6f6f6;" 
                    required
                    onchange="toggleCategoryInput()">
                    <option value="">Selecionar Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    <option value="other">Outro</option>
                </select>
                <input type="text" id="other-category" name="other_category" placeholder="Digite a nova categoria" class="hidden block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2 mt-2" style="background-color: #f6f6f6;">
                @error('category')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                @error('other_category')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Referência -->
            <div class="p-2">
                <label for="reference" class="sr-only">Referência</label>
                <x-input 
                    type="text" 
                    id="reference" 
                    name="reference" 
                    placeholder="Referência do Equipamento" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8c0327] focus:ring-[#8c0327] focus:ring-opacity-50 p-2" 
                    style="background-color: #f6f6f6;"
                    required 
                />
            </div>

            <!-- Status -->
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

            <!-- Botão de Envio -->
            <div class="col-span-full mt-6 p-2">
                <x-button type="submit" class="block w-full bg-[#8c0327] hover:bg-[#6b0220] text-white font-bold py-3 px-4 rounded-full">Registrar Equipamento</x-button>
            </div>
        </form>
    </div>

    <script>
        function toggleBrandInput() {
            const brandSelect = document.getElementById('brand');
            const otherBrandInput = document.getElementById('other-brand');
            if (brandSelect.value === 'other') {
                otherBrandInput.classList.remove('hidden');
            } else {
                otherBrandInput.classList.add('hidden');
            }
        }

        function toggleCategoryInput() {
            const categorySelect = document.getElementById('category');
            const otherCategoryInput = document.getElementById('other-category');
            if (categorySelect.value === 'other') {
                otherCategoryInput.classList.remove('hidden');
            } else {
                otherCategoryInput.classList.add('hidden');
            }
        }
    </script>
</x-appLayout>
