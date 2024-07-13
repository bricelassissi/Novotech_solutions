@extends('front.layouts.app')

@section('main')


{{-- Debut page d'accueil --}}



<section class="section-0 lazy d-flex bg-image-style dark align-items-center "   class="" data-bg="assets/images/banner5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Plateforme des artisan</h1>
                <p>Entreprise 72</p>
            </div>
        </div>

        <section class="section-1 py-5 animate wow slideInRight">
            <div class="container">
                <div class="card border-0 shadow p-5">
                    <div class="row">
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <select name="category" id="category" class="form-control">
                                <option value="">Selectionnez une Catégorie</option>
                                @foreach($metiers as $metier)
                                    <option value={{$metier->id}}>{{$metier->metier}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="search" id="city" placeholder="Ville">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="search" id="town" placeholder="Commune">
                        </div>


                        <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                            <div class="d-grid gap-2">
                                <button id="makeSearch" class="btn btn-primary btn-block">Rechercher</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</section>



<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Catégories Populaires</h2>
        <div class="row pt-5">
            @foreach ($countCraftsmanByJob as $item)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="artisan-detail.html"><h4 class="pb-2">{{$item->metier}}</h4></a>
                        <p class="mb-0"> <span>{{$item->count_artisant}}</span> artisans enregistrés</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-3  py-5">
    <div class="container">
        <h2>Nos Artisans</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">
                        @foreach($someCraftsman as $craftsman)
                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{$craftsman->user_nom}}</h3>
                                    <p>{{$craftsman->metier}}</p>
                                    <div class="bg-light p-3 border">
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                            <span class="ps-1">{{$craftsman->ville}}</span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-map"></i></span>
                                            <span class="ps-1">{{$craftsman->quartier}}</span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-phone"></i></span>
                                            <span class="ps-1">{{$craftsman->telephone}}</span>
                                        </p>
                                    </div>
                                    <div class="d-grid mt-3">
                                        <a href="artisan-detail.html" class="btn btn-primary btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-3 bg-2 py-5">
    <div class="container">
        <h2>Clients satisfaits</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">

                        @foreach($someClients as $client)
                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <img  class="rounded-circle"  src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{$client->nom}} {{$client->prenom}}</h3>
                                    <p>We are in need of a Web Developer for our company.</p>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Fin page d'accueil --}}

<script src="{{asset('assets/js/redirectFromHomeToFIndCraftsmanWithParams.js')}}"></script>
@endsection
