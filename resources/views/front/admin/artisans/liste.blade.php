@extends('front.layouts.app')

@section('customCss')
    <style>
      .pointer{
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
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        @endif
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('account.profile')}}">Accueil</a></li>
                        <li class="breadcrumb-item active">artisans</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                
                @include('front.admin.admin-sidebar')
            </div>
            <div class="col-lg-9">
                
                 
                
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Liste des artisans</h3>
                        <div class="card-tools">
                            {{-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addartisanModal"> <i class="fa fa-plus-circle"></i> Ajouter métier  </button> --}}
                            {{-- <button class="btn btn-success" onclick="openAjouterartisanModal()"> <i class="fa fa-plus-circle"></i> Ajouter métier  </button> --}}
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="artisanTable" class="display" style="width:100%">
                            <thead>
                                <tr style="font-size: 12px;">
                                    <th style="width:5%; text-align: center;">N°</th>
                                    <th style="width:45%">Nom & Prénom(s)</th>
                                    <th style="width:10%; text-align: center;">Métier</th>
                                    <th style="width:25%; text-align: center;">Date d'inscription</th>
                                    <th style="width:30%; text-align: center;">Action(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1;  @endphp
                                @foreach ($artisans as $artisan)
                                    <tr 
                                      class="view-btn pointer"
                                      data-nom-artisan="{{$artisan->user->nom}}"
                                      data-prenom-artisan="{{$artisan->user->prenom}}"
                                      data-email-artisan="{{$artisan->user->email}}"
                                      data-metier-artisan="{{$artisan->metier->metier}}"
                                      data-ville-artisan="{{$artisan->ville}}"
                                      data-quartier-artisan="{{$artisan->quartier}}"
                                      data-poste_occupe_dans_l_entreprise-artisan="{{$artisan->poste_occupe_dans_l_entreprise}}"
                                      data-description-artisan="{{$artisan->description}}"
                                      data-telephone-artisan="{{$artisan->telephone}}"
                                      data-telephone_whatsapp-artisan="{{$artisan->telephone_whatsapp}}"
                                      data-latitude-artisan="{{$artisan->latitude}}"
                                      data-longitude-artisan="{{$artisan->longitude}}"
                                      data-zone_couverture-artisan="{{$artisan->zone_couverture}}"
                                      data-anciennete-artisan="{{$artisan->anciennete}}"
                                      data-plage_horaire-artisan="{{$artisan->plage_horaire}}"
                                      data-jour_travaille-artisan="{{$artisan->jour_travaille}}"
                                      data-registre_commerce-artisan="{{$artisan->registre_commerce}}"
                                      data-numero_registre_commerce-artisan="{{$artisan->numero_registre_commerce}}"
                                      {{-- data-metier-artisan="{{$artisan->metier}}" --}}
                                    >
                                        <td class="text-center">{{ $counter }}</td>
                                        <td class="text-capitalize">{{$artisan->user->nom}} {{$artisan->user->prenom}}</td>
                                        <td class="text-center">{{$artisan->metier->metier}}</td>
                                        <td class="text-center">{{dateFormat($artisan->created_at)}}</td>
                                        <td class="text-center">
                                            {{-- <a  data-id="{{$artisan->id}}" data-artisan="{{$artisan->artisan}}" data-description_artisan="{{$artisan->description_artisan}}" style="color: blueviolet"  class="view-btn pointer" data-toggle="modal" data-target="#editModal"><i class="fa fa-eye"></i></a> --}}
                                            <a  onclick="deleteArtisan({{ $artisan->id }})" href="javascript:void(0);" style="color: red"  > <i class="fa fa-trash" aria-hidden="true"></i> </a>
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




  
  <!-- Create Modal -->
  <div class="modal fade" id="addartisanModal" tabindex="-1" aria-labelledby="addartisanModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addartisanModalLabel">Ajouter métier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form name="ajoutartisanForm" id="ajoutartisanForm">
        <div class="modal-body">
            
            <div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Nom métier : <span class="req">*</span> </label>
                                    <input type="text" class="form-control" name="artisan" id="artisan" placeholder="Entrez Nom métier">
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Description du métier :</label>
                                    <textarea name="description_artisan" class="form-control" id="description_artisan" rows="3"></textarea>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  <!-- View Modal -->

  <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Informations Artisan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{-- <p class="italic text-center"><small>Les étiquettes de champs marquées d'un * sont des champs de saisie obligatoires.</small></p> --}}
                

              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Informations Artisans
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="row">
                        <div class="col-md-6">
                          <p><strong>Nom:</strong> <span id="modalNomArtisan"></span></p>
                        </div>
                        <div class="col-md-6">
                          <p><strong>Prenom:</strong> <span id="modalPrenomArtisan"></span></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <p><strong>Email:</strong> <span id="modalEmailArtisan"></span></p>
                        </div>
                        <div class="col-md-6">
                          <p><strong>Metier:</strong> <span id="modalMetierArtisan"></span></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <p><strong>Ville:</strong> <span id="modalVilleArtisan"></span></p>
                        </div>
                        <div class="col-md-6">
                          <p><strong>Quartier:</strong> <span id="modalQuartierArtisan"></span></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <p><strong>Numéro de téléphone:</strong> <span id="modalTelephoneArtisanArtisan"></span></p>
                        </div>
                        <div class="col-md-6">
                          <p><strong>Numéro WhatsApp:</strong> <span id="modalTelephone_whatsappArtisanArtisan"></span></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <p><strong>Latitude:</strong> <span id="modalLatitudeArtisanArtisan"></span></p>
                        </div>
                        <div class="col-md-6">
                          <p><strong>Longitude:</strong> <span id="modalLongitudeArtisanArtisan"></span></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <p><strong>Couverture:</strong> <span id="modalZone_couvertureArtisanArtisan"></span></p>
                        </div>
                        <div class="col-md-6">
                          <p><strong>Ancienneté:</strong> <span id="modalAncienneteArtisanArtisan"></span></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <p><strong>Plage horaire:</strong> <span id="modalPlage_horaireArtisanArtisan"></span></p>
                        </div>
                        <div class="col-md-6">
                          <p><strong>Jours de travaille:</strong> <span id="modalJour_travailleArtisanArtisan"></span></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <p><strong>Registre de commerce:</strong> <span id="modalRegistre_commerceArtisanArtisan"></span></p>
                        </div>
                        <div class="col-md-6">
                          <p><strong>Numéro Registre de commerce:</strong> <span id="modalNumero_registre_commerceArtisanArtisan"></span></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <p style="text-align: justify"><strong>Description:</strong> <span id="modalDescriptionArtisanArtisan"></span></p>
                        </div>

                    </div>
                  </div>
                </div>
              </div>








                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
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
        $('#artisanTable').DataTable({
            language: {
                url: '../assets/DataTableFrench.json'
            }
        });
    });

    function openAjouterartisanModal() {
        $("#artisan").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html("");

        $("#addartisanModal input[name='artisan']").val('');
        $("#addartisanModal textarea[name='description_artisan']").val('');
        $('#addartisanModal').modal('show');
    }



    // $("#ajoutartisanForm").submit(function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             url: '{{ route("admin.createMetiers") }}',
    //             type: 'post',
    //             data: $("#ajoutartisanForm").serializeArray(),
    //             dataType: 'json',
    //             success: function(response) {
    //                 if (response.status == false) {
    //                     var errors = response.errors;
    //                     if(errors.artisan) {
    //                         $("#artisan").addClass('is-invalid')
    //                         .siblings('p')
    //                         .addClass('invalid-feedback')
    //                         .html(errors.artisan)
    //                     } else {
    //                         $("#artisan").removeClass('is-invalid')
    //                         .siblings('p')
    //                         .removeClass('invalid-feedback')
    //                         .html("")
    //                     }
    //                 } else {
    //                         $("#artisan").removeClass('is-invalid')
    //                             .siblings('p')
    //                             .removeClass('invalid-feedback')
    //                             .html("")

    //                     window.location.href='{{route("admin.artisans")}}';

    //                         }
    //                 }

                
    //         });

    //     });

        $('.view-btn').on('click', function() {
            // $("#editModal input[name='artisan_id']").val( $(this).data('id') );
            // $("#editModal input[name='artisan']").val( $(this).data('artisan') );
            // $("#editModal textarea[name='description_artisan']").val( $(this).data('description_artisan') );

            // $("#edit_artisan").removeClass('is-invalid')
            //         .siblings('p')
            //         .removeClass('invalid-feedback')
            //         .html("")

            var nomArtisan = $(this).data('nom-artisan');
            var prenomArtisan = $(this).data('prenom-artisan');
            var emailArtisan = $(this).data('email-artisan');
            var metierArtisan = $(this).data('metier-artisan');
            var villeArtisan = $(this).data('ville-artisan');
            var quartierArtisan = $(this).data('quartier-artisan');
            var poste_occupe_dans_l_entrepriseArtisan = $(this).data('poste_occupe_dans_l_entreprise-artisan');
            var descriptionArtisan = $(this).data('description-artisan');
            var telephoneArtisan = $(this).data('telephone-artisan');
            var telephone_whatsappArtisan = $(this).data('telephone_whatsapp-artisan');
            var latitudeArtisan = $(this).data('latitude-artisan');
            var longitudeArtisan = $(this).data('longitude-artisan');
            var zone_couvertureArtisan = $(this).data('zone_couverture-artisan');
            var ancienneteArtisan = $(this).data('anciennete-artisan');
            var plage_horaireArtisan = $(this).data('plage_horaire-artisan');
            var jour_travailleArtisan = $(this).data('jour_travaille-artisan');
            var registre_commerceArtisan = $(this).data('registre_commerce-artisan');
            var numero_registre_commerceArtisan = $(this).data('numero_registre_commerce-artisan');


            $('#modalNomArtisan').text(nomArtisan);
            $('#modalPrenomArtisan').text(prenomArtisan);
            $('#modalEmailArtisan').text(emailArtisan);
            $('#modalMetierArtisan').text(metierArtisan);
            $('#modalVilleArtisanArtisan').text(villeArtisan);
            $('#modalQuartierArtisanArtisan').text(quartierArtisan);
            $('#modalPoste_occupe_dans_l_entrepriseArtisanArtisan').text(poste_occupe_dans_l_entrepriseArtisan);
            $('#modalDescriptionArtisanArtisan').text(descriptionArtisan);
            $('#modalTelephoneArtisanArtisan').text(telephoneArtisan);
            $('#modalTelephone_whatsappArtisanArtisan').text(telephone_whatsappArtisan);
            $('#modalLatitudeArtisanArtisan').text(latitudeArtisan);
            $('#modalLongitudeArtisanArtisan').text(longitudeArtisan);
            $('#modalZone_couvertureArtisanArtisan').text(zone_couvertureArtisan);
            $('#modalAncienneteArtisanArtisan').text(ancienneteArtisan);
            $('#modalPlage_horaireArtisanArtisan').text(plage_horaireArtisan);
            $('#modalJour_travailleArtisanArtisan').text(jour_travailleArtisan);
            $('#modalRegistre_commerceArtisanArtisan').text(registre_commerceArtisan);
            $('#modalNumero_registre_commerceArtisanArtisan').text(numero_registre_commerceArtisan);

            // Afficher le modal
            $('#editModal').modal('show');
        });

        //Soumission du formulaire de modification

        // $("#modifierartisanForm").submit(function(e) {
        //     e.preventDefault();
        //     $.ajax({
        //         url: '{{ route("admin.editMetiers") }}',
        //         type: 'put',
        //         data: $("#modifierartisanForm").serializeArray(),
        //         dataType: 'json',
        //         success: function(response) {
        //             if (response.status == false) {
        //                 var errors = response.errors;
        //                 if(errors.artisan) {
        //                     $("#edit_artisan").addClass('is-invalid')
        //                     .siblings('p')
        //                     .addClass('invalid-feedback')
        //                     .html(errors.artisan)
        //                 } else {
        //                     $("#edit_artisan").removeClass('is-invalid')
        //                     .siblings('p')
        //                     .removeClass('invalid-feedback')
        //                     .html("")
        //                 }
        //             } else {
        //                     $("#edit_artisan").removeClass('is-invalid')
        //                         .siblings('p')
        //                         .removeClass('invalid-feedback')
        //                         .html("")

        //                 window.location.href='{{route("admin.artisans")}}';

        //                     }
        //             }

                
        //     });

        // });


        // supprimer artisan

        function deleteArtisan(id) {
        if (confirm("Etes-vous sûr que vous voulez supprimer?")) {
            $.ajax({
                url: '{{ route("admin.destroyArtisan") }}',
                type: 'delete',
                data: { id: id},
                dataType: 'json',
                success: function(response) {
                    window.location.href = '{{route("admin.artisans")}}';
                }
            });
        }
    }

</script>
    
@endsection