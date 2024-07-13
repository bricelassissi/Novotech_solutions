<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ISearchArtisansService {
    function getCraftsmanByCriteria(?string $category,
                                    ?String $city,
                                    ?String $town,
                                    int $numberPerPage
    ): LengthAwarePaginator;
    function getMetiersAvailable(): Collection;
}

