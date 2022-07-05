<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Contact;
use App\Models\Listing;
use App\Http\Livewire\ContactSection;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSaveContact()
    {
        $listing = Listing::factory()->create();
        
        Livewire::test(ContactSection::class)
            ->set('email', 'test@test.com')
            ->set('mobile', '0822222222')
            ->set('message', 'new message')
            ->call('saveContact', $listing->id);
 
        $this->assertTrue(Contact::where('email', 'test@test.com')->exists());
    }

    public function testSaveContactValidationRequired()
    {
        $listing = Listing::factory()->create();
        
        Livewire::test(ContactSection::class)
            ->set('email', '')
            ->set('mobile', '')
            ->set('message', '')
            ->call('saveContact', $listing->id)
            ->assertHasErrors(['email' => 'required'])
            ->assertHasErrors(['mobile' => 'required'])
            ->assertHasErrors(['message' => 'required']);
    }

    public function testSaveContactValidationRules()
    {
        $listing = Listing::factory()->create();
        
        Livewire::test(ContactSection::class)
            ->set('email', 'test')
            ->set('mobile', 'test')
            ->set('message', 'test')
            ->call('saveContact', $listing->id)
            ->assertHasErrors(['email' => 'email'])
            ->assertHasErrors(['mobile' => 'numeric']);

        Livewire::test(ContactSection::class)
            ->set('email', 'test@test.com')
            ->set('mobile', '0823')
            ->set('message', 'test')
            ->call('saveContact', $listing->id)
            ->assertHasErrors(['mobile' => 'digits:10']);
    }
}
