<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ContactSection;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Listing;
use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRoutes()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        Auth::login($user);

        $listing = Listing::factory()->create();


        $this->get(route('home'))->assertSuccessful();
        $this->get('/listings/furniture\/'.$listing->uuid)->assertSuccessful();
        $this->get('/listings/create')->assertSuccessful();
    }
}
