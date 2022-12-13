<div class="min-h-screen max-w-7xl mx-auto px-5 lg:px-9 md:px-8 py-6">
    <div class="lg:flex lg:justify-between md:flex md:justify-between">
        <div class="space-x-2 flex justify-between">
            <a href="{{ route('create-recipe') }}"
                class="bg-blue-500 text-white rounded-xl text-center px-3 py-2 text-md font-semibold lg:w-auto md:w-auto w-full">Create
                Recipe</a>
            <a href="{{ route('new-category') }}"
                class="bg-blue-500 text-white rounded-xl text-center px-3 py-2 text-md font-semibold lg:w-auto md:w-auto w-full">View
                Categories</a>
        </div>

        {{-- <x-custom-dropdown>
            <x-slot name="trigger">
                <button>Categories</button>
            </x-slot>

            @foreach ($categories as $category)
                <x-custom-dropdown-link href="/">{{ $category->name }}</x-custom-dropdown-link>
            @endforeach
        </x-custom-dropdown> --}}

        <div class="block justify-between xl:mt-0 lg:mt-0 md:mt-0 lg:space-x-2 md:space-x-2">
            <input wire:model="term"
                class="rounded-xl xl:p-2 lg:p-2 md:p-2 px-2 text-md xl:mt-0 lg:mt-0 md:mt-0 mt-4 lg:w-auto md:w-auto sm:w-auto w-full"
                type="search" placeholder="Search">

            <select wire:model="category"
                class="rounded-xl xl:mt-0 lg:mt-0 md:mt-0 mt-3 lg:w-auto md:w-auto sm:w-auto w-full" name="category"
                id="category">
                <option value="All Categories">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div
        class="grid xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 xl:gap-12 lg:gap-8 md:gap-8 md:py-3 lg:py-3 py-8 mt-3 mx-auto">
        @forelse ($recipes as $recipe)
            <div class="mx-auto px-8 py-2 lg:py-3 md:py-3 bg-white rounded-xl overflow-hidden mb-8">
                <div class="py-6">
                    <a href="{{ route('recipe', $recipe) }}">
                        <div class="px-1">
                            <h1 class="text-3xl mb-1">{{ $recipe->title }}</h1>
                            <h2 class="text-xl mb-1">Author: {{ $recipe->author }}</h2>
                            <p class="mb-4 font-semibold">{{ $recipe->category->name }}</p>
                        </div>

                        <div
                            class="mb-3 flex justify-center xl:h-72 xl:w-80 lg:h-72 lg:w-96 md:h-64 md:w-72 h-64 w-72 aspect-auto">
                            <img class="h-full w-full object-cover rounded-lg"
                                src="{{ asset('storage/' . $recipe->image) }}" alt="Image">
                        </div>

                        <div class="flex justify-center">
                            <p class="mt-1 px-1">{{ $recipe->description }}</p>
                        </div>
                    </a>

                    @can('modify-recipe', $recipe)
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('edit-recipe', $recipe) }}"
                                class="bg-blue-500 font-semibold rounded-xl px-7 py-2 mt-4 text-white uppercase">Edit</a>
                            <x-form-button method="post" action="{{ route('delete', $recipe->id) }}">
                                @method('delete')
                                <button type="submit"
                                    class="bg-red-500 font-semibold rounded-xl px-4 py-2 mt-4 text-white uppercase">Delete</button>
                            </x-form-button>
                        </div>
                    @endcan

                    @cannot('modify-recipe', $recipe)
                        <a class="flex justify-center mx-auto mt-4 w-4/12 bg-gray-800 text-white py-2 rounded-xl"
                            href="{{ route('recipe', $recipe) }}">
                            <div class="px-1">
                                <button class="uppercase">View</button>
                            </div>
                        </a>
                    @endcannot
                </div>
            </div>

        @empty
            <div class="mx-auto mt-12 text-center text-xl font-semibold col-span-3">
                No recipes were found...
            </div>
        @endforelse
    </div>

    {{ $recipes->links() }}
</div>
