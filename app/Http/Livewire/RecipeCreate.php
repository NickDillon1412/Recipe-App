<?php

namespace App\Http\Livewire;

use Stringable;
use App\Models\Recipe;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
// use Cviebrock\EloquentSluggable\Services\SlugService;

class RecipeCreate extends Component
{
    use WithFileUploads;

    public $title;
    // public $slug;
    public $author;
    public $image;
    public $categories;
    public $category;
    public $description;
    public $ingredients;
    public $instructions;

    protected $rules = [
        'title' => 'required|min:3',
        // 'slug' => 'reqiured',
        'image' => ['required', 'file', 'mimes:png,jpg,pdf', 'max:102400'],
        'description' => 'required|min:10|max:40',
        'ingredients' => 'required|min:10',
        'instructions' => 'required|min:10',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    // public function updatedTitle()
    // {
    //     $this->slug = SlugService::createSlug(Recipe::class, 'slug', $this->title);
    // }

    public function create()
    {
        $this->validate();

        if (auth()->check()) {

            Recipe::create([
                'user_id' => auth()->id(),
                'title' => $this->title,
                // 'slug'  => $this->slug,
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
