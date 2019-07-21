<?php

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;
use App\Models\Location;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $item = new Item();
        $location = Location::where('name', 'Frumbledingle Corp')->first();
        $category = Category::where('name', 'Chevrolet')->first();
        $item->name = "Item 1";
        $item->price = 50000;
        $item->location()->associate($location);
        $item->category()->associate($category);
        $item->save();

        $item = new Item();
        $location = Location::where('name', 'Plupbuckle, Inc.')->first();
        $category = Category::where('name', 'Widgets')->first();
        $item->name = "Item 2";
        $item->price = 23000;
        $item->location()->associate($location);
        $item->category()->associate($category);
        $item->save();
        // $category->parent()->associate($category_car);
    }
}
