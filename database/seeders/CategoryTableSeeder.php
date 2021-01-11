<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating roles for admin
        $it = new Category();
        $it->name = 'IT';
        $it->slug = 'it';
        $it->save();

        //creating roles for author
        $school = new Category();
        $school->name = 'SCHOOL';
        $school->slug = 'school';
        $school->save();

        //creating roles for subscriber
        $driver = new Category();
        $driver->name = 'DRIVER';
        $driver->slug = 'driver';
        $driver->save();
    }
}
