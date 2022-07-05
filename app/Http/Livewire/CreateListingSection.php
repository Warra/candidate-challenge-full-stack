<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listing;
use App\Models\Category;
use Illuminate\Support\{Str, Arr};
use Carbon\Carbon;

class CreateListingSection extends Component
{
    public $title;
    public $description;
    public $descriptionCount;
    public $categories;
    public $categorySelected;
    public $amount;
    public $mobile;
    public $email;

    protected $rules = [
        'email' => 'required|email',
        'mobile' => 'required|numeric|digits:10',
        'message' => 'required|max:300',
    ];

    public function mount()
    {
        $this->categories = Category::all()->toArray();
        $this->categorySelected = 0;
        $this->descriptionCount = 800;
    }

    public function updatedDescription()
    {
        $this->descriptionCount = 800 - strlen($this->description);
    }

    public function createListing()
    {
        $this->validate();

        $selectedCategory = Arr::first($this->categories, function ($value, $key) {
            return $value['id'] = $this->categorySelected;
        });

        $uuid = Str::uuid();

        $listing = new Listing();
        $listing['uuid'] = $uuid;
        $listing['title'] = $this->title;
        $listing['description'] = $this->description;
        $listing['slug'] = '\/listings\/'.$category.'\/'.$uuid;
        $listing['online_at'] = Carbon::now()->toDateTimeString();
        $listing['offline_at'] = null;
        $listing['amount'] = $this->amount;
        $listing['currency'] = 'ZAR';
        $listing['email'] = $this->email;
        $listing['mobile'] = $this->mobile;
        $listing['category_id'] = $selectedCategory['id'];
        
        $listing->save();
    }

    public function render()
    {
        return view('livewire.create-listing-section');
    }
}
