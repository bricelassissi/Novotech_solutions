<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


interface ISearchArtisansService {
    function getCraftsmanByCriteria(?string $category,
                                    ?String $city,
                                    ?String $town,
                                    int $numberPerPage,
                                    ?string $longitude,
                                    ?string $latitude,
                                    Request $request,
                                    ?string $distance
    ): LengthAwarePaginator;
    function getMetiersAvailable(): Collection;
}

