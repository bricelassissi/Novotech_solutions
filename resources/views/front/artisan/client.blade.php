@php

    function dateFormat($date_creation) {
        return !is_null($date_creation) ?  date('d/m/Y H:i', strtotime($date_creation)) :  'Null';  

    }
  
@endphp

@extends('front.layouts.app')

@section('customCss')
    <style>
        .red-dot {
            display: inline-flex;
            
            width: 7px; /* Taille du point */
            height: 7px; /* Taille du point */
            background-color: red; /* Couleur rouge */
            border-radius: 50%; /* Forme ronde */
        }
        .clickable-row {
            cursor: pointer;
        }
        .active-link {
        color: red; /* ou toute autre couleur que vous préférez */
        font-weight: bold; /* optionnel : rendre le lien en gras */
    }
    </style>
@endsection

@section('main')


<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('account.profile')}}">Accueil</a></li>
                        <li class="breadcrumb-item active">Clients</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.artisan.artisan-sidebar')
            </div>
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Liste des clients qui vous ont contacté</h3>
                        <div class="card-tools">
                            {{-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMetierModal"> <i class="fa fa-plus-circle"></i> Ajouter métier  </button> --}}
                            {{-- <button class="btn btn-success" onclick="openAjouterMetierModal()"> <i class="fa fa-plus-circle"></i> Ajouter métier  </button> --}}
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="clientTable" class="display" style="width:100%">
                            <thead>
                                <tr style="font-size: 12px;">
                                    <th style="width:3%;">N°</th>
                                    <th style="width:20%;">Date</th>
                                    <th style="width:20%">Objet</th>
                                    <th style="width:25%;">Nom Client</th>
                                    <th style="width:15%; text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach ($clients as $client)
                                    @php
                                    $infosClient = \App\Models\User::where('id', $client->user_id)->first();
                                    @endphp

                                    {!! $client->read 
                                    ?
                                     '<tr 
                                     class="clickable-row"
                                     data-id="'.$client->id.'"
                                    data-nom-client="'.$infosClient->nom.'"
                                    data-prenom-client="'.$infosClient->prenom.'"
                                    data-email-client="'.$infosClient->email.'"
                                    data-objet="'.$client->objet.'"
                                    data-message="'.$client->message.'"
                                     >' 
                                        : 
                                     '<tr 
                                        class="clickable-row" 
                                        style="font-weight: 600;" 
                                        data-id="'.$client->id.'"
                                        data-nom-client="'.$infosClient->nom.'"
                                        data-prenom-client="'.$infosClient->prenom.'"
                                        data-email-client="'.$infosClient->email.'"
                                        data-objet="'.$client->objet.'"
                                        data-message="'.$client->message.'"
                                     >' 
                                    !!}
                                
                                    
                                        <td>{{ $counter }}</td>
                                        <td>{{ dateFormat($client->created_at) }}</td>
                                        <td>
                                            {{-- {{$client->read == false ? "<span style='color: red'>.</span>" : 'true'}}  --}}
                                            {!! $client->read ? '' : "<div class='red-dot'></div>" !!}
                                            {{$client->objet}}
                                            {{-- {!! $client->read ? 'true' : "<span style='color: red;font-size: 124px;'>.</span>" !!} --}}
                                        </td>
                                        <td >
                                            {{$infosClient->nom}} {{$infosClient->prenom}}
                                        </td>
                                        <td>
                                            {{-- <a data-nom-client="{{$client->nom}}" data-prenom-client="{{$client->prenom}}" data-objet="{{$client->objet}}" data-message="{{$client->message}}" data-toggle="modal" class="view-btn" style="color: blue"><i class="fa fa-eye"></i></a> / --}}
                                            <a href="#" style="color: red"><i class="fa fa-trash deleteMessage"></i></a>
                                            {{-- <a  data-id="{{$client->id}}" data-metier="{{$metier->metier}}" data-description_metier="{{$metier->description_metier}}" class="edit-btn btn btn-success" data-toggle="modal" data-target="#viewModal"><i class="fa fa-pencil"></i></a>
                                            /<a  onclick="deleteMetier({{ $metier->id }})" href="javascript:void(0);"  > <i class="fa fa-trash  btn btn-danger" aria-hidden="true"></i> </a> --}}
                                            {{-- <a class="dropdown-item" onclick="deleteJob({{ $job->id }})" href="javascript:void(0);"  ><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> --}}
                                            {{-- <form action="">
                                                <a type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="fa fa-trash"></i> </a>
                                            </form> --}}
                                        </td>
                                    </tr>
                                    @php $counter++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>


{{-- Voir modal --}}


<div id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Informations Artisan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{-- <p class="italic text-center"><small>Les étiquettes de champs marquées d'un * sont des champs de saisie obligatoires.</small></p> --}}
                
               
              <!-- Ajouter des éléments pour afficher les informations -->
              <p><strong>Nom:</strong> <span id="modalNomClient"></span></p>
              <p><strong>Prénom:</strong> <span id="modalPrenomClient"></span></p>
              <p><strong>Email:</strong> <span id="modalEmailClient"></span></p>
              <p><strong>Objet:</strong> <span id="modalObjet"></span></p>
              <p><strong>Message:</strong> <span id="modalMessage"></span></p>

              







                <div class="modal-footer">
                    <button type="button" id="closeModalBtn" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    {{-- <button type="submit" class="btn btn-warning">Modifier</button> --}}
                  </div>
            </div>
        </div>
    </div>
</div>







@endsection

@section('customJs')

<script>
    $(document).ready(function() {
    $('#clientTable').DataTable({
        language: {
            url: '../assets/DataTableFrench.json'
        }
    });
});




$(document).on('click', '.clickable-row', function() {
    
    var messageId = $(this).data('id');
    var nomClient = $(this).data('nom-client');
    var prenomClient = $(this).data('prenom-client');
    var emailClient = $(this).data('email-client');
    var objet = $(this).data('objet');
    var message = $(this).data('message');
    
    // alert(clientId);
    // alert(nomClient);
    // alert(prenomClient);
    // alert(objet);
    // alert(emailClient);

        $.ajax({
                url: '{{ route("artisan.makeMessageAsRead") }}',
                type: 'put',
                data: {
                message_id: messageId,
                _token: '{{ csrf_token() }}' // Inclure le token CSRF
                },
                success: function(response) {

                    // Mettre à jour le contenu du modal avec les données récupérées
                $('#modalNomClient').text(nomClient);
                $('#modalPrenomClient').text(prenomClient);
                $('#modalEmailClient').text(emailClient);
                $('#modalObjet').text(objet);
                $('#modalMessage').text(message);
                    
                },
                error: function() {
                    alert('Erreur lors de la requête AJAX.');
                }
                
            });
    
        $('#viewModal').modal('show');

});

$(document).ready(function() {
    // Gestionnaire d'événement pour le clic sur le bouton de fermeture du modal
    $('#closeModalBtn').on('click', function() {
        // Recharge la page
        window.location.href = '{{ url()->current() }}';
    });
});

$(document).ready(function() {
    // Gestionnaire d'événement pour le clic sur le bouton de fermeture du modal
    $('.deleteMessage').on('click', function() {
        // Recharge la page
        alert('delete')
    });
});



// $("#viewModal p[id='nom']").val( $(this).data('nom-client') );
// $("#viewModal input[name='prenom-client']").val( $(this).data('prenom-client') );
// $("#viewModal textarea[name='message']").val( $(this).data('message') );

// var nomClient = $(this).data('nom-client');
// $("#viewModal p[id='nom']").text(nomClient);













</script>

@endsection