<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listing;
use App\Models\Category;

class ListingResults extends Component
{
    protected $listeners = ['query-updated' => 'queryUpdated', 'category-selected' => 'categoryUpdated'];

    public $query;
    public $listings;
    public $category;
    public $selectedCategory;

    public function mount()
    {
        $this->query = '';
        $this->category = 0;
        $this->listings = Listing::orderBy('online_at', 'desc')->limit(10)->get()->toArray();
        $this->selectedCategory = [];
    }

    public function queryUpdated($query)
    {
        $this->query = $query;
        $this->search();
    }

    public function categoryUpdated($category)
    {
        $this->category = (int) $category;
        $this->selectedCategory = Category::where('id', $category)->first();
        $this->search();
    }

    public function search()
    {
        if($this->query === "" && $this->category === 0)
        {
            $this->listings = Listing::orderBy('online_at', 'desc')->limit(10)->get()->toArray();
        } else if($this->query === "" && $this->category > 0)
        {
            $this->listings = Listing::where('category_id', $this->category)->orderBy('online_at', 'desc')->limit(10)->get()->toArray();
        } else if($this->query && $this->category === 0)
        {
            $this->listings = Listing::where('title', 'like', '%'.$this->query.'%')->get()->toArray();
        } else
        {
            $this->listings = Listing::where('title', 'like', '%'.$this->query.'%')->where('category_id', $this->category)->get()->toArray();
        }
    }

    public function render()
    {
        return view('livewire.listing-results');
    }
}