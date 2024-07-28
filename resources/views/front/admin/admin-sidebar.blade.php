@php

    function dateFormat($date_creation) {
        return !is_null($date_creation) ?  date('d/m/Y H:i', strtotime($date_creation)) :  'Null';  

    }
  
@endphp

@section('customCss')
<style>
    .active-link {
        color: red; /* ou toute autre couleur que vous préférez */
        font-weight: bold; /* optionnel : rendre le lien en gras */
    }
    
</style>
@endsection

<div class="card border-0 shadow mb-4 p-3">
    <div class="s-body text-center mt-3">
            <img src="{{ asset('assets/images/logo.png') }}" alt="avatar"  style="border: 1px solid #c2c2c2">

        <h5 class="text-muted mb-1 fs-6">Administrateur</h5>
        {{-- <div class="d-flex justify-content-center mb-2">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Changer Photo de Profil</button>
        </div> --}}
    </div>
</div>

<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{route('admin.artisans')}}" class="{{ Request::is('admin/artisans') ? 'active-link' : '' }}">Artisans</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{route('admin.clients')}}" class="{{ Request::is('admin/clients') ? 'active-link' : '' }}">Clients</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{route('admin.metiers')}}" class="{{ Request::is('admin/metiers') ? 'active-link' : '' }}">Métiers</a>
            </li>
            {{-- <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{route('admin.publicites')}}" class="{{ Request::is('admin/publicite') ? 'active-link' : '' }}">Packs publicitaire</a>
            </li>                                                      --}}
        </ul>
    </div>
</div>