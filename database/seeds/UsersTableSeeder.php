<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user2 = User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user3 = User::create([
            'name' => Str::random(10),
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Role::create([
            "name" => "Администратор",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        Role::create([
            "name" => "Менеджер",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        Role::create([
            "name" => "Пользователь",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        $user1->assignRole('Администратор');
        $user2->assignRole('Менеджер');
        $user3->assignRole('Пользователь');
    }
}
