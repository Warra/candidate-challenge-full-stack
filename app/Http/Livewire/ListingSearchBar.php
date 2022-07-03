<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class ListingSearchBar extends Component
{
    public $query;
    public $categories;
    public $categorySelected;

    public function mount()
    {
        $this->query = '';
        $this->categorySelected = null;
        $this->categories = Category::all()->toArray();
    }

    public function updatedQuery()
    {
        $this->emit('query-updated', $this->query);
    }

    public function updatedCategorySelected()
    {
        $this->emit('category-selected', $this->categorySelected);
    }

    public function render()
    {
        return view('livewire.listing-search-bar');
    }
}
