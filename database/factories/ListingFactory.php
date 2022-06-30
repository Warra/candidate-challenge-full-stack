<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
        $uuid = Str::uuid();

        return [
            'uuid' => $uuid,
            'title' => $this->faker->vehicle,
            'description' => $this->faker->paragraph,
            'slug' => '/listings/cars/'.$uuid,
            'online_at' => Carbon::now()->toDateTimeString(),
            'offline_at' => Carbon::now()->toDateTimeString(),
            'amount' => $this->faker->randomNumber(4, 8),
            'currency' => 'ZAR',
            'mobile' => $this->faker->mobileNumber,
            'email' => $this->faker->email,
            'category_id' => 3,
        ];
    }
}