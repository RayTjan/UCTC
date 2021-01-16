<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use App\Models\Jaka;
use App\Models\Lecturer;
use App\Models\Role;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Title;
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

        $jaka = new Jaka();
        $jaka->name = 'Pengajar';
        $jaka->save();

        $jaka = new Jaka();
        $jaka->name = 'Asisten Ahli';
        $jaka->save();

        $jaka = new Jaka();
        $jaka->name = 'Asisten Ahli';
        $jaka->save();

        $jaka = new Jaka();
        $jaka->name = 'Lektor Kepala';
        $jaka->save();

        $jaka = new Jaka();
        $jaka->name = 'Profesor';
        $jaka->save();

        $title = new Title();
        $title->name = "Dekan";
        $title->save();

        $title = new Title();
        $title->name = "Tech support";
        $title->save();

        $title = new Title();
        $title->name = "Teacher";
        $title->save();

        $department = new Department();
        $department->initial = 'ISB';
        $department->name = 'Information System Business';
        $department->save();

        $department = new Department();
        $department->initial = 'IMT';
        $department->name = 'Information Media Technology';
        $department->save();

        $student = new Student();
        $student->nim = "0706011910001";
        $student->name = "Bob";
        $student->email = "someEmailUnused";
        $student->batch = "2020";
        $student->description = "Just a normal student";
        $student->photo = "";
        $student->gender = "F";
        $student->phone = "404";
        $student->line_account = "xoxo";
        $student->department_id = 2;
        $student->save();

        $student = new Student();
        $student->nim = "0706011910002";
        $student->name = "Jake";
        $student->email = "someEmailUnused";
        $student->batch = "2021";
        $student->description = "Just a normal student";
        $student->photo = "";
        $student->gender = "M";
        $student->phone = "403";
        $student->line_account = "x1x1";
        $student->department_id = 1;
        $student->save();

        $student = new Student();
        $student->nim = "0706011910003";
        $student->name = "jane";
        $student->email = "someEmailUnused";
        $student->batch = "2025";
        $student->description = "Just a normal student";
        $student->photo = "";
        $student->gender = "F";
        $student->phone = "404";
        $student->line_account = "xoxo";
        $student->department_id = 2;
        $student->save();

        $lecturer = new Lecturer();
        $lecturer->nip = "001";
        $lecturer->nidn = "202";
        $lecturer->name = "Sylvia";
        $lecturer->email = "someEmailUnused";
        $lecturer->description = "Just a normal student";
        $lecturer->photo = "";
        $lecturer->gender = "F";
        $lecturer->phone = "404";
        $lecturer->line_account = "xoxo";
        $lecturer->department_id = 2;
        $lecturer->title_id = 1;
        $lecturer->jaka_id = 2;
        $lecturer->save();

        $staff = new Staff();
        $staff->nip = "011";
        $staff->name = "Brolee";
        $staff->email = "someEmailUnused";
        $staff->description = "Just a normal student";
        $staff->photo = "";
        $staff->gender = "F";
        $staff->phone = "404";
        $staff->line_account = "xoxo";
        $staff->department_id = 2;
        $staff->title_id = 3;
        $staff->save();

        $role = new Role();
        $role->name = 'Coordinator';
        $role->description = 'Something';
        $role->save();

        $role = new Role();
        $role->name = "Dosen";
        $role->description = "Something";
        $role->save();

        $role = new Role();
        $role->name = "Student";
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
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('something');
        $user->role_id = 1;
        $user->identity_id = 1;
        $user->identity_type="App\Models\Lecturer";
        $user->save();

        $user = new User();
        $user->email = 'staff@gmail.com';
        $user->password = Hash::make('something');
        $user->role_id = 2;
        $user->identity_id = 1;
        $user->identity_type="App\Models\Staff";
        $user->save();

        $user = new User();
        $user->email = 'test1@gmail.com';
        $user->password = Hash::make('something');
        $user->role_id = 3;
        $user->identity_id = 1;
        $user->identity_type="App\Models\Student";
        $user->save();

        $user = new User();
        $user->email = 'test2@gmail.com';
        $user->password = Hash::make('something');
        $user->role_id = 3;
        $user->identity_id = 2;
        $user->identity_type="App\Models\Student";
        $user->save();

        $user = new User();
        $user->email = 'test3@gmail.com';
        $user->password = Hash::make('something');
        $user->role_id = 3;
        $user->identity_id = 3;
        $user->identity_type="App\Models\Student";
        $user->save();
    }
}
