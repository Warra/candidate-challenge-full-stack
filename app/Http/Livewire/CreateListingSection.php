<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateListingSection extends Component
{
    public $title;
    public $description;
    public $category;
    public $amount;
    public $mobile;
    public $email;

    public function render()
    {
        return view('livewire.create-listing-section');
    }
}
