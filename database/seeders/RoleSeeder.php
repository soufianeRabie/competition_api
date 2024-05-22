<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $utilisateurCentral = Role::create(['name' => UserRoleEnum::UTILISATEUR_CENTRAL->value]);
        $utilisateurRégional = Role::create(['name' => UserRoleEnum::RÉGIONAL->value]);
        $entreprise = Role::create(['name' => UserRoleEnum::ENTREPRISE->value]);
        $utilisateurLocal = Role::create(['name' => UserRoleEnum::UTILISATEUR_LOCAL->value]);
        $intervenant = Role::create(['name' => UserRoleEnum::INTERVENANT->value]);
    }
}
