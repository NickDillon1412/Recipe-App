<div class="min-h-screen max-w-2xl mx-auto px-5 lg:px-9 md:px-8 py-6">
    <a href="{{ route('create-recipe') }}"
        class="bg-blue-500 text-white rounded-xl px-3 py-2 mb-6 text-lg font-semibold">Create Recipe</a>

    <div class="rounded-xl mt-6 mx-auto bg-white md:py-3 lg:py-3 py-3 px-3">
        <div class="block py-6">
            <div class="text-center">
                <h1 class="text-4xl mb-1">{{ $recipe->title }}</h1>
                <h2 class="text-xl mb-4">Author: {{ $recipe->author }}</h2>
            </div>

            <div class="mb-4 flex justify-center lg:px-1 md:px-1 px-4">
                <img class="rounded-lg" width="500px" height="200px" src="{{ Storage::url($recipe->image) }}"
                    alt="Image">
            </div>

            <div class="mx-auto max-w-lg px-2">
                <h1 class="text-xl font-semibold mb-3">{{ $recipe->description }}</h1>
                <h1 class="text-xl font-semibold">Ingredients:</h1>
                <div class="px-3 py-1">
                    <ul class="text-md mb-2 list-disc ml-4 space-y-1">
                        @foreach (explode(',', $recipe->ingredients) as $ingredient)
                            <li>
                                {{ $ingredient }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <h1 class="text-xl font-semibold">Instructions:</h1>
                <p class="mb-2">{{ $recipe->instructions }}</p>
            </div>

            @can('modify-recipe', $recipe)
                <div class="flex justify-center space-x-2 mt-5">
                    <a href="{{ route('edit-recipe', $recipe) }}"
                        class="bg-blue-500 font-semibold rounded-xl px-10 py-2 text-white uppercase">Edit</a>
                    <x-form-button method="POST" action="{{ route('delete', $recipe->id) }}">
                        @method('DELETE')
                        <button class="bg-red-500 font-semibold rounded-xl px-7 py-2 text-white uppercase">Delete</button>
                    </x-form-button>
                </div>
            @endcan
        </div>
    </div>
</div>
