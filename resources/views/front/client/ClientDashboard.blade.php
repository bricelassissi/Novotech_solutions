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
                @include('front.client.client-sidebar')
            </div>
            <div class="col-lg-9">
                              
            </div>
        </div>
    </div>
</section>



@endsection