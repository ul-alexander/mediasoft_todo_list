<?php

use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            "name" => "Заблокировать пользователя",
            "guard_name" => "web",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        Permission::create([
            "name" => "Редактировать пользователя",
            "guard_name" => "web",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        Permission::create([
            "name" => "Удалить чек лист",
            "guard_name" => "web",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        Permission::create([
            "name" => "Создать чек лист",
            "guard_name" => "web",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        Permission::create([
            "name" => "Добавить задачу",
            "guard_name" => "web",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        Permission::create([
            "name" => "Удалить задачу",
            "guard_name" => "web",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        Permission::create([
            "name" => "Сменить статус задачи",
            "guard_name" => "web",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
