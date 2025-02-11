<?php

namespace App\Providers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new \Faker\Provider\Fakecar($faker));
            $faker->addProvider(new \Faker\Provider\en_ZA\PhoneNumber($faker));

            return $faker;
        });
    }
}
