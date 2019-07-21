<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $category  = Category::where('name', 'admin')->first();    
        
        // $user = new User();
        // $user->username = 'alejandro';
        // $user->password = bcrypt('welcometotheteam');
        // $user->save();
        // $user->roles()->attach($role_user);    
        
        // $admin = new User();
        // $admin->username = 'admin';
        // $admin->password = bcrypt('admin');
        // $admin->save();
        // $admin->roles()->attach($role_admin);
        $category = new Category();
        $category->name = "Widgets";
        $category->save();

        $category_car = new Category();
        $category_car->name = "Car";
        $category_car->save();

        $category = new Category();
        $category->name = "Chevrolet";
        $category->parent()->associate($category_car);
        $category->save();
        
    }
}
