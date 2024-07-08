@php

    function dateFormat($date_creation) {
        return !is_null($date_creation) ?  date('d/m/Y H:i', strtotime($date_creation)) :  'Null';  

    }
  
@endphp

<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{route('admin.artisans')}}">Artisans</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{route('admin.clients')}}">Clients</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{route('admin.metiers')}}">Métiers</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{route('admin.publicites')}}">Packs publicitaire</a>
            </li>                                                     
        </ul>
    </div>
</div>