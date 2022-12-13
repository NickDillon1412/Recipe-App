<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class RecipeCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $author;
    public $image;
    public $categories;
    public $category;
    public $description;
    public $ingredients;
    public $instructions;

    protected $rules = [
        'title' => 'required|min:3',
        'image' => ['required', 'file', 'mimes:png,jpg,pdf', 'max:102400'],
        'description' => 'required|min:10|max:40',
        'ingredients' => 'required|min:10',
        'instructions' => 'required|min:10',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function create()
    {
        $this->validate();

        if (auth()->check()) {

            Recipe::create([
                'user_id' => auth()->id(),
                'title' => $this->title,
                'author' => Auth::user()->name,
                'image' => $this->image ? $this->image->store('images', 'public') : null,
                'category_id' => $this->category,
                'description' => $this->description,
                'ingredients' => $this->ingredients,
                'instructions' => $this->instructions,
            ]);

            $this->reset();

            return redirect()->route('explore');
        }
    }

    public function render()
    {
        return view('livewire.recipe-create');
    }
}
