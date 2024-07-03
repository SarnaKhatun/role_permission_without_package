<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::insert([
           ['name' => 'User', 'email'=>'user@gmail.com', 'password' => bcrypt('12345678')],
           ['name' => 'Editor', 'email'=>'editor@gmail.com', 'password' => bcrypt('12345678')],
           ['name' => 'Author', 'email'=>'author@gmail.com', 'password' => bcrypt('12345678')],
        ]);

        Role::insert([
           ['name' => 'Editor', 'slug' => 'editor'],
           ['name' => 'Author', 'slug' => 'author'],
        ]);

        Permission::insert([
           ['name' => 'Add Post', 'slug'=>'add-post'],
           ['name' => 'Delete Post', 'slug'=>'delete-post'],
        ]);
    }
}
