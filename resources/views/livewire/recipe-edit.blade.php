<div class="min-h-screen max-w-2xl mx-auto px-5 lg:px-9 md:px-8 py-6">
    <div class="rounded-xl md:mt-3 lg:mt-4 mx-auto bg-white md:py-3 lg:py-3 py-3">
        <div class="w-full mx-auto max-w-3xl mt-8">
            <h1 class="text-3xl flex justify-center mb-3 text-gray-800 font-semibold">Edit Recipe</h1>

            <form method="POST" action="/" wire:submit.prevent="update" class="px-8 pt-6 pb-8 max-w-xl mx-auto">
                @csrf
                @method('patch')

                <div class="mb-8">
                    <label class="block text-gray-700 text-lg font-semibold mb-2" for="title">
                        Title:
                    </label>
                    <input wire:model="title" value="{{ $recipe->title }}"
                        class="shadow border rounded-xl w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" type="text">
                </div>
                {{-- <div class="mb-8">
                <label class="block text-gray-700 text-lg font-semibold mb-2" for="author">
                  Author:
                </label>
                <input wire:model="author" value="{{ $recipe->author }}" class="shadow border rounded-xl w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="author" type="text">
              </div> --}}
                {{-- <div class="mb-8">
                <label class="block text-gray-700 text-lg font-semibold mb-2" for="image">
                  Image:
                </label>
                <img class="rounded-lg hidden w-75 h-75" width="600px" height="200px" src="{{ $image->temporaryUrl() }}" alt="Image">
                <img class="rounded-lg w-75 h-75" width="600px" height="200px" src="{{ Storage::url($recipe->image) }}" alt="Image">
                <input wire:model="image" class="shadow border border-gray-700 rounded-xl mt-2 w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="picture" type="file" placeholder="Choose Picture"/>
                </label> @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
              </div> --}}
                <div class="mb-8">
                    <label class="block text-gray-700 text-lg font-semibold mb-2" for="category">
                        Category:
                    </label>

                    <select wire:model="category" class="px-3 py-3 rounded-xl xl:mt-0 lg:mt-0 md:mt-0 mt-2 w-full"
                        name="categories" id="categories">
                        <option selected>{{ $recipe->category->name }}</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-semibold mb-2" for="description">
                        Description:
                    </label>
                    <textarea wire:model="description"
                        class="shadow border hover:overflow-y-scroll overflow-hidden rounded-xl w-full pb-6 px-3 text-gray-700 mb-3 focus:outline-none focus:shadow-outline"
                        id="description" type="text">{{ $recipe->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-semibold mb-2" for="ingredients">
                        Ingredients:
                    </label>
                    <textarea wire:model="ingredients"
                        class="shadow border hover:overflow-y-scroll overflow-hidden rounded-xl w-full pb-6 px-3 text-gray-700 mb-3 focus:outline-none focus:shadow-outline"
                        id="ingredients" type="text">{{ $recipe->ingredients }}</textarea>
                </div>

                <div>
                    <label class="block text-gray-700 text-lg font-semibold mb-2" for="instructions">
                        Instructions:
                    </label>
                    <textarea wire:model="instructions"
                        class="shadow border hover:overflow-y-scroll overflow-hidden rounded-xl w-full pb-6 px-3 text-gray-700 mb-3 focus:outline-none focus:shadow-outline"
                        id="instructions" type="text">{{ $recipe->instructions }}</textarea>
                </div>

        </div>
        </form>

        <div class="flex items-center justify-center">
            <div class="flex justify-center space-x-2 mb-8">
                <button wire:click="update" type="submit"
                    class="bg-blue-500 font-semibold rounded-xl px-7 py-2 text-white uppercase">Update</button>
                <x-form-button method="post" action="{{ route('delete', $recipe->id) }}">
                    @method('delete')
                    <button type="submit"
                        class="bg-red-500 font-semibold rounded-xl px-7 py-2 text-white uppercase">Delete</button>
                </x-form-button>
            </div>
        </div>
    </div>
</div>
