<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesList extends Component
{
    public $categories;
    public $name;

    protected $rules = [
        'name' => 'required|min:3'
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function create()
    {
        $this->validate();

        if (auth()->check()) {

            Category::create([
                'name' => $this->name
            ]);
            
            $this->reset();

            return redirect()->route('new-category');
        }

    }

    public function render()
    {
        return view('livewire.categories-list');
    }
}
