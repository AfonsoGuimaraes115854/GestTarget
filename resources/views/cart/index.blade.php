<x-guestLayout>
    <section class="py-24 relative">
        <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">
            <h2 class="title font-manrope font-bold text-4xl leading-10 mb-8 text-center text-black">Carrinho de Compras</h2>

            @if (empty($cart))
                <p class="text-center text-gray-500 text-xl">O seu carrinho está vazio.</p>
            @else
                <div class="hidden lg:grid grid-cols-2 py-6">
                    <div class="font-normal text-xl leading-8 text-gray-500">Produto</div>
                    <p class="font-normal text-xl leading-8 text-gray-500 flex items-center justify-between">
                        <span class="w-full max-w-[260px] text-center">Quantidade</span>
                    </p>
                </div>

                @foreach ($cart as $productId => $product)
                    <div class="grid grid-cols-1 lg:grid-cols-2 min-[550px]:gap-6 border-t border-gray-200 py-6">
                        <div class="flex items-center flex-col min-[550px]:flex-row gap-3 min-[550px]:gap-6 w-full">
                            <div class="img-box">
                                <img src="{{ asset('images/equipments/' . $product['image']) }}" alt="{{ $product['name'] }}" class="xl:w-[140px] rounded-xl object-cover">
                            </div>
                            <div class="pro-data w-full max-w-sm">
                                <h5 class="font-semibold text-xl leading-8 text-black">{{ $product['name'] }}</h5>
                                <p class="font-normal text-lg leading-8 text-gray-500 my-2">Marca: {{ $product['brand'] ?? 'N/A' }}</p>
                                <p class="font-normal text-lg leading-8 text-gray-500 my-2">Referência: {{ $product['reference'] ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center flex-col min-[550px]:flex-row w-full gap-2">
                            <div class="flex items-center justify-center w-full">
                                <input type="text"
                                    class="border-y border-gray-200 outline-none text-gray-900 font-semibold text-lg w-full max-w-[118px] min-w-[80px] text-center bg-transparent"
                                    value="{{ $product['quantity'] }}" readonly>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="flex flex-col sm:flex-row justify-center gap-3 mt-8">
                    <a href="{{ route('equipments.index') }}" class="rounded-full py-4 w-full max-w-[280px] bg-red-50 text-red-600 font-semibold hover:bg-red-100 transition text-center">
                        Adicionar mais equipamentos
                    </a>
                    <button onclick="document.getElementById('form-orcamento').classList.remove('hidden')"
                        class="rounded-full py-4 w-full max-w-[280px] bg-red-600 text-white font-semibold hover:bg-red-700 transition text-center">
                        Solicitar Orçamento
                    </button>
                </div>
            @endif
        </div>

        <div id="form-orcamento" class="mt-12 hidden">
            <form method="POST" action="{{ route('send.email') }}" class="bg-white p-6 rounded-xl shadow-md max-w-2xl mx-auto space-y-4">
                @csrf
                <h3 class="text-2xl font-semibold text-center text-gray-800">Solicitar Orçamento</h3>
            
                <div>
                    <label for="nome" class="block mb-1 text-gray-700">Nome</label>
                    <input type="text" id="nome" name="nome" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-red-300" required>
                </div>
            
                <div>
                    <label for="email" class="block mb-1 text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-red-300" required>
                </div>
            
                <div>
                    <label for="telefone" class="block mb-1 text-gray-700">Telefone</label>
                    <input type="text" id="telefone" name="telefone" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-red-300" required>
                </div>
            
                <div>
                    <label for="mensagem" class="block mb-1 text-gray-700">Mensagem</label>
                    <textarea id="mensagem" name="mensagem" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-red-300" placeholder="Inclua alguma observação se necessário..."></textarea>
                </div>
            
                <button type="submit" class="w-full py-3 rounded-full bg-red-600 text-white font-semibold hover:bg-red-700 transition">
                    Enviar Pedido de Orçamento
                </button>
            </form>
        </div>

    </section>
</x-guestLayout>
