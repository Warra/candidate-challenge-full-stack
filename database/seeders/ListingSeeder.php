<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listing;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Listing::factory(50)->create();

        \App\Models\Listing::factory(30)->create([
            'online_at' => null,
        ]);
    }
}