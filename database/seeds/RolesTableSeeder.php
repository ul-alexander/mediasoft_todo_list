<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
