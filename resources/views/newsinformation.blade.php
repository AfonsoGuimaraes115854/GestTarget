<x-guestLayout>
    <section class="flex flex-col justify-center max-w-6xl min-h-screen px-4 py-10 mx-auto sm:px-6">
        <div class="flex flex-wrap items-center justify-between mb-8">
            <h2 class="mr-10 text-4xl font-bold leading-none md:text-5xl text-black">
                Últimas Notícias
            </h2>
        </div>

        @if($newsInformation->isEmpty())
            <p class="text-gray-500 text-center">Nenhuma notícia disponível no momento.</p>
        @else
            <div class="flex flex-wrap -mx-4">
                @foreach($newsInformation as $news)
                    <div class="w-full max-w-full mb-8 sm:w-1/2 px-4 lg:w-1/3 flex flex-col">
                        <!-- Imagem da notícia -->
                        <img src="{{ asset('images/newsinformation/' . $news->image) }}" alt="{{ $news->name }}"
                        class="object-cover object-center w-full h-48 rounded-lg shadow-md">
                        <div class="flex flex-col flex-grow border border-red-300 bg-white shadow-lg rounded-lg overflow-hidden">
                            <div class="p-6 flex flex-col justify-between flex-grow">
                                <div>
                                    <span class="inline-block px-3 py-1 mb-4 text-xs font-bold text-white uppercase bg-red-600 rounded-full">
                                        Notícia
                                    </span>
                                    <a href="{{ route('newsinformation.show', ['slug' => $news->slug]) }}"
                                       class="block mb-4 text-2xl font-black leading-tight hover:underline hover:text-red-600">
                                        {{ $news->name }}
                                    </a>
                                    <p class="text-gray-700 mb-4">
                                        {{ Str::limit($news->description, 100, '...') }}
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ route('newsinformation.show', ['slug' => $news->slug]) }}"
                                       class="inline-block text-red-600 font-semibold hover:underline">
                                        Leia mais →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</x-guestLayout>
