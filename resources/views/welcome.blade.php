<x-guestLayout>

    <!-- Header com logo e botão de menu (apenas mobile) -->
    <header class="w-full px-4 py-4 flex justify-between items-center md:hidden bg-white shadow-md fixed top-0 left-0 z-50">
        <img src="/images/ttsimple.png" alt="Logo" class="h-10 w-auto">
        <button id="menu-toggle" class="text-gray-800 focus:outline-none">
            <!-- Ícone de menu hamburguer -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </header>

    <!-- Espaço para compensar o header fixo no mobile -->
    <div class="h-[64px] md:hidden"></div>

    <!-- Seção de Vídeo (oculto em mobile) -->
    <div id="main-content" class="w-full mx-auto flex flex-col md:flex-row opacity-100 transition-opacity duration-1000">
        <div class="hidden md:block relative w-full md:w-1/2 h-auto overflow-hidden"
             style="clip-path: polygon(0 0%, 100% 0%, 75% 100%, 0% 100%);">
            <video autoplay muted loop class="w-full h-full object-cover">
                <source src="videos/testevideo.mp4" type="video/mp4">
            </video>
        </div>

        <div class="w-full md:w-1/2 flex flex-col items-start justify-center px-6 md:px-10 py-10 md:py-16">
            <p class="text-4xl md:text-6xl font-bold leading-tight text-gray-900">
                <span class="text-black drop-shadow-md">Unpredictable</span><br>
                <span class="text-red-600 drop-shadow-lg">Target</span>
            </p>
            <a href="/sobre" title="Sobre nós" class="mt-6 bg-black text-white text-lg font-semibold px-6 py-3 md:px-8 md:py-4 rounded-full hover:bg-red-600 hover:scale-105 transition-transform duration-300 shadow-md">
                Sobre Nós
            </a>
        </div>
    </div>

    <!-- Seção de Parceiros -->
    <section class="py-16 w-full">
        <div class="w-[95%] md:w-[85%] mx-auto">
            <div id="scroll-container" class="flex overflow-x-auto no-scrollbar">
                <ul class="flex gap-6 min-w-max animate-scroll">
                    @foreach ($partners as $partner)
                        @if ($partner->smallimage)
                            <li>
                                <img
                                    src="/images/{{ $partner->smallimage }}"
                                    class="bg-white min-w-[150px] md:min-w-[200px] h-[80px] md:h-[100px] object-contain"
                                    alt="{{ $partner->name }}"
                                />
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <!-- Seção de Últimas Notícias -->
    <section class="py-16 w-full">
        <div class="w-[95%] md:w-[85%] mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Últimas Notícias</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($newsInformation as $news)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
                        <a href="{{ route('newsinformation.show', ['slug' => $news->slug]) }}">
                            <img 
                                src="{{ asset('images/newsinformation/' . $news->image) }}" 
                                alt="{{ $news->name }}" 
                                class="w-full h-48 object-cover"
                            />
                        </a>
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $news->title }}</h3>
                            <p class="text-gray-600 text-sm">{{ Str::limit($news->slug, 80) }}</p>
                            <a href="{{ route('newsinformation.show', ['slug' => $news->slug]) }}"
                               class="inline-block text-red-600 font-semibold hover:underline mt-3">
                               Leia mais → 
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        @keyframes scrollPartnerImages {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .animate-scroll {
            animation: scrollPartnerImages 30s linear infinite;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <!-- Menu toggle script (placeholder para menu funcional futuramente) -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', () => {
            alert('Menu de navegação (placeholder). Aqui pode-se abrir um menu lateral ou dropdown.');
        });
    </script>
</x-guestLayout>
