<x-guestLayout>
    <section class="flex flex-col justify-center max-w-6xl min-h-screen px-4 py-10 mx-auto sm:px-6">
        <div class="flex flex-wrap items-center justify-between mb-8">
            <h2 class="mr-10 text-4xl font-bold leading-none md:text-5xl">
                Últimas Notícias
            </h2>
        </div>

        @if($newsInformation->isEmpty())
            <p class="text-gray-500 text-center">Nenhuma notícia disponível no momento.</p>
        @else
            <div class="flex flex-wrap -mx-4">
                @foreach($newsInformation as $news)
                    <div class="w-full max-w-full mb-8 sm:w-1/2 px-4 lg:w-1/3 flex flex-col">
                        <img src="{{ asset($news->image) }}" alt="{{ $news->name }}" class="object-cover object-center w-full h-48">
                        <div class="flex flex-grow">
                            <div class="triangle"></div>
                            <div class="flex flex-col justify-between px-4 py-6 bg-white border border-gray-400">
                                <div>
                                    <a href="#"
                                        class="inline-block mb-4 text-xs font-bold capitalize border-b-2 border-blue-600 hover:text-blue-600">Notícia
                                    </a>
                                    <a href="{{ route('news.show', $news->slug) }}"
                                        class="block mb-4 text-2xl font-black leading-tight hover:underline hover:text-blue-600">
                                        {{ $news->name }}
                                    </a>
                                    <p class="mb-4">
                                        {{ Str::limit($news->description, 100, '...') }}
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ route('news.show', $news->slug) }}"
                                        class="inline-block pb-1 mt-2 text-base font-black text-blue-600 uppercase border-b border-transparent hover:border-blue-600">
                                        Leia mais ->
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
