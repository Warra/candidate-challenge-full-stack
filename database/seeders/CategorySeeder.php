<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $knownCategories = [
            'Furniture',
            'Electronics',
            'Cars',
            'Property'
        ];

        $categories = Category::all()->toArray();

        if(count($categories) === 0) {
            foreach($knownCategories as $cat) {
                $category = new Category();
                $category->name = $cat;
                $category->save();
            }
        } else {
            $mapped = Arr::map($categories, function ($value, $key) {
                return $value['name'];
            });

            foreach($mapped as $item) {
                if(!in_array($item, $knownCategories)) {
                    $category = new Category();
                    $category->name = $item;
                    $category->save();
                }
            }
        }
    }
}
