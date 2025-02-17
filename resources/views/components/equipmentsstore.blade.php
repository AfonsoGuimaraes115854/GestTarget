@props(['equipments'])
<section id="Projects"
  class="gap-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 justify-items-center">
  @foreach ($equipments as $equipment)
    <div class="w-64 border-2 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
      <a href="/equipments/{{ $equipment->reference }}">
        <img src="/images/equipments/{{ $equipment->image }}" 
             alt="{{ $equipment->name }}" 
             class="h-48 w-64 object-cover rounded-t-xl">
        <div class="px-4 py-2">
          <span class="text-gray-400 uppercase text-xs">{{ $equipment->brand }}</span>
          <p class="text-sm font-bold text-black truncate capitalize">{{ $equipment->name }}</p>
          <div class="flex items-center mt-2">
            <div class="ml-auto">
            </div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
</section>