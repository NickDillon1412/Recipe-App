<?php

use App\Http\Livewire\Recipe;
use App\Http\Livewire\RecipeEdit;
use App\Http\Livewire\RecipesList;
use App\Http\Livewire\RecipeCreate;
use App\Http\Livewire\CategoriesList;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/recipes/explore');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/categories', CategoriesList::class)->name('new-category');
    Route::post('/category-create', [CategoriesList::class, 'create'])->name('create-category');

    Route::prefix('recipes')->group(function () {
        Route::get('/explore', RecipesList::class)->name('explore');

        Route::get('/create', RecipeCreate::class)->name('create-recipe');

        Route::post('/create', [RecipeCreate::class, 'submit'])->name('create');

        Route::get('/{recipe}', Recipe::class)->name('recipe');

        Route::get('{recipe}/edit', RecipeEdit::class)->name('edit-recipe');

        Route::delete('/delete/{recipe}', [Recipe::class, 'destroy'])->name('delete');
    });
});




require __DIR__ . '/auth.php';
