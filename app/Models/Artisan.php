<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class Artisan extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function metier()
    {
        return $this->belongsTo(Metier::class);
    }

    public function getPaginatedCraftsmenByCriteriaSearch(?string $category,
                                                          ?string $city,
                                                          ?string $town,
                                                          int     $numberPerPage,
                                                          ?String   $longitude,
                                                          ?String   $latitude,
                                                          ?string $distance
    ): LengthAwarePaginator
    {
        $localisation = "";
        if($latitude != null && $longitude != null){
            $localisation = ",(6371 * acos(cos(radians('$latitude'))
                    * cos(radians(artisans.latitude)) * cos(radians(artisans.longitude) -
                        radians('$longitude')) + sin(radians('$latitude')) *
                        sin(radians(artisans.latitude)))) as distance";
        }

        $queryBuilder = DB::table('artisans')
            ->join('users', 'users.id', '=', 'artisans.user_id')
            ->join('metiers', 'metiers.id', '=', 'artisans.metier_id')
            ->select(
                DB::raw(
                    "artisans.id artisans_id,
                    users.nom user_nom,
                    users.prenom user_prenom,
                    metiers.metier,
                    artisans.ville,
                    artisans.quartier,
                    artisans.telephone $localisation"
                )
            );

        if($category != null){
            $queryBuilder
                ->where("metiers.id", "=", $category);
        }
        if($city != null){
            $queryBuilder
                ->where("artisans.ville", "like", "%".$city."%");
        }
        if($town != null){
            $queryBuilder
                ->where("artisans.quartier", "like", "%".$town."%");
        }

        if($latitude != null && $longitude != null){
            $queryBuilder
                ->having('distance','<', 0);
        }


        return $queryBuilder
            ->paginate($numberPerPage);

    }

    public function getCraftsmenCities(){
        return DB::table('artisans')
            ->select(DB::raw('DISTINCT artisans.ville'))
            ->get();
    }

    public function getCraftsmensQuartier(){
        return DB::table('artisans')
            ->select(DB::raw('DISTINCT artisans.quartier'))
            ->get();
    }
}
