<x-guestLayout>
    <!-- Tela de Carregamento (Overlay) -->
    <div id="loading-screen" class="fixed inset-0 bg-white flex justify-center items-center z-50">
        <div class="flex flex-col items-center text-black">
            <!-- Logotipo que gira -->
            <img id="logo" src="images/ttsimple.png" alt="Logo" class="w-32 h-32 mb-4 animate-spin-slow">
            <!-- Contador de progresso -->
            <p id="progress" class="text-xl">0%</p>
        </div>
    </div>

    <!-- Seção de Vídeo -->
    <div id="main-content" class="w-full mx-auto flex opacity-0 transition-opacity duration-1000">
        <div class="relative w-full h-full overflow-hidden" style="clip-path: polygon(0 0%, 100% 0%, 75% 100%, 0% 100%);">
            <video autoplay muted loop class="w-full h-full object-cover">
                <source src="videos/testevideo.mp4" type="video/mp4">
            </video>
        </div>

        <div class="w-full md:w-1/2 flex flex-col items-start justify-center px-6 md:px-10 py-16">
            <p class="text-4xl md:text-6xl font-bold leading-tight text-gray-900">
                <span class="text-black drop-shadow-md">Unpredictable</span><br>
                <span class="text-red-600 drop-shadow-lg">Target</span>
            </p>
            <br>
            <a href="/sobre" title="Sobre nós" class="mt-6 bg-black text-white text-lg font-semibold px-8 py-4 rounded-full hover:bg-red-600 hover:scale-105 transition-transform duration-300 ease-in-out shadow-md">
                Sobre Nós
            </a>
        </div>
    </div>

    <!-- Seção de Parceiros -->
    <section class="flex flex-col gap-10 py-16">
        <div class="flex gap-4 flex-col px-4 h-full relative z-50 md:w-[85%] w-[95%] mx-auto">
            <div class="flex items-center gap-4"></div>
            <div id="scroll-container" class="scroll-linear flex flex-1 overflow-x-scroll no-scrollbar relative">
                <ul class="flex gap-0 animate-scroll">
                    @foreach ($partners as $partner)
                        <li>
                            @if ($partner->smallimage)
                                <img
                                    src="/images/{{ $partner->smallimage }}"
                                    class="bg-app_white min-w-[200px] h-[100px] shrink-0"
                                    alt="{{ $partner->name }}"
                                />
                            @endif
                        </li>
                    @endforeach
                    @foreach ($partners as $partner)
                        <li>
                            @if ($partner->smallimage)
                                <img
                                    src="/images/{{ $partner->smallimage }}"
                                    class="bg-app_white min-w-[200px] h-[100px] shrink-0"
                                    alt="{{ $partner->name }}"
                                />
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <!-- Seção de Últimas Notícias -->
    <section class="flex flex-col gap-10 py-16">
        <div class="flex gap-4 flex-col px-4 h-full relative z-50 md:w-[85%] w-[95%] mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-800">Últimas Notícias</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($newsInformation as $news)
                    <div class="news-item bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl opacity-0">
                        <!-- Envolvendo a imagem com o link para redirecionar -->
                        <a href="{{ route('newsinformation.show', ['slug' => $news->slug]) }}">
                            <img 
                                src="{{ asset('images/newsinformation/' . $news->image) }}" 
                                alt="{{ $news->name }}" 
                                class="w-full h-48 object-cover rounded-t-lg"
                            />
                        </a>
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $news->title }}</h3>
                            <p class="text-gray-600 text-sm mt-2">{{ Str::limit($news->slug, 80) }}</p>
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

    <script>
        // Função para remover o loading screen e mostrar a página após o carregamento
        window.addEventListener('load', function() {
            // Variáveis para o progresso
            const loadingScreen = document.getElementById('loading-screen');
            const progressText = document.getElementById('progress');
            const logo = document.getElementById('logo');
            const mainContent = document.getElementById('main-content');
            const partnerItems = document.querySelectorAll('.partner-item');
            const newsItems = document.querySelectorAll('.news-item');
            let progress = 0;
            
            // Função para atualizar a barra de progresso e logotipo
            const interval = setInterval(function() {
                progress += 1;
                progressText.textContent = progress + '%';
                if (progress === 100) {
                    clearInterval(interval);
                    // Após o progresso atingir 100%, removemos a tela de carregamento
                    loadingScreen.style.display = 'none';
                    // Torna o conteúdo principal visível suavemente
                    mainContent.classList.remove('opacity-0');
                    mainContent.classList.add('opacity-100');
                    // Torna as imagens dos parceiros e notícias visíveis suavemente
                    partnerItems.forEach(item => {
                        item.classList.remove('opacity-0');
                        item.classList.add('opacity-100');
                    });
                    newsItems.forEach(item => {
                        item.classList.remove('opacity-0');
                        item.classList.add('opacity-100');
                    });
                }
            }, 10); // Atualiza o progresso a cada 50ms

            // Animação de rotação do logotipo
            logo.classList.add('animate-spin-slow');
        });
    </script>

    <style>
        /* Definindo a animação de rotação suave para o logo */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin 5s linear infinite;
        }

        /* Movimento contínuo das imagens dos parceiros */
        @keyframes scrollPartnerImages {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        .animate-scroll {
            animation: scrollPartnerImages 30s linear infinite;
        }
    </style>
</x-guestLayout>
