<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listing;
use App\Models\Category;
use Carbon\Carbon;

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
        $this->listings = Listing::where('online_at', '<', $this->date)->whereNull('offline_at')->orderBy('online_at', 'desc')->limit(10)->get()->toArray();
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
        sleep(1); //Added this to show loading state
        if($this->query === "" && $this->category === 0)
        {
            $this->listings = Listing::where('online_at', '<', $this->date)->whereNull('offline_at')->orderBy('online_at', 'desc')->limit(10)->get()->toArray();
        } else if($this->query === "" && $this->category > 0)
        {
            $this->listings = Listing::where('category_id', $this->category)->whereNull('offline_at')->where('online_at', '<', $this->date)->orderBy('online_at', 'desc')->limit(10)->get()->toArray();
        } else if($this->query && $this->category === 0)
        {
            $this->listings = Listing::where('title', 'like', '%'.$this->query.'%')->whereNull('offline_at')->where('online_at', '<', $this->date)->get()->toArray();
        } else
        {
            $this->listings = Listing::where('title', 'like', '%'.$this->query.'%')->whereNull('offline_at')->where('online_at', '<', $this->date)->where('category_id', $this->category)->get()->toArray();
        }
    }

    public function render()
    {
        return view('livewire.listing-results');
    }
}