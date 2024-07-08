@extends('front.layouts.app')

@section('main')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('account.profile')}}">Accueil</a></li>
                        <li class="breadcrumb-item active">Tableau de bord</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                
              @include('front.admin.admin-sidebar')
                    
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-4">
                      <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                          <div class="row">
                            <div class="col">
                              <h5 class="card-title text-uppercase text-muted mb-0">Artisans</h5>
                              <span class="h2 font-weight-bold mb-0">{{$artisans->count()}}</span>
                            </div>
                            <div class="col-auto">
                              <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fa fa-users"></i>
                              </div>
                            </div>
                          </div>
                          <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-plus-circle"></i> </span>
                            <span class="text-nowrap"><a href="{{route('admin.artisans')}}">Voir détails</a></span>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                          <div class="row">
                            <div class="col">
                              <h5 class="card-title text-uppercase text-muted mb-0">Clients</h5>
                              <span class="h2 font-weight-bold mb-0">{{$clients->count()}}</span>
                            </div>
                            <div class="col-auto">
                              <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fa fa-users"></i>
                              </div>
                            </div>
                          </div>
                          <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-plus-circle"></i> </span>
                            <span class="text-nowrap"><a href="{{route('admin.clients')}}">Voir détails</a></span>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                          <div class="row">
                            <div class="col">
                              <h5 class="card-title text-uppercase text-muted mb-0">Métiers </h5>
                              <span class="h2 font-weight-bold mb-0">{{$metiers->count()}}</span>
                            </div>
                            <div class="col-auto">
                              <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                <i class="fa fa-users"></i>
                              </div>
                            </div>
                          </div>
                          <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-plus-circle"></i> </span>
                            <span class="text-nowrap"><a href="{{route('admin.metiers')}}">Voir détails</a></span>
                          </p>
                        </div>
                      </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
</section>



@endsection