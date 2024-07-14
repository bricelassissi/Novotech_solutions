<?php

namespace App\Services;

use App\Models\Artisan;
use App\Models\Client;
use App\Models\Metier;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use \Illuminate\Support\Collection;

class HomeService implements IHomeService{

    private Metier $metier;
    private Artisan $artisan;
    private User $user;

    public function __construct(Metier $metier, Artisan $artisan, User $user){
        $this->metier = $metier;
        $this->artisan = $artisan;
        $this->user = $user;
    }
    public function getCountCraftsmanByJob(): Collection{
        return $this->metier->getCountCraftsmanByJob();
    }
    public function getSomeCraftsman(): LengthAwarePaginator {
        return $this->artisan->getPaginatedCraftsmenByCriteriaSearch(null, null, null, 9, null, null);
    }
    public function getRandom3Client(): Collection {
        return $this->user->getCountCraftsmanByJob();
    }

    function getMetiersAvailable(): Collection {
        return $this->metier->getMetiers();
    }

    function getCities(): Collection {
        return $this->artisan->getCraftsmenCities();
    }

    function getTown(): Collection {
        return $this->artisan->getCraftsmensQuartier();
    }
}

