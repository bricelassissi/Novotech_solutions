@extends('front.layouts.app')

@section('main')

    <section class="section-0 lazy d-flex bg-image-style dark align-items-center " class=""
             data-bg="assets/images/banner5.jpg">
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

    <section class="section-3  py-5">
        <div class="container">
            <h2>Nos Artisans</h2>
            <div class="row pt-5">
                <div class="job_listing_area">
                    <div class="job_lists">
                        <div class="row">
                            @foreach($craftsmen as $craftsman)
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
                            @if($craftsmen->count() == 0)
                               <div class="col-md-4">
                                   Aucune donnée trouvé !
                               </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around">
                    {{ $craftsmen->links() }}
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('assets/js/redirectFromHomeToFIndCraftsmanWithParams.js')}}"></script>
    <script src="{{asset('assets/js/FindPageScript.js')}}"></script>

@endsection
