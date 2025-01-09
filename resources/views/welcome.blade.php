<x-guestLayout>
    <!-- Video and Text Section -->
    <div class="w-full mx-auto flex">
        <!-- Video Section with Clip Path -->
        <div class="relative w-full h-full overflow-hidden" style="clip-path: polygon(0 0%, 100% 0%, 75% 100%, 0% 100%);">
            <video autoplay muted loop class="w-full h-full object-cover">
                <source src="videos/testevideo.mp4" type="video/mp4">
            </video>
        </div>

        <!-- Text Section -->
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

</x-guestLayout>
