<?php

namespace App\Http\Livewire;

use App\Models\Recipe as ModelsRecipe;
use Livewire\Component;

class Recipe extends Component
{
    public $recipe;

    public function mount(ModelsRecipe $recipe)
    {
        $this->recipe = $recipe;
    }

    public function destroy(ModelsRecipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('explore');
    }

    public function render()
    {
        return view('livewire.recipe');
    }
}
