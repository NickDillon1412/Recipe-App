<div class="min-h-screen max-w-7xl mx-auto px-5 lg:px-9 md:px-8 py-6">
    <div class="lg:flex lg:justify-between md:flex md:justify-between">
        <div class="space-x-2 flex justify-between">
            <a href="<?php echo e(route('create-recipe')); ?>"
                class="bg-blue-500 text-white rounded-xl text-center px-3 py-2 text-md font-semibold lg:w-auto md:w-auto w-full">Create
                Recipe</a>
            <a href="<?php echo e(route('new-category')); ?>"
                class="bg-blue-500 text-white rounded-xl text-center px-3 py-2 text-md font-semibold lg:w-auto md:w-auto w-full">View
                Categories</a>
        </div>

        

        <div class="block justify-between xl:mt-0 lg:mt-0 md:mt-0 lg:space-x-2 md:space-x-2">
            <input wire:model="term"
                class="rounded-xl xl:p-2 lg:p-2 md:p-2 px-2 text-md xl:mt-0 lg:mt-0 md:mt-0 mt-4 lg:w-auto md:w-auto sm:w-auto w-full"
                type="search" placeholder="Search">

            <select wire:model="category"
                class="rounded-xl xl:mt-0 lg:mt-0 md:mt-0 mt-3 lg:w-auto md:w-auto sm:w-auto w-full" name="category"
                id="category">
                <option value="All Categories">All Categories</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->name); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

    <div
        class="grid xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 xl:gap-12 lg:gap-8 md:gap-8 md:py-3 lg:py-3 py-8 mt-3 mx-auto">
        <?php $__empty_1 = true; $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="mx-auto px-8 py-2 lg:py-3 md:py-3 bg-white rounded-xl overflow-hidden mb-8">
                <div class="py-6">
                    <a href="<?php echo e(route('recipe', $recipe)); ?>">
                        <div class="px-1">
                            <h1 class="text-3xl mb-1"><?php echo e($recipe->title); ?></h1>
                            <h2 class="text-xl mb-1">Author: <?php echo e($recipe->author); ?></h2>
                            <p class="mb-4 font-semibold"><?php echo e($recipe->category->name); ?></p>
                        </div>

                        <div
                            class="mb-3 flex justify-center xl:h-72 xl:w-80 lg:h-72 lg:w-96 md:h-64 md:w-72 h-64 w-72 aspect-auto">
                            <img class="h-full w-full object-cover rounded-lg"
                                src="<?php echo e(asset('storage/' . $recipe->image)); ?>" alt="Image">
                        </div>

                        <div class="flex justify-center">
                            <p class="mt-1 px-1"><?php echo e($recipe->description); ?></p>
                        </div>
                    </a>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modify-recipe', $recipe)): ?>
                        <div class="flex justify-center space-x-2">
                            <a href="<?php echo e(route('edit-recipe', $recipe)); ?>"
                                class="bg-blue-500 font-semibold rounded-xl px-7 py-2 mt-4 text-white uppercase">Edit</a>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-button','data' => ['method' => 'post','action' => ''.e(route('delete', $recipe->id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['method' => 'post','action' => ''.e(route('delete', $recipe->id)).'']); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit"
                                    class="bg-red-500 font-semibold rounded-xl px-4 py-2 mt-4 text-white uppercase">Delete</button>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('modify-recipe', $recipe)): ?>
                        <a class="flex justify-center mx-auto mt-4 w-4/12 bg-gray-800 text-white py-2 rounded-xl"
                            href="<?php echo e(route('recipe', $recipe)); ?>">
                            <div class="px-1">
                                <button class="uppercase">View</button>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="mx-auto mt-12 text-center text-xl font-semibold col-span-3">
                No recipes were found...
            </div>
        <?php endif; ?>
    </div>

    <?php echo e($recipes->links()); ?>

</div>
<?php /**PATH /Users/nickdillon/Documents/Development/Laravel/Recipe-App/resources/views/livewire/recipes-list.blade.php ENDPATH**/ ?>