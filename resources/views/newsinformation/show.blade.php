<x-guestlayout>
    <main class="bg-white relative overflow-hidden min-h-screen flex items-center">
        <div class="container mx-auto px-6 py-16 flex flex-wrap items-center">
            <div class="w-full md:w-2/3 lg:w-2/5 text-center md:text-left">
                <span class="w-24 h-2 bg-red-500 block mb-6 mx-auto md:mx-0"></span>
                <h1 class="font-bebas-neue uppercase text-5xl sm:text-7xl font-black leading-none text-gray-800">
                    {{ $news->name }}
                </h1>
                <p class="mt-6 text-lg text-gray-700">
                    {{ $news->description }}
                </p>
                <div class="mt-8">
                    <a href="/newsinformation" 
                       class="uppercase py-3 px-6 rounded-lg border-2 border-red-500 text-red-500 
                              hover:bg-red-500 hover:text-white transition duration-300 ease-in-out text-md">
                        Voltar às Notícias
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/3 lg:w-3/5 mt-12 md:mt-0 flex justify-center">
                <img src="{{ asset($news->image) }}" 
                     alt="Imagem de {{ $news->name }}" 
                     class="max-w-xs md:max-w-sm lg:max-w-md rounded-lg shadow-lg"/>
            </div>
        </div>
    </main>
</x-guestlayout>
