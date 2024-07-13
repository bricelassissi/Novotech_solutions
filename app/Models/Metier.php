<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Metier extends Model
{
    use HasFactory;

    public function artisans()
    {
        return $this->hasMany(Artisan::class);
    }

    public function getCountCraftsmanByJob(){
        return DB::table('metiers')
            ->join('artisans', 'artisans.metier_id', '=', 'metiers.id')
            ->select('metiers.metier', DB::raw('count(artisans.id) as count_artisant'))
            ->orderBy("count_artisant", "desc")
            ->limit(8)
            ->groupBy("metiers.metier")
            ->get();
    }

    public function getMetiers(){
        return DB::table('metiers')
            ->select(DB::raw('metiers.id, metiers.metier'))
            ->get();
    }
}
