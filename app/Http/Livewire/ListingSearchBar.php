<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListingSearchBar extends Component
{
    public $query;

    public function mount()
    {
        $this->query = '';
    }

    public function updatedQuery()
    {
        $this->emit('query-updated', $this->query);
    }

    public function render()
    {
        return view('livewire.listing-search-bar');
    }
}
