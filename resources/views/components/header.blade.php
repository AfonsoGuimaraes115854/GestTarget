<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="bg-gray-900 text-white py-2">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center">
      <a href="/">
        <img src="/images/Logo.png" alt="Logo" class="h-20 mb-2">
      </a>
      <div class="flex flex-col items-start">
        <div class="flex space-x-10">
          <div class="flex items-center space-x-4">
            <img src="/images/emailicon.svg" alt="mailimage" class="h-10">
            <div class="flex flex-col items-start text-left">
              <span class="font-bold">Email Geral</span>
              <a href="mailto:loja@targettools.pt" class="hover:underline decoration-red-600">loja@targettools.pt</a>
            </div>
          </div>
          <div class="flex items-center space-x-4">
            <img src="/images/phoneicon.svg" alt="telefoneimage" class="h-10">
            <div class="flex flex-col items-start text-left">
              <span class="font-bold">Telefone</span>
              <a href="tel:351223228781" class="hover:underline decoration-red-600">+351 223 228 781</a>
            </div>
          </div>
          <div class="flex items-center space-x-4">
            <img src="/images/clockicon.svg" alt="horarioimage" class="h-10">
            <div class="flex flex-col items-start text-left">
              <span class="font-bold">Horário de Trabalho</span>
              <span class="mt-2">Seg-Sex 09:00 - 18:30</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-red-600 h-[1px]"></div>
  <div class="bg-gray-900">
    <div class="max-w-screen-xl mx-auto p-2">
      <ul class="flex justify-center space-x-4 relative">
        <li>
          <a href="/equipments" title="Equipamentos" class="block py-2 px-3 text-red-600 hover:underline decoration-red-600">Equipamentos</a>
        </li>
        <li>
          <a href="/newsinformation" title="Noticías" class="block py-2 px-3 text-red-600 hover:underline decoration-red-600">Noticias</a>
        </li>
        <li>
          <a href="/partners" title="Parceiros" class="block py-2 px-3 text-red-600 hover:underline decoration-red-600">Parceiros</a>
        </li>
        <li>
          <a href="/contactos" title="Contactos" class="block py-2 px-3 text-red-600 hover:underline decoration-red-600">Contactos</a>
        </li>
        
        <li class="relative">
          <a href="{{ route('carrinho.exibir') }}" title="Carrinho" class="relative block py-2 px-3 text-red-600 hover:underline decoration-red-600">
            <img src="/images/cart-icon.svg" alt="Carrinho de Compras" class="h-8">
          
            @php
              $cart = session('cart', []);
              $cartCount = array_sum(array_column($cart, 'quantity'));
            @endphp

            <span class="absolute -top-1 -right-1 flex items-center justify-center h-5 w-5 rounded-full {{ $cartCount > 0 ? 'bg-red-600' : 'bg-gray-400' }} text-white text-xs font-bold">
              {{ $cartCount }}
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
