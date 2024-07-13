<?php

namespace App\Http\Controllers;

use App\Services\ISearchArtisansService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchArtisanController extends Controller
{
    private ISearchArtisansService $artisansService;

    public function __construct(ISearchArtisansService $artisansService){
        $this->artisansService = $artisansService;
    }

    public function search(Request $request) {
        $craftsmen = $this->getCraftmanByParams($request);

        $metiers = $this->artisansService->getMetiersAvailable();
        return view(
            'front.find-artisans-by-criteria',
            compact(
                'craftsmen',
                'metiers'
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

        if ($request->has("categorie")) {
            $category = $request->input("categorie");
        }
        if ($request->has("ville")) {
            $city = $request->input("ville");
        }
        if ($request->has("commune")) {
            $town = $request->input("commune");
        }

        return $this->artisansService
            ->getCraftsmanByCriteria(
                $category,
                $city,
                $town,
                9
            );
    }
}

