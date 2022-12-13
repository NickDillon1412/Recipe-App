<div class="min-h-screen max-w-2xl mx-auto px-5 lg:px-9 md:px-8 py-6">
    <a href="<?php echo e(route('create-recipe')); ?>"
        class="bg-blue-500 text-white rounded-xl px-3 py-2 mb-6 text-lg font-semibold">Create Recipe</a>

    <div class="rounded-xl mt-6 mx-auto bg-white md:py-3 lg:py-3 py-3 px-3">
        <div class="block py-6">
            <div class="text-center">
                <h1 class="text-4xl mb-1"><?php echo e($recipe->title); ?></h1>
                <h2 class="text-xl mb-4">Author: <?php echo e($recipe->author); ?></h2>
            </div>

            <div class="mb-4 flex justify-center lg:px-1 md:px-1 px-4">
                <img class="rounded-lg" width="500px" height="200px" src="<?php echo e(Storage::url($recipe->image)); ?>"
                    alt="Image">
            </div>

            <div class="mx-auto max-w-lg px-2">
                <h1 class="text-xl font-semibold mb-3"><?php echo e($recipe->description); ?></h1>
                <h1 class="text-xl font-semibold">Ingredients:</h1>
                <div class="px-3 py-1">
                    <ul class="text-md mb-2 list-disc ml-4 space-y-1">
                        <?php $__currentLoopData = explode(',', $recipe->ingredients); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <?php echo e($ingredient); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <h1 class="text-xl font-semibold">Instructions:</h1>
                <p class="mb-2"><?php echo e($recipe->instructions); ?></p>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modify-recipe', $recipe)): ?>
                <div class="flex justify-center space-x-2 mt-5">
                    <a href="<?php echo e(route('edit-recipe', $recipe)); ?>"
                        class="bg-blue-500 font-semibold rounded-xl px-10 py-2 text-white uppercase">Edit</a>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form-button','data' => ['method' => 'POST','action' => ''.e(route('delete', $recipe->id)).'']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['method' => 'POST','action' => ''.e(route('delete', $recipe->id)).'']); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="bg-red-500 font-semibold rounded-xl px-7 py-2 text-white uppercase">Delete</button>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /Users/nickdillon/Documents/Development/Laravel/recipes/resources/views/livewire/recipe.blade.php ENDPATH**/ ?>