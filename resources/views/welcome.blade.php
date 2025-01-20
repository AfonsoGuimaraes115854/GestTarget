<x-guestLayout>
    <div class="w-full mx-auto flex">
        <div class="relative w-full h-full overflow-hidden" style="clip-path: polygon(0 0%, 100% 0%, 75% 100%, 0% 100%);">
            <video autoplay muted loop class="w-full h-full object-cover">
                <source src="videos/testevideo.mp4" type="video/mp4">
            </video>
        </div>

        <div class="w-1/2 flex flex-col items-start justify-center px-10">
            <p class="text leading-relaxed text-4xl md:text-6xl font-bold">
                <span class="text-black drop-shadow-md">Unpredictable</span> <br>
                <span class="text-red-600 drop-shadow-md">Target</span>
            </p>
            <br>
            <a href="/sobre" title="Sobre nós" class="mt-4 bg-black text-white text-lg font-semibold px-6 py-3 rounded-full hover:bg-red-600 transition">
                Sobre Nós
            </a>
        </div>
    </div>

    <section class="flex flex-col gap-10 py-16">
        <div class="flex gap-4 flex-col px-4 h-full relative z-50 md:w-[85%] w-[95%] mx-auto">
            <div class="flex items-center gap-4"></div>
            <div id="scroll-container" class="scroll-linear flex flex-1 overflow-x-scroll no-scrollbar relative">
                <ul class="flex gap-0">
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
</x-guestLayout>
