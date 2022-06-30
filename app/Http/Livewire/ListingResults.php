<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listing;

class ListingResults extends Component
{
    protected $listeners = ['query-updated' => 'searchListings'];

    public $query;
    public $listings;

    public function mount()
    {
        $this->query = '';
        $this->listings = [];
    }

    public function searchListings($query)
    {
        $this->query = $query;
        $this->listings = Listing::where('title', 'like', '%'.$this->query.'%')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.listing-results');
    }
}
