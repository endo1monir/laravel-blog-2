<x-dropdown>
    <x-slot name="trigger">
        <button class="lg:inline-flex lg:w-32 w-full py-2 pl-3 pr-9 text-sm font-semibold">
            @if (isset($currentCategory))
                {{ $currentCategory->name }}
            @else
                categories
            @endif


          <x-down-arrow class="absolute pointer-events-none" />

        </button>
    </x-slot>
 <x-dropdown-item :active="request()->routeIs('home')" href="/?{{http_build_query(request()->except('category'))}}">All</x-dropdown-item>

    @foreach ($categories as $category)
    <x-dropdown-item  :active="isset($currentCategory) && $currentCategory->id === $category->id" href="/?category={{ $category->slug }}&{{http_build_query(request()->except('category','page'))}}">{{ $category->name }}</x-dropdown-item>
      
    @endforeach

</x-dropdown>