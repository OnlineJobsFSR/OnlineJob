<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating roles for admin
        $admin = new Role();
        $admin->name = 'admin';
        $admin->save();

        //creating roles for author
        $author = new Role();
        $author->name = 'author';
        $author->save();

        //creating roles for subscriber
        $subscriber = new Role();
        $subscriber->name = 'subscriber';
        $subscriber->save();
    }
}
