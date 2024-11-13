<x-guestLayout>
    <x-header/>
    <div class="relative h-screen flex">
        <div style="
        left: -160px;
        top: 0;
        bottom: 0;
        height: 0;
        width: 0;
        border-top: 300px solid transparent;
        border-right: 80px solid white;
        border-bottom: 300px solid white;
        border-left: 80px solid transparent;" class="text-7xl absolute w-1/2 right-0 text-center h-full">abc</div>
            <video autoplay muted loop class="w-full h-full object-cover">
                <source src="videos/testevideo.mp4" type="video/mp4">
            </video>
        </div>
    </div>
    <x-footer/>
</x-guestLayout>