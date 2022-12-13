<div class="min-h-screen max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="rounded-xl md:mt-3 lg:mt-4 bg-white md:py-3 lg:py-3 py-3">
        <div class="w-full mx-auto max-w-3xl mt-8">
            <h1 class="text-3xl flex justify-center mb-3 text-gray-800 font-semibold">Create Recipe</h1>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form','data' => ['wire:submit.prevent' => 'create','class' => 'px-8 pt-6 pb-8 mb-4 max-w-xl mx-auto']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:submit.prevent' => 'create','class' => 'px-8 pt-6 pb-8 mb-4 max-w-xl mx-auto']); ?>
              <div class="mb-8">
                <label class="block text-gray-700 text-lg font-semibold mb-2" for="title">
                  Title:
                </label>
                <input wire:model.defer="title" class="shadow border mb-1 rounded-xl w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Title">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              
              <div class="mb-8">
                <label class="block text-gray-700 text-lg font-semibold mb-2" for="image">
                  Image:
                </label>
                <input wire:model="image" class="shadow border mb-1 border-gray-700 rounded-xl w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file" placeholder="Choose Image"/>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <div class="mb-8">
                <label class="block text-gray-700 text-lg font-semibold mb-2" for="category">
                  Category:
                </label>
                <select wire:model="category" class="px-3 py-3 rounded-xl xl:mt-0 lg:mt-0 md:mt-0 mt-2 w-full" name="categories" id="categories">
                  <option selected>All Categories</option>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div class="mb-8">
                <label class="block text-gray-700 text-lg font-semibold mb-2" for="description">
                  Description:
                </label>
                <textarea wire:model.defer="description" class="shadow border rounded-xl w-full pb-6 px-3 text-gray-700 focus:outline-none focus:shadow-outline" id="description" type="text"></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <div class="mb-8">
                <label class="block text-gray-700 text-lg font-semibold mb-2" for="ingredients">
                  Ingredients:
                </label>
                <textarea wire:model.defer="ingredients" class="shadow border rounded-xl w-full pb-6 px-3 text-gray-700 focus:outline-none focus:shadow-outline" id="ingredients" type="text"></textarea>
                <?php $__errorArgs = ['ingredients'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <div class="mb-8">
                <label class="block text-gray-700 text-lg font-semibold mb-2" for="instructions">
                  Instructions:
                </label>
                <textarea wire:model.defer="instructions" class="shadow border rounded-xl w-full pb-6 px-3 text-gray-700 focus:outline-none focus:shadow-outline" id="instructions" type="text"></textarea>
                <?php $__errorArgs = ['instructions'];
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
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
          </div>
    </div>
</div><?php /**PATH /Users/nickdillon/Documents/Development/Laravel/recipes/resources/views/livewire/recipe-create.blade.php ENDPATH**/ ?>