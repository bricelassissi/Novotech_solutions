<?php

namespace App\Http\Controllers;

use App\Services\IHomeService;
use App\Services\ISearchArtisansService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchArtisanController extends Controller
{
    private ISearchArtisansService $artisansService;
    private IHomeService $homeService;

    public function __construct(ISearchArtisansService $artisansService, IHomeService $homeService){
        $this->artisansService = $artisansService;
        $this->homeService = $homeService;
    }

    public function search(Request $request) {
        $craftsmen = $this->getCraftmanByParams($request);
        $metiers = $this->artisansService->getMetiersAvailable();
        $quartiers = $this->homeService->getTown();
        $cities = $this->homeService->getCities();
        return view(
            'front.find-artisans-by-criteria',
            compact(
                'craftsmen',
                'metiers',
                'quartiers',
                'cities'
            )
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    private function getCraftmanByParams(Request $request): ?LengthAwarePaginator
    {
        $category = null;
        $city = null;
        $town = null;
        $longitude = null;
        $latitude = null;
        $rayon = null;

        if ($request->has("categorie")) {
            $category = $request->input("categorie");
        }
        if ($request->has("ville")) {
            $city = $request->input("ville");
        }
        if ($request->has("commune")) {
            $town = $request->input("commune");
        }
        if ($request->has("latitude")) {
            $latitude = $request->input("latitude");
        }
        if ($request->has("longitude")) {
            $longitude = $request->input("longitude");
        }
        if($request->has("rayon")){
            $rayon = $longitude = $request->input("rayon");
        }

        return $this->artisansService
            ->getCraftsmanByCriteria(
                $category,
                $city,
                $town,
                9,
                $longitude,
                $latitude,
                $request,
                $rayon
            );
    }
}

