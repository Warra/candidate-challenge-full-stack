<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Listing;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->vehicle,
            'slug' => '/listings/cars/'.Str::uuid(),
            'online_at' => Carbon::now()->toDateTimeString(),
            'offline_at' => Carbon::now()->toDateTimeString(),
            'amount' => $faker->randomNumber(1000000),
            'currency' => 'ZAR',
            'mobile' => $faker->mobileNumber,
            'email' => $faker->email,
            'category_id' => 3,
        ]
    }
}
