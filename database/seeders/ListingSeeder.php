<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listing;
use Carbon\Carbon;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Listing::factory(50)->create([
            'offline_at' => null,
        ]);

        \App\Models\Listing::factory(30)->create([
            'online_at' => Carbon::now(),
            'offline_at' => Carbon::now(),
        ]);
    }
}