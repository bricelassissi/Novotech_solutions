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
                                                          int     $numberPerPage
    ): LengthAwarePaginator
    {

        $queryBuilder = DB::table('artisans')
            ->join('users', 'users.id', '=', 'artisans.user_id')
            ->join('metiers', 'metiers.id', '=', 'artisans.metier_id')
            ->select(
                DB::raw(
                    'artisans.id artisans_id,
                    users.nom user_nom,
                    users.prenom user_prenom,
                    metiers.metier,
                    artisans.ville,
                    artisans.quartier,
                    artisans.telephone'
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

        return $queryBuilder
            ->paginate($numberPerPage);

    }
}
