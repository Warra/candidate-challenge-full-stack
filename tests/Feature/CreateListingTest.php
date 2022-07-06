<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateListingSection;
use App\Models\Category;
use App\Models\Listing;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Livewire;
use Tests\TestCase;

class CreateListingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateListing()
    {
        $this->actingAs(User::factory()->create());

        $category = new Category();
        $category->name = 'Furniture';
        $category->save();

        Livewire::test(CreateListingSection::class)
            ->set('title', 'new listing')
            ->set('description', 'new description for listing')
            ->set('amount', '2000')
            ->set('categories', Category::all()->toArray())
            ->set('categorySelected', 1)
            ->set('onlineAt', Carbon::now())
            ->set('email', 'test@test.com')
            ->set('mobile', '0822222222')
            ->call('createListing');

        $this->assertTrue(Listing::where('title', 'new listing')->exists());
    }

    public function testCreateListingValidationRequired()
    {
        $this->actingAs(User::factory()->create());

        $category = new Category();
        $category->name = 'Furniture';
        $category->save();

        $listing = Listing::factory()->create();

        Livewire::test(CreateListingSection::class)
            ->set('title', '')
            ->set('description', '')
            ->set('amount', '')
            ->set('categories', Category::all()->toArray())
            ->set('categorySelected', '')
            ->set('email', '')
            ->set('mobile', '')
            ->call('createListing')
            ->assertHasErrors(['title' => 'required'])
            ->assertHasErrors(['description' => 'required'])
            ->assertHasErrors(['amount' => 'required'])
            ->assertHasErrors(['email' => 'required'])
            ->assertHasErrors(['mobile' => 'required']);
    }

    public function testSaveContactValidationRules()
    {
        $this->actingAs(User::factory()->create());

        $category = new Category();
        $category->name = 'Furniture';
        $category->save();

        Listing::factory()->create([
            'title' => 'test',
            'category_id' => 1,
        ]);

        $listing = Listing::factory()->create();

        Livewire::test(CreateListingSection::class)
            ->set('title', 'test')
            ->set('description', 'test')
            ->set('amount', 'asd')
            ->set('categories', Category::all()->toArray())
            ->set('email', 'test')
            ->set('mobile', 'test')
            ->call('createListing')
            ->assertHasErrors(['title' => 'unique:listings'])
            ->assertHasErrors(['amount' => 'numeric'])
            ->assertHasErrors(['email' => 'email'])
            ->assertHasErrors(['mobile' => 'numeric']);
    }
}
