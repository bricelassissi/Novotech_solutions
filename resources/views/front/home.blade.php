@extends('front.layouts.app')

@section('main')


{{-- Debut page d'accueil --}}



<section class="section-0 lazy d-flex bg-image-style dark align-items-center "   class="" data-bg="assets/images/banner-artisan-2.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Plateforme des artisans</h1>
                <p>Entreprise 72</p>
            </div>
        </div>

        <section class="section-1 py-5 animate wow slideInRight"> 
            <div class="container">
                <div class="card border-0 shadow p-5">
                    <div class="row">
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <select name="metier" id="metier" class="form-control">
                                <option value="">Selectionner un Métier</option>
                                @if ($metiers->isNotEmpty())
                                    @foreach ($metiers as $metier)
                                    <option value="{{ $metier->id }}">{{ $metier->metier }}</option>  
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Ville">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Commune">
                        </div>
                        
                        
                        <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                            <div class="d-grid gap-2">
                                <a href="artisan-detail.html" class="btn btn-primary btn-block">Rechercher</a>
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
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="artisan-detail.html"><h4 class="pb-2">menusierie</h4></a>
                    <p class="mb-0"> <span>50</span> artisans enregistrés</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="artisan-detail.html"><h4 class="pb-2">Maçonnerie</h4></a>
                    <p class="mb-0"> <span>50</span> artisans enregistrés</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="artisan-detail.html"><h4 class="pb-2">Mecanique</h4></a>
                    <p class="mb-0"> <span>50</span> artisans enregistrés</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="artisan-detail.html"><h4 class="pb-2">Couture</h4></a>
                    <p class="mb-0"> <span>50</span> artisans enregistrés</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="artisan-detail.html"><h4 class="pb-2">Restauration</h4></a>
                    <p class="mb-0"> <span>50</span> artisans enregistrés</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="artisan-detail.html"><h4 class="pb-2">Maintenance</h4></a>
                    <p class="mb-0"> <span>50</span> artisans enregistrés</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="artisan-detail.html"><h4 class="pb-2">Froid</h4></a>
                    <p class="mb-0"> <span>50</span> artisans enregistrés</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="artisan-detail.html"><h4 class="pb-2">Pressing</h4></a>
                    <p class="mb-0"> <span>50</span> artisans enregistrés</p>
                </div>
            </div>
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
                        @if ($artisans->isNotEmpty())
                            @foreach ($artisans as $artisan)
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{$artisan->user->nom}} {{$artisan->user->prenom}}</h3>
                                            <p>{{$artisan->metier->metier}}</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{$artisan->ville}}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map"></i></span>
                                                    <span class="ps-1">{{$artisan->quartier}}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-phone"></i></span>
                                                    <span class="ps-1">00225 - {{$artisan->telephone}}</span>
                                                </p>
                                            </div>

                                            <div class="d-grid mt-3">
                                                <a href="{{ route('artisan.details',$artisan->id) }}" class="btn btn-primary btn-lg">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                                                 
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
                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <img  class="rounded-circle"  src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">Informaticien</h3>
                                    <p>We are in need of a Web Developer for our company.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <img  class="rounded-circle"  src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">Informaticien</h3>
                                    <p>We are in need of a Web Developer for our company.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <img  class="rounded-circle"  src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">Informaticien</h3>
                                    <p>We are in need of a Web Developer for our company.</p>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                                                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






{{-- Fin page d'accueil --}}




    
@endsection