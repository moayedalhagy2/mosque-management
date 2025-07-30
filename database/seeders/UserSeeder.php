<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //system admin
        User::create([
            "name" => "مسؤول النظام",
            "username" => "superadmin",
            'password' => bcrypt('12345678'), // Ensure to use a secure password
        ])->assignRole(RoleEnum::SYSTEM_ADMINISTRATOR);

        //supervisor
        User::create([
            "name" => "المشرف المركزي",
            "username" => "supervisor",
            'password' => bcrypt('12345678'), // Ensure to use a secure password
        ])->assignRole(RoleEnum::SUPERVISOR);

        //branch manager
        User::create([
            "name" => "مدير فرع حلب",
            "username" => "manager_aleppo",
            'password' => bcrypt('12345678'),
            'branch_id' => 3, // aleppo branch
        ])->assignRole(RoleEnum::BRANCH_MANAGER);

        //Field committee
        User::create([
            "name" => "لجنة حلب",
            "username" => "com_aleppo",
            'password' => bcrypt('12345678'),
            'branch_id' => 3, // aleppo branch
        ])->assignRole(RoleEnum::FIELD_COMMITTEE);


        //branch manager
        User::create([
            "name" => "مدير فرع دمشق",
            "username" => "manager_damascus",
            'password' => bcrypt('12345678'),
            'branch_id' => 1, // damascus branch
        ])->assignRole(RoleEnum::BRANCH_MANAGER);

        //Field committee
        User::create([
            "name" => "لجنة دمشق",
            "username" => "com_damascus",
            'password' => bcrypt('12345678'),
            'branch_id' => 1, // damascus branch
        ])->assignRole(RoleEnum::FIELD_COMMITTEE);
    }
}
