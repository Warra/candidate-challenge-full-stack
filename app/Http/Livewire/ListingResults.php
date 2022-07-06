<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Listing;
use Carbon\Carbon;
use Livewire\Component;

class ListingResults extends Component
{
    protected $listeners = ['query-updated' => 'queryUpdated', 'category-selected' => 'categoryUpdated'];

    public $query;

    public $listings;

    public $category;

    public $selectedCategory;

    public $date;

    public function mount()
    {
        $this->date = Carbon::now();
        $this->query = '';
        $this->category = 0;
        $this->listings = $this->getQuery()->limit(10)->get()->toArray();
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

    public function getQuery()
    {
        return Listing::where('online_at', '<', $this->date)
            ->whereNull('offline_at')
            ->when($this->category > 0, function ($query) {
                $query->where('category_id', $this->category);
            })
            ->when($this->query !== '', function ($query) {
                $query->where('title', 'like', '%'.$this->query.'%');
            })
            ->orderBy('online_at', 'desc');
    }

    public function search()
    {
        usleep(0.5 * 1000000); //Added this to show loading state

        $this->listings = $this->getQuery()
            ->limit(10)
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.listing-results');
    }
}
