<div class="min-h-screen max-w-7xl mx-auto px-5 lg:px-9 md:px-8 py-6">
    <div class="text-center">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="font-semibold text-lg"><?php echo e($category->name); ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <form class="mt-12 max-w-xl mx-auto" wire:submit.prevent="create">
        <div class="mb-8">
            <label class="block text-gray-700 text-lg font-semibold mb-2" for="name">
              New Category:
            </label>
            <input wire:model.defer="name" class="shadow border mb-1 rounded-xl w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="flex items-center justify-center">
            <div class="flex justify-center space-x-2">
              <button wire:click="create" type="submit" class="bg-blue-500 font-semibold rounded-xl px-6 py-2 text-white uppercase">Create</button>
            </div>
        </div>
    </form>
</div>
<?php /**PATH /Users/nickdillon/Documents/Development/Laravel/Recipe-App/resources/views/livewire/categories-list.blade.php ENDPATH**/ ?>