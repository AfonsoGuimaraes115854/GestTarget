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
                        <span class="w-full max-w-[200px] text-center">Taxa de Entrega</span>
                        <span class="w-full max-w-[260px] text-center">Quantidade</span>
                        <span class="w-full max-w-[200px] text-center">Total</span>
                    </p>
                </div>

                @php
                    $subtotal = 0;
                    $deliveryFee = 15.00;
                @endphp

                @foreach ($cart as $productId => $product)
                    @php
                        $lineTotal = $product['price'] * $product['quantity'];
                        $subtotal += $lineTotal;
                    @endphp
                    <div class="grid grid-cols-1 lg:grid-cols-2 min-[550px]:gap-6 border-t border-gray-200 py-6">
                        <div class="flex items-center flex-col min-[550px]:flex-row gap-3 min-[550px]:gap-6 w-full">
                            <div class="img-box">
                                <img src="{{ $product['image'] ?? 'https://via.placeholder.com/140' }}" alt="{{ $product['name'] }}" class="xl:w-[140px] rounded-xl object-cover">
                            </div>
                            <div class="pro-data w-full max-w-sm">
                                <h5 class="font-semibold text-xl leading-8 text-black">{{ $product['name'] }}</h5>
                                <p class="font-normal text-lg leading-8 text-gray-500 my-2">Categoria: {{ $product['category'] ?? 'Produto' }}</p>
                                <h6 class="font-medium text-lg leading-8 text-indigo-600">€{{ number_format($product['price'], 2) }}</h6>
                            </div>
                        </div>
                        <div class="flex items-center flex-col min-[550px]:flex-row w-full gap-2">
                            <h6 class="font-bold text-2xl text-black w-full max-w-[176px] text-center">
                                €{{ number_format($deliveryFee, 2) }}
                            </h6>
                            <div class="flex items-center justify-center w-full">
                                <input type="text"
                                    class="border-y border-gray-200 outline-none text-gray-900 font-semibold text-lg w-full max-w-[118px] min-w-[80px] text-center bg-transparent"
                                    value="{{ $product['quantity'] }}" readonly>
                            </div>
                            <h6 class="text-indigo-600 font-bold text-2xl w-full max-w-[176px] text-center">
                                €{{ number_format($lineTotal, 2) }}
                            </h6>
                        </div>
                    </div>
                @endforeach

                @php
                    $deliveryTotal = $deliveryFee * count($cart);
                    $total = $subtotal + $deliveryTotal;
                @endphp

                <div class="bg-gray-50 rounded-xl p-6 w-full mb-8">
                    <div class="flex justify-between mb-6">
                        <p class="text-xl text-gray-400">Subtotal</p>
                        <h6 class="text-xl text-gray-900 font-semibold">€{{ number_format($subtotal, 2) }}</h6>
                    </div>
                    <div class="flex justify-between pb-6 border-b border-gray-200">
                        <p class="text-xl text-gray-400">Taxa de Entrega</p>
                        <h6 class="text-xl text-gray-900 font-semibold">€{{ number_format($deliveryTotal, 2) }}</h6>
                    </div>
                    <div class="flex justify-between py-6">
                        <p class="text-2xl font-medium text-gray-900">Total</p>
                        <h6 class="text-2xl font-medium text-indigo-500">€{{ number_format($total, 2) }}</h6>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center gap-3 mt-8">
                    <button class="rounded-full py-4 w-full max-w-[280px] bg-indigo-50 text-indigo-600 font-semibold hover:bg-indigo-100 transition">
                        Adicionar Cupom
                    </button>
                    <button class="rounded-full py-4 w-full max-w-[280px] bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition">
                        Continuar para Pagamento
                    </button>
                </div>
            @endif
        </div>
    </section>
</x-guestLayout>
