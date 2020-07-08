<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole      = Role::where('name', 'admin')->first();
        $authorRole     = Role::where('name', 'author')->first();
        $userRole       = Role::where('name', 'user')->first();
        $disabledRole   = Role::where('name', 'disabled')->first();

        $admin = User::create([
            'name'      => 'Admin_User',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('password')
        ]);
        $author = User::create([
            'name'      => 'Author_User',
            'email'     => 'author@author.com',
            'password'  => Hash::make('password')
        ]);
        $user = User::create([
            'name'      => 'Generic_User',
            'email'     => 'user@user.com',
            'password'  => Hash::make('password')
        ]);
        $user2 = User::create([
            'name'      => 'Generic_User2',
            'email'     => 'user2@user2.com',
            'password'  => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
        $user2->roles()->attach($disabledRole);
    }
}
