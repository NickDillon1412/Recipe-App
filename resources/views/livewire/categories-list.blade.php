<div class="min-h-screen max-w-7xl mx-auto px-5 lg:px-9 md:px-8 py-6">
    <div class="text-center">
        @foreach($categories as $category)
            <div class="font-semibold text-lg">{{ $category->name }}</div>
        @endforeach
    </div>

    <form class="mt-12 max-w-xl mx-auto" wire:submit.prevent="create">
        <div class="mb-8">
            <label class="block text-gray-700 text-lg font-semibold mb-2" for="name">
              New Category:
            </label>
            <input wire:model.defer="name" class="shadow border mb-1 rounded-xl w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-center">
            <div class="flex justify-center space-x-2">
              <button wire:click="create" type="submit" class="bg-blue-500 font-semibold rounded-xl px-6 py-2 text-white uppercase">Create</button>
            </div>
        </div>
    </form>
</div>
