@extends('front.layouts.app')

@section('customCss')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
        }
    </style>
@endsection


@section('main')
<section class="section-4 bg-2">    
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <!-- <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="jobs.html"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Jobs</a></li>
                    </ol>
                </nav> -->
            </div>
        </div> 
    </div>
    
    <div class="container job_details_area">
           @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{Session::get('success')}}</p>
                </div>
            @endif
        <div class="row pb-5">
            {{-- @if (Auth::check())
                
            @endif --}}
            @if (Auth::check() && Auth::user()->type == 'Artisan')
            <div class="col-md-12">
                @else
            <div class="col-md-8">
                
            @endif
                <div class="card shadow border-0">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                             

                                  
                                
                                <div class="jobs_conetent">
                                        <h4>{{$artisan->user->nom}} {{$artisan->user->prenom}} - {{$artisan->metier->metier }}</h4>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{$artisan->ville}}, {{$artisan->quartier}}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{$artisan->plage_horaire}} - ({{$artisan->jour_travaille}})</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Description</h4>
                            <p style="text-align: justify">{{$artisan->description}}  </p>                     
                         </div>
                    </div>
                </div>
                <div class="card shadow border-0 mt-3">
                    <div class="job_details_header">
                        
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Coordonnées</h4>
                            <div class="location">
                                <p> <i class="fa fa-map-marker"></i> {{$artisan->ville}}, {{$artisan->quartier}}</p>
                            </div>
                            <div class="location">
                                <p> <i class="fa fa-clock-o"></i> {{$artisan->plage_horaire}} - ({{$artisan->jour_travaille}})</p>
                            </div>                        
                            <div class="phone">
                                <p> <i class="fa fa-phone"></i><a href="tel:{{$artisan->telephone}}"> {{$artisan->telephone}} </a> </p>
                                @if ($artisan->telephone_whatsapp)
                                <p> <i class="fa fa-whatsapp"></i> <a href="https://wa.me/{{$artisan->telephone_whatsapp}}" target="_blank"> {{$artisan->telephone_whatsapp}} </a></p>
                                    
                                @endif
                            </div>                        
                        </div>
                        <div id="map"></div>
                        {{-- <div>
                            <img src="assets/images/map-abidjan.png" alt="">
                        </div> --}}
                    </div>
                    </div>
                </div>
            </div>
            {{-- @if (Auth::user()->type == 'Client') --}}
            <div class="col-md-4">
                    
                <div class="card shadow border-0">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h4 class="h6">Demande de devis à <b>{{$artisan->user->nom}} {{$artisan->user->prenom}}</b> </h4>
                        </div>
                        <div class="job_content pt-3">
                            @if (Auth::check() && Auth::user()->type == 'Client')
                            <form name="demandeDevisForm" id="demandeDevisForm">
                                <div class="row mb-3">
                                    {{-- {{$artisan->user_id}} --}}
                                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="metier_id" id="metier_id" value="{{$artisan->metier_id}}">
                                    <input type="hidden" name="artisan_id" id="artisan_id" value="{{$artisan->user_id}}">
                                    <div class="col-md-12">
                                        <input class="form-control" type="tel" name="numero_telephone" id="numero_telephone" placeholder="Numéro de Téléphone *">
                                        <p></p>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="objet" id="objet" placeholder="Objet *">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="message" id="message" rows="10" placeholder="Votre message *"></textarea>
                                        <p></p>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Envoyer la demande</button>
                            </form>
                            @else
                                <a href="{{route('account.login')}}" class="btn btn-danger">Connectez-vous pour envoyer un message à votre artisan</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
                {{-- @endif --}}
                
        </div>
    </div>
</section>


    
@endsection

@section('customJs')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>

    // Les coordonnées (latitude et longitude)
    // var latitude = 5.422865;  
    // var longitude = -4.014825;  

    var latitude = {{ $artisan->latitude }};
    var longitude = {{ $artisan->longitude }};

    // alert(latitude,longitude)

    // Initialiser la carte
    var map = L.map('map').setView([latitude, longitude], 13);

    // Ajouter une couche de carte (par exemple, OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Ajouter un marqueur aux coordonnées spécifiées
    var marker = L.marker([latitude, longitude]).addTo(map)
        // .bindPopup('Ici, c\'est Paris!')
        .openPopup();
</script>

<script>
    
    var artisanId = {{ $artisan->user_id }};
    
    // alert(artisanId);


    $("#demandeDevisForm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("demande.devis") }}',
                type: 'post',
                data: $("#demandeDevisForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if(errors.numero_telephone) {
                            $("#numero_telephone").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.numero_telephone)
                        } else {
                            $("#numero_telephone").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.objet) {
                            $("#objet").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.objet)
                        } else {
                            $("#objet").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }

                        if(errors.message) {
                            $("#message").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.message)
                        } else {
                            $("#message").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                    } else {
                            $("#numero_telephone").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")

                            $("#objet").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")

                            $("#message").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                                
                                window.location.href = '{{ url("artisan/detail") }}/' + artisanId;
                        
                    }
                }

                
            });

        });

        // $('.edit-btn').on('click', function() {
        //     $("#editModal input[name='metier_id']").val( $(this).data('id') );
        //     $("#editModal input[name='metier']").val( $(this).data('metier') );
        //     $("#editModal textarea[name='description_metier']").val( $(this).data('description_metier') );

        //     $("#edit_metier").removeClass('is-invalid')
        //             .siblings('p')
        //             .removeClass('invalid-feedback')
        //             .html("")

        //     // Afficher le modal
        //     $('#editModal').modal('show');
        // });

        //Soumission du formulaire de modification

        // $("#modifierMetierForm").submit(function(e) {
        //     e.preventDefault();
        //     $.ajax({
        //         url: '{{ route("admin.editMetiers") }}',
        //         type: 'put',
        //         data: $("#modifierMetierForm").serializeArray(),
        //         dataType: 'json',
        //         success: function(response) {
        //             if (response.status == false) {
        //                 var errors = response.errors;
        //                 if(errors.metier) {
        //                     $("#edit_metier").addClass('is-invalid')
        //                     .siblings('p')
        //                     .addClass('invalid-feedback')
        //                     .html(errors.metier)
        //                 } else {
        //                     $("#edit_metier").removeClass('is-invalid')
        //                     .siblings('p')
        //                     .removeClass('invalid-feedback')
        //                     .html("")
        //                 }
        //             } else {
        //                     $("#edit_metier").removeClass('is-invalid')
        //                         .siblings('p')
        //                         .removeClass('invalid-feedback')
        //                         .html("")

        //                 window.location.href='{{route("admin.metiers")}}';

        //                     }
        //             }

                
        //     });

        // });


        // supprimer metier

    //     function deleteMetier(id) {
    //     if (confirm("Etes-vous sûr que vous voulez supprimer?")) {
    //         $.ajax({
    //             url: '{{ route("admin.destroyMetiers") }}',
    //             type: 'delete',
    //             data: { id: id},
    //             dataType: 'json',
    //             success: function(response) {
    //                 window.location.href = '{{route("admin.metiers")}}';
    //             }
    //         });
    //     }
    // }

</script>

@endsection


