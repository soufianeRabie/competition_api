<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRoleEnum;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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



//        DB::table('etablissements')->insert([
//            [
//                'users_id' => 1,
//                'regions_id' => 1,
//                'nom_efp' => 'Etablissement A',
//                'adresse' => '123 Rue Principale',
//                'tel' => '0123456789',
//                'ville' => 'Ville A',
//                'status' => 'Actif',
//                'updated_at' => now(),
//                'created_at' => now(),
//            ],
//            [
//                'users_id' => 2,
//                'regions_id' => 2,
//                'nom_efp' => 'Etablissement B',
//                'adresse' => '456 Avenue Secondaire',
//                'tel' => '0987654321',
//                'ville' => 'Ville B',
//                'status' => 'Inactif',
//                'updated_at' => now(),
//                'created_at' => now(),
//            ],
//            // Ajoutez autant de lignes que nécessaire
//        ]);


//        $now = Carbon::now();
//
//        DB::table('themes')->insert([
//            [
//                'domaines_id' => 1,
//                'intitule_theme' => 'Theme 1',
//                'duree_formation' => 10,
//                'status' => 1,
//                'created_at' => $now,
//                'updated_at' => $now,
//            ],
//            [
//                'domaines_id' => 2,
//                'intitule_theme' => 'Theme 2',
//                'duree_formation' => 15,
//                'status' => 1,
//                'created_at' => $now,
//                'updated_at' => $now,
//            ],
//            // Add more seed data as needed
//        ]);

        $now = Carbon::now();
//
        DB::table('actions')->insert([
            [
                'exercice' => 2023,
                'entreprises_id' => 5,
                'themes_id' => 1,
                'Intervenants_id' => 1,
                'etablissements_id' => 47,
                'date_debut_prev' => $now->subDays(10),
                'date_fin_prev' => $now->subDays(5),
                'prix_reel' => 1500.00,
                'date_fin_real' => $now->subDays(4),
                'date_debut_real' => $now->subDays(10),
                'nbparticipants' => 30,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'exercice' => 2023,
                'entreprises_id' => 6,
                'themes_id' => 2,
                'Intervenants_id' => 2,
                'etablissements_id' => 46,
                'date_debut_prev' => $now->subDays(20),
                'date_fin_prev' => $now->subDays(15),
                'prix_reel' => 2000.00,
                'date_fin_real' => $now->subDays(14),
                'date_debut_real' => $now->subDays(20),
                'nbparticipants' => 25,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            // Add more seed data as needed
        ]);


//        $now = Carbon::now();
//
//        DB::table('entreprises')->insert([
//            [
//                'users_id' => 4,
//                'raison' => 'Example Company 1',
//                'email' => 'company1@example.com',
//                'site' => 'http://www.company1.com',
//                'logo' => 'company1_logo.png',
//                'status' => 1,
//                'created_at' => $now,
//                'representant' => 'John Doe',
//                'telephone1' => '123-456-7890',
//                'telephone2' => '456-789-0123',
//                'telephone3' => '789-012-3456',
//            ],
//            [
//                'users_id' => 5,
//                'raison' => 'Example Company 2',
//                'email' => 'company2@example.com',
//                'site' => 'http://www.company2.com',
//                'logo' => 'company2_logo.png',
//                'status' => 1,
//                'created_at' => $now,
//                'representant' => 'Jane Smith',
//                'telephone1' => '987-654-3210',
//                'telephone2' => '654-321-0987',
//                'telephone3' => '321-098-7654',
//            ],
//            // Add more seed data as needed
//        ]);

    }
}
