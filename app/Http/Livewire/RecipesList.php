<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use App\Models\Recipes;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class RecipesList extends Component
{
    use WithPagination;

    public $term;
    public $category;

    public function render()
    {
        $categories = Category::all();

        return view('livewire.recipes-list', ['recipes' => Recipe::with('category')
                ->when(strlen($this->term) >= 1, function ($query) {
                    return $query->orWhere('title', 'LIKE', "%$this->term%")
                    ->orWhere('author', 'LIKE', "%$this->term%")
                    ->orWhere('description', 'LIKE', "%$this->term%");
                })
                ->when($this->category && $this->category !== 'All Categories', function ($query) use
                    ($categories) {
                        return $query->where('category_id', $categories->pluck('id', 'name')
                        ->get($this->category));
                    })
                ->latest()->paginate(6), 'categories' => $categories]);
    }
}
