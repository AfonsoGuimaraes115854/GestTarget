<div class="mt-10">
    <form>
        <div class="flex space-x-4">
            <div class="w-1/2">
                <label for="primeiro_nome" class="block text-sm font-medium text-gray-700">Primeiro Nome</label>
                <input type="text" name="primeiro_nome" id="primeiro_nome" class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"required>
            </div>
            <div class="w-1/2">
                <label for="ultimo_nome" class="block text-sm font-medium text-gray-700">Último Nome</label>
                <input type="text" name="ultimo_nome" id="ultimo_nome" class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
            </div>
        </div>
        <label for="telefone" class="block text-sm font-medium text-gray-700 mt-4">Contacto Telefónico</label>
        <input type="tel" name="telefone" id="telefone" class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
        <label for="email" class="block text-sm font-medium text-gray-700 mt-4">E-mail</label>
        <input type="email" name="email" id="email" class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
        <label for="mensagem" class="block text-sm font-medium text-gray-700 mt-4">Mensagem</label>
        <textarea id="mensagem" name="mensagem" rows="4" class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required></textarea>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mt-4">Enviar</button>
    </form>
</div>