<div class="min-h-screen max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="rounded-xl md:mt-3 lg:mt-4 bg-white md:py-3 lg:py-3 py-3">
        <div class="w-full mx-auto max-w-3xl mt-8">
            <h1 class="text-3xl flex justify-center mb-3 text-gray-800 font-semibold">Create Recipe</h1>

            <x-form wire:submit.prevent="create" class="px-8 pt-6 pb-8 mb-4 max-w-xl mx-auto">
                <div class="mb-8">
                    <label class="block text-gray-700 text-lg font-semibold mb-2" for="title">
                        Title:
                    </label>
                    <input wire:model.defer="title"
                        class="shadow border mb-1 rounded-xl w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" type="text" placeholder="Title">
                    @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="mb-8">
                <label class="block text-gray-700 text-lg font-semibold mb-2" for="author">
                  Author:
                </label>
                <input wire:model.defer="author" class="shadow border mb-1 rounded-xl w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="author" type="text" placeholder="Author">
                @error('author') <span class="text-red-500">{{ $message }}</span> @enderror
              </div> --}}
                <div class="mb-8">
                    <label class="block text-gray-700 text-lg font-semibold mb-2" for="image">
                        Image:
                    </label>
                    <input wire:model="image"
                        class="shadow border mb-1 border-gray-700 rounded-xl w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="image" name="image" type="file" placeholder="Choose Image" />
                    @error('image')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-8">
                    <label class="block text-gray-700 text-lg font-semibold mb-2" for="category">
                        Category:
                    </label>
                    <select wire:model="category" class="px-3 py-3 rounded-xl xl:mt-0 lg:mt-0 md:mt-0 mt-2 w-full"
                        name="categories" id="categories">
                        <option selected>All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-8">
                    <label class="block text-gray-700 text-lg font-semibold mb-2" for="description">
                        Description:
                    </label>
                    <textarea wire:model.defer="description"
                        class="shadow border rounded-xl w-full pb-6 px-3 text-gray-700 focus:outline-none focus:shadow-outline"
                        id="description" type="text"></textarea>
                    @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-8">
                    <label class="block text-gray-700 text-lg font-semibold mb-2" for="ingredients">
                        Ingredients:
                    </label>
                    <textarea wire:model.defer="ingredients"
                        class="shadow border rounded-xl w-full pb-6 px-3 text-gray-700 focus:outline-none focus:shadow-outline"
                        id="ingredients" type="text"></textarea>
                    @error('ingredients')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-8">
                    <label class="block text-gray-700 text-lg font-semibold mb-2" for="instructions">
                        Instructions:
                    </label>
                    <textarea wire:model.defer="instructions"
                        class="shadow border rounded-xl w-full pb-6 px-3 text-gray-700 focus:outline-none focus:shadow-outline"
                        id="instructions" type="text"></textarea>
                    @error('instructions')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-center">
                    <div class="flex justify-center space-x-2">
                        <button wire:click="create" type="submit"
                            class="bg-blue-500 font-semibold rounded-xl px-6 py-2 text-white uppercase">Create</button>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</div>
