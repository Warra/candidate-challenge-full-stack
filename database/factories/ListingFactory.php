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

        $furniture = [
            '2 seat Green velvet sofa',
            'Memphis Grey 3 piece corner couch suite',
            'Blue Medium Fatsak',
            'Red Large Fatsak',
            'Ottoman small',
            'Ottoman big',
            '50 year old wooden coffee table',
            'Oak Sage coffee table',
            'Standing desk',
            'Book shelf',
            'Italian designed wingback leisure chair',
            'Laurence corner couch fossil',
            'Esme lounge 5 seater sofa',
            'Beach house chest of drawers',
            'Titan pedestal',
            'Savannah double headboard',
            'Oslo Black Pedestal',
            'Jordan Artic Oak Dresser',
            'Intec Desk 120x60',
            'Bastion 1.4m desk'
        ];

        $electronics = [
            'Sony A7 mirrorless Camera',
            'Fujifilm X-T4',
            'Canon Powershot SX70 HS',
            'Olympus Tough TG-6',
            'Canon EOS R6',
            'Panasonic Lumix GH4 Camera',
            'Ipad Pro 11 inch 128GB',
            'LG OLED c1 TV',
            'Samsung QN90A TV',
            'Hisense U8G TV',
            'IPhone X 128GB',
            'IPhone 13 Pro 256GB',
            'Macbook Pro 2015 edition',
            'Macbook Air 2019 edition',
            'Samsung Galaxy A20',
            'LG 27" Gaming monitor 144hz',
            'Rdio surround sound speakers',
            'Sony headphones',
            'Nvidia RTX 3080',
            'Gaming mouse'
        ];

        $property = [
            '1 Bedroom Apartment in Rondebosch',
            '5 Bedroom House in Pinelands',
            '3 Bedroom House in Durbanville',
            'Studio apartment in Stellenbosch',
            '1 Bedroom Apartment in Seapoint',
            '3 Bedroom House in Gardens',
            '3 Bedroom Town House in Blouberg',
            '4 Bedroom House in Harfield Village',
            '5 Bedroom House in Hout Bay',
            'Bachelor apartment in Rosebank',
            '515sqm plot in Grabouw',
            '4 Bedroom apartment in Belville',
            '2 Bedroom Apartment in Claremont',
            'Granny Flat in Stellenbosch',
            'Big Boi Mansion in Constantia',
            '3 Bedroom house in Camps Bay',
            'Town house in security complex in Muizenburg',
            '315sqm plot in Yzerfontein',
            'Penthouse Flat in Greenpoint',
            'Gardener\'s Cottage in Tokai'
        ];

        $listingTitle;
        $listingType;

        $randomNumber = rand(1,4);
        $randomNumberTitle = rand(0, 19);

        switch ($randomNumber) {
            case 1:
                $listingTitle = $furniture[$randomNumberTitle];
                break;
            case 2:
                $listingTitle = $electronics[$randomNumberTitle];
                break;
            case 3:
                $listingTitle = $this->faker->vehicle;
                break;
            case 4:
                $listingTitle = $property[$randomNumberTitle];
                break;
        }


        return [
            'uuid' => $uuid,
            'title' => $listingTitle,
            'description' => $this->faker->paragraph,
            'slug' => '/listings/cars/'.$uuid,
            'online_at' => Carbon::now()->toDateTimeString(),
            'offline_at' => Carbon::now()->toDateTimeString(),
            'amount' => $this->faker->randomNumber(4, 8),
            'currency' => 'ZAR',
            'mobile' => $this->faker->mobileNumber,
            'email' => $this->faker->email,
            'category_id' => $randomNumber,
        ];
    }
}