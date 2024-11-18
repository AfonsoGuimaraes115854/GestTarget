<x-guestlayout>
    <style>
    .image-hover {transition: opacity 0.3s ease;}
    .image-hover:hover {opacity: 0.5;}
    </style>
    <div class="container mx-auto px-3 py-12">
    <h2 class="flex justify-center mb-1 text-3xl font-extrabold leading-tight text-gray-900">Parceiros Certificados</h2><br>
    </div>
    <div class="max-w-5xl gap-3 mx-auto container px-4 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5">
        @foreach ($partners as $partner)
            <a href="{{ $partner->url }}" target="_blank" title="{{ $partner->description }}"><img src="images/{{ $partner->image }}" alt="{{ $partner->name}}" class="rounded-lg p-4 shadow-md w-44 h-auto image-hover"></a>
        @endforeach
    </div>
</x-guestlayout>