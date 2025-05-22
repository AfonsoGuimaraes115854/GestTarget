<nav class="bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">
  <!-- Top Bar -->
  <div class="bg-gray-900 text-white py-2 px-4">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center">
      <!-- Logo -->
      <a href="/">
        <img src="/images/Logo.png" alt="Logo" class="h-16">
      </a>

      <!-- Mobile menu toggle -->
      <button id="menu-toggle" class="lg:hidden text-white focus:outline-none">
        <img src="/images/hamburger-icon.svg" alt="Menu" class="h-8">
      </button>

      <!-- Contact Info (Desktop) -->
      <div class="hidden lg:flex space-x-10">
        <div class="flex items-center space-x-3">
          <img src="/images/emailicon.svg" alt="Email" class="h-8">
          <div>
            <p class="font-bold">Email Geral</p>
            <a href="mailto:loja@targettools.pt" class="text-sm hover:underline decoration-red-600">loja@targettools.pt</a>
          </div>
        </div>
        <div class="flex items-center space-x-3">
          <img src="/images/phoneicon.svg" alt="Telefone" class="h-8">
          <div>
            <p class="font-bold">Telefone</p>
            <a href="tel:351223228781" class="text-sm hover:underline decoration-red-600">+351 223 228 781</a>
          </div>
        </div>
        <div class="flex items-center space-x-3">
          <img src="/images/clockicon.svg" alt="Horário" class="h-8">
          <div>
            <p class="font-bold">Horário</p>
            <p class="text-sm">Seg-Sex 09:00 - 18:30</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Divider -->
  <div class="bg-red-600 h-[1px]"></div>

  <!-- Navigation Links -->
  <div class="bg-gray-900">
    <div class="max-w-screen-xl mx-auto px-4 py-2">
      <!-- Desktop -->
      <ul class="hidden lg:flex justify-center space-x-6">
        <li><a href="/equipments" class="text-red-600 hover:underline decoration-red-600">Equipamentos</a></li>
        <li><a href="/newsinformation" class="text-red-600 hover:underline decoration-red-600">Notícias</a></li>
        <li><a href="/partners" class="text-red-600 hover:underline decoration-red-600">Parceiros</a></li>
        <li><a href="/contactos" class="text-red-600 hover:underline decoration-red-600">Contactos</a></li>
        <li class="relative">
          <a href="{{ route('carrinho.exibir') }}" class="relative text-red-600 hover:underline decoration-red-600">
            <img src="/images/cart-icon.svg" alt="Carrinho" class="h-6 inline-block">
            @php
              $cart = session('cart', []);
              $cartCount = array_sum(array_column($cart, 'quantity'));
            @endphp
            <span class="absolute -top-1 -right-1 h-5 w-5 text-xs font-bold rounded-full flex items-center justify-center text-white {{ $cartCount > 0 ? 'bg-red-600' : 'bg-gray-400' }}">
              {{ $cartCount }}
            </span>
          </a>
        </li>
      </ul>

      <!-- Mobile -->
      <div id="mobile-menu" class="lg:hidden hidden text-white">
        <ul class="flex flex-col items-center space-y-3 py-4">
          <li><a href="/equipments" class="text-red-600 hover:underline">Equipamentos</a></li>
          <li><a href="/newsinformation" class="text-red-600 hover:underline">Notícias</a></li>
          <li><a href="/partners" class="text-red-600 hover:underline">Parceiros</a></li>
          <li><a href="/contactos" class="text-red-600 hover:underline">Contactos</a></li>
          <li><a href="{{ route('carrinho.exibir') }}" class="text-red-600 hover:underline">Carrinho</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- JS for Mobile Toggle -->
<script>
  const toggle = document.getElementById('menu-toggle');
  const menu = document.getElementById('mobile-menu');
  toggle.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>
