<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IHomeService {
    function getCountCraftsmanByJob(): Collection;
    function getSomeCraftsman(): LengthAwarePaginator;
    function getRandom3Client(): Collection;
    function getMetiersAvailable(): Collection;
}

