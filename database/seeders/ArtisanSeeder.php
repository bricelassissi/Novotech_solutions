<?php

namespace Database\Seeders;

use App\Models\Artisan;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ArtisanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $villeOptions = ['ABOBO', 'ADJAME', 'ATTECOUBE', 'COCODY', 'KOUMASSI', 'MARCORY', 'PLATEAU', 'PORT BOUET', 'TREICHVILLE', 'YOPOUGON', 'ABENGOUROU', 'ABOISSO', 'ADIAKE', 'ADZOPE', 'AGBOVILLE', 'AGNIBILEKRO'];
        $posteOptions = ['Propriétaire', 'Gérant', 'Salarié'];
        $zoneOptions = ['Locale', 'Régionale', 'Nationale', 'Internationale'];
        $ancienneteOptions = ['Moins de 2 ans', '2-4 ans', '5-7 ans', '8-10 ans', 'Plus de 10 ans'];
        $plageOptions = ['6h-18h', '8h-20h', '24/24h'];
        $jourOptions = ['Lundi au Vendredi', 'Lundi au Samedi', 'Tous les jours'];
        $registreCommerce = ['Oui', 'Non'];

        $latitude = 5.345317; // Example latitude for Côte d'Ivoire
        $longitude = -4.024429; // Example longitude for Côte d'Ivoire

        $artisans = [];
        $userId = 308;

        for ($metierId = 1; $metierId <= 49; $metierId++) {
            for ($i = 0; $i < 10; $i++) {
                $artisans[] = [
                    'user_id' => $userId++,
                    'metier_id' => $metierId,
                    'ville' => $villeOptions[array_rand($villeOptions)],
                    'quartier' => 'Quartier' . rand(1, 100),
                    'poste_occupe_dans_l_entreprise' => $posteOptions[array_rand($posteOptions)],
                    'description' => $faker->realText(1000),
                    'telephone' => '07000000' . rand(0, 9),
                    'telephone_whatsapp' => rand(0, 1) ? '07000000' . rand(0, 9) : null,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'zone_couverture' => $zoneOptions[array_rand($zoneOptions)],
                    'anciennete' => $ancienneteOptions[array_rand($ancienneteOptions)],
                    'plage_horaire' => $plageOptions[array_rand($plageOptions)],
                    'jour_travaille' => $jourOptions[array_rand($jourOptions)],
                    'registre_commerce' => $registreCommerce[array_rand($registreCommerce)],
                    'numero_registre_commerce' => rand(0, 1) ? 'Numero' . rand(1000, 9999) : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        Artisan::insert($artisans);
    }
}
