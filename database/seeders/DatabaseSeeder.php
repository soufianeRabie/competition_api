<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRoleEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        \App\Models\User::factory(10)->create();
//
//        // \App\Models\User::factory()->create([
//        //     'name' => 'Test User',
//        //     'email' => 'test@example.com',
//        // ]);



        $utilisateurCentral = Role::create([  'name' => UserRoleEnum::UTILISATEUR_CENTRAL->value,
    'guard_name' => 'intern'
]);

$utilisateurRégional = Role::create([
    'name' => UserRoleEnum::UTILISATEUR_RÉGIONAL->value,
    'guard_name' => 'intern'
]);

$entreprise = Role::create([
    'name' => UserRoleEnum::ENTREPRISE->value,
    'guard_name' => 'extern'
]);

$utilisateurLocal = Role::create([
    'name' => UserRoleEnum::UTILISATEUR_LOCAL->value,
    'guard_name' => 'intern'
]);

$intervenant = Role::create([
    'name' => UserRoleEnum::INTERVENANT->value,
    'guard_name' => 'intern'
]);



    }
}
