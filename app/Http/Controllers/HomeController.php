<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use App\Services\IHomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private IHomeService $homeService;

    function __construct(IHomeService $homeService){
        $this->homeService = $homeService;
    }

    public function index() {
        $countCraftsmanByJob = $this->homeService->getCountCraftsmanByJob();
        $someCraftsman = $this->homeService->getSomeCraftsman();
        $someClients = $this->homeService->getRandom3Client();
        $metiers = $this->homeService->getMetiersAvailable();
        return view(
            'front.home',
            compact(
                'countCraftsmanByJob',
                'someCraftsman',
                'someClients',
                'metiers'
            )
        );
    }
}
