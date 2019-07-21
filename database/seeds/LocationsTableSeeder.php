<?php

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $location = new Location();
        $location->name = 'Frumbledingle Corp';
        $location->save();  

        $location = new Location();
        $location->name = 'Plupbuckle, Inc.';
        $location->save();
    }
}
