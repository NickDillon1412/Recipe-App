<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Recipe as ModelsRecipe;
use Livewire\Component;
use Livewire\WithFileUploads;

class RecipeEdit extends Component
{
    use WithFileUploads;

    public $recipe;
    public $title;
    public $author;
    public $image;
    public $categories;
    public $category;
    public $category_id;
    public $description;
    public $ingredients;
    public $instructions;

    public ModelsRecipe $modelsrecipe;

    protected $rules = [
        'title' => 'required|min:3',
        'author' => 'required|min:3',
        'category' => 'min:1',
        'category_id' => 'min:1',
        'description' => 'required|min:10|max:40',
        'ingredients' => 'required|min:10',
        'instructions' => 'required|min:10',
    ];

    public function mount(ModelsRecipe $recipe)
    {
        $this->categories = Category::all();
        $this->recipe = $recipe;
        $this->title = $recipe->title;
        $this->author = $recipe->author;
        $this->image = $recipe->image;
        $this->category = $recipe->category;
        $this->category_id = $recipe->category->id;
        $this->description = $recipe->description;
        $this->ingredients = $recipe->ingredients;
        $this->instructions = $recipe->instructions;
    }

    public function updatedImage()
    {
        $this->validate();
    }

    public function update()
    {
        $this->validate();

        if (auth()->check()) {
            $this->recipe->update([
                'user_id' => $this->recipe->user_id,
                'title' => $this->title,
                'author' => $this->author,
                'category_id' => $this->category,
                'description' => $this->description,
                'ingredients' => $this->ingredients,
                'instructions' => $this->instructions,
            ]);

            return redirect()->route('explore');
        }
    }

    public function render()
    {
        return view('livewire.recipe-edit');
    }
}
