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
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('account.profile')}}">Accueil</a></li>
                        <li class="breadcrumb-item active">clients</li>
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
                        <h3 class="card-title">Liste des clients</h3>
                        <div class="card-tools">
                            {{-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addclientModal"> <i class="fa fa-plus-circle"></i> Ajouter métier  </button> --}}
                            {{-- <button class="btn btn-success" onclick="openAjouterclientModal()"> <i class="fa fa-plus-circle"></i> Ajouter métier  </button> --}}
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="clientTable" class="display" style="width:100%">
                            <thead>
                                <tr style="font-size: 12px;">
                                    <th style="width:5%; text-align: center;">N°</th>
                                    <th style="width:45%">Nom & Prénom(s)</th>
                                    <th style="width:25%; text-align: center;">Date d'inscription</th>
                                    <th style="width:30%; text-align: center;">Action(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1;  @endphp
                                @foreach ($clients as $client)
                                    <tr
                                    data-nom-client="{{$client->nom}}"
                                    data-prenom-client="{{$client->prenom}}"
                                    data-email-client="{{$client->email}}"
                                    
                                    >
                                        <td class="text-center view-client-btn pointer">{{ $counter }}</td>
                                        <td class="text-capitalize view-client-btn pointer">{{$client->nom}} {{$client->prenom}}</td>
                                        <td class="text-center view-client-btn pointer">{{dateFormat($client->created_at)}}</td>
                                        <td class="text-center">
                                            <a  onclick="deleteClient({{ $client->id }})" href="javascript:void(0);" style="color: red"  > <i class="fa fa-trash" aria-hidden="true"></i> </a>
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


  <!-- View Modal -->

  <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Informations Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                

              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Informations Client
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="row">
                        <div class="col-md-12">
                          <p><strong>Nom:</strong> <span id="modalNomClient"></span></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <p><strong>Prenom:</strong> <span id="modalPrenomClient"></span></p>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <p><strong>Email:</strong> <span id="modalEmailClient"></span></p>
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
        $('#clientTable').DataTable({
            language: {
                url: '../assets/DataTableFrench.json'
            }
        });
    })


    $('.view-client-btn').on('click', function() {

        
        
            var nomClient = $(this).data('nom-client');
            var prenomClient = $(this).data('prenom-client');
            var emailClient = $(this).data('email-client');


            $('#modalNomClient').text(nomClient);
            $('#modalPrenomClient').text(prenomClient);
            $('#modalEmailClient').text(emailClient);

            // Afficher le modal
            $('#editModal').modal('show');
        });

        function deleteClient(id) {
        if (confirm("Etes-vous sûr que vous voulez supprimer?")) {
            $.ajax({
                url: '{{ route("admin.destroyClient") }}',
                type: 'delete',
                data: { id: id},
                dataType: 'json',
                success: function(response) {
                    window.location.href = '{{route("admin.clients")}}';
                }
            });
        }
    }





</script>
    
@endsection