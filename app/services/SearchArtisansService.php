<?php

namespace App\Services;

use App\Models\Artisan;
use App\Models\Client;
use App\Models\Metier;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use \Illuminate\Support\Collection;

class SearchArtisansService implements ISearchArtisansService {

    private Metier $metier;
    private Artisan $artisan;

    public function __construct(Metier $metier, Artisan $artisan){
        $this->metier = $metier;
        $this->artisan = $artisan;
    }

    function getMetiersAvailable(): Collection{
        return $this->metier->getMetiers();
    }

    function getCraftsmanByCriteria(?string $category,
                                    ?string $city,
                                    ?string $town,
                                    int $numberPerPage
    ): LengthAwarePaginator
    {
        return $this->artisan->getPaginatedCraftsmenByCriteriaSearch($category, $city, $town, $numberPerPage);
    }
}

