<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateListingSection extends Component
{
    public $title;

    public $description;

    public $descriptionCount;

    public $categories;

    public $categorySelected;

    public $amount;

    public $onlineAt;

    public $mobile;

    public $email;

    public $isCreated;

    protected $rules = [
        'title' => 'required|unique:listings|max:100',
        'description' => 'required|max:800',
        'categorySelected' => 'required|numeric|min:1',
        'amount' => 'required|numeric',
        'onlineAt' => 'required|date',
        'email' => 'required|email',
        'mobile' => 'required|numeric|digits:10',
    ];

    public function mount()
    {
        $this->title = '';
        $this->description = '';
        $this->amount = '';
        $this->onlineAt = now()->format('Y-m-d');
        $this->email = '';
        $this->mobile = '';
        $this->categories = Category::all()->toArray();
        $this->categorySelected = 0;
        $this->descriptionCount = 800;
        $this->isCreated = false;
    }

    public function updatedCategorySelected()
    {
        $this->categorySelected = (int) $this->categorySelected;
    }

    public function updatedDescription()
    {
        $this->descriptionCount = 800 - strlen($this->description);
    }

    public function createListing()
    {
        $this->validate($this->rules, [
            'categorySelected.min' => 'Please select a category for your listing.',
            'mobile.required' => 'Please enter a mobile number for your listing.',
            'onlineAt.required' => 'Please enter a date for your listing to be published',
            'onlineAt.date' => 'Please enter a valid date (YYYY-MM-DD)',
        ]);

        $selectedCategory = Arr::first($this->categories, function ($value, $key) {
            return $value['id'] = $this->categorySelected;
        });

        $uuid = Str::uuid();

        $listing = new Listing();
        $listing['uuid'] = $uuid;
        $listing['title'] = $this->title;
        $listing['description'] = $this->description;
        $listing['slug'] = '\/listings\/'.$selectedCategory['name'].'\/'.$uuid;
        $listing['online_at'] = $this->onlineAt;
        $listing['amount'] = $this->amount;
        $listing['currency'] = env('CURRENCY', 'ZAR'); //Change this per domain
        $listing['email'] = $this->email;
        $listing['mobile'] = $this->mobile;
        $listing['category_id'] = $selectedCategory['id'];

        $listing->save();

        $this->isCreated = true;
    }

    public function redirectToHome()
    {
        return redirect()->to('/');
    }

    public function closeModal()
    {
        $this->title = '';
        $this->description = '';
        $this->amount = '';
        $this->email = '';
        $this->mobile = '';
        $this->categorySelected = 0;
        $this->descriptionCount = 800;
        $this->isCreated = false;
    }

    public function render()
    {
        return view('livewire.create-listing-section');
    }
}
