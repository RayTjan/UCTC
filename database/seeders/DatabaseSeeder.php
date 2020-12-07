<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'Admin';
        $role->description = 'Something';
        $role->save();

        $role = new Role();
        $role->name = "Staff";
        $role->description = "Something";
        $role->save();

        $role = new Role();
        $role->name = "User";
        $role->description = "Something";
        $role->save();

        $category = new Category();
        $category->name = 'Long-term';
        $category->save();
        $category = new Category();
        $category->name = 'Short-term';
        $category->save();

        $type = new Type();
        $type->name = 'Workshop';
        $type->save();
        $type = new Type();
        $type->name = 'Schooling';
        $type->save();
        $type = new Type();
        $type->name = 'Program Request';
        $type->save();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('something');
        $user->role_id = 1;
        $user->save();
        $user = new User();
        $user->name = 'Staff';
        $user->email = 'staff@gmail.com';
        $user->password = Hash::make('something');
        $user->role_id = 2;
        $user->save();
        $user = new User();
        $user->name = 'User';
        $user->email = 'test1@gmail.com';
        $user->password = Hash::make('something');
        $user->role_id = 3;
        $user->save();
        $user = new User();
        $user->name = 'User';
        $user->email = 'test2@gmail.com';
        $user->password = Hash::make('something');
        $user->role_id = 3;
        $user->save();
        $user = new User();
        $user->name = 'User';
        $user->email = 'test3@gmail.com';
        $user->password = Hash::make('something');
        $user->role_id = 3;
        $user->save();
    }
}
