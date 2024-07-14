<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use App\Services\IHomeService;
use App\Services\ISearchArtisansService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private IHomeService $homeService;

    public function __construct(IHomeService $homeService){
        $this->homeService = $homeService;
    }

    public function index() {
        $countCraftsmanByJob = $this->homeService->getCountCraftsmanByJob();
        $someCraftsman = $this->homeService->getSomeCraftsman();
        $someClients = $this->homeService->getRandom3Client();
        $metiers = $this->homeService->getMetiersAvailable();
        $quartiers = $this->homeService->getTown();
        $cities = $this->homeService->getCities();
        return view(
            'front.home',
            compact(
                'countCraftsmanByJob',
                'someCraftsman',
                'someClients',
                'metiers',
                'quartiers',
                'cities'
            )
        );
    }
}
