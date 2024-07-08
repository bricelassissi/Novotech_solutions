@extends('front.layouts.app')

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
                        <li class="breadcrumb-item active">metiers</li>
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
                        <h3 class="card-title">Liste des métiers</h3>
                        <div class="card-tools">
                            {{-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMetierModal"> <i class="fa fa-plus-circle"></i> Ajouter métier  </button> --}}
                            <button class="btn btn-success" onclick="openAjouterMetierModal()"> <i class="fa fa-plus-circle"></i> Ajouter métier  </button>
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="metierTable" class="display" style="width:100%">
                            <thead>
                                <tr style="font-size: 12px;">
                                    <th style="width:5%; text-align: center;">N°</th>
                                    <th style="width:50%">Metier</th>
                                    <th style="width:10%; text-align: center;">Artisan(s)</th>
                                    <th style="width:25%; text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach ($metiers as $metier)
                                    <tr>
                                        <td style="text-align: center;">{{ $counter }}</td>
                                        <td>{{$metier->metier}}</td>
                                        <td style="text-align: center;"><span class="badge bg-info">{{$metier->artisans->count()}}</span></td>
                                        <td style="text-align: center;">
                                            <a  data-id="{{$metier->id}}" data-metier="{{$metier->metier}}" data-description_metier="{{$metier->description_metier}}" class="edit-btn btn btn-success" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></a>
                                            /<a  onclick="deleteMetier({{ $metier->id }})" href="javascript:void(0);"  > <i class="fa fa-trash  btn btn-danger" aria-hidden="true"></i> </a>
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
  <div class="modal fade" id="addMetierModal" tabindex="-1" aria-labelledby="addMetierModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addMetierModalLabel">Ajouter métier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form name="ajoutMetierForm" id="ajoutMetierForm">
        <div class="modal-body">
            
            <div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Nom métier : <span class="req">*</span> </label>
                                    <input type="text" class="form-control" name="metier" id="metier" placeholder="Entrez Nom métier">
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Description du métier :</label>
                                    <textarea name="description_metier" class="form-control textarea" id="description_metier" rows="3"></textarea>
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


  <!-- Edit Modal -->

  <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Modification Métier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{-- <p class="italic text-center"><small>Les étiquettes de champs marquées d'un * sont des champs de saisie obligatoires.</small></p> --}}
               <form name="modifierMetierForm" id="modifierMetierForm">
                <div class="row">
                    <input type="hidden" name="metier_id" />
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Nom métier : <span class="req">*</span> </label>
                                    <input type="text" class="form-control" name="metier" id="edit_metier">
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Description du métier :</label>
                                    <textarea name="description_metier" class="form-control textarea" id="edit_description" rows="3"></textarea>
                            <p></p>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-warning">Modifier</button>
                  </div>
            </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('customJs')

<script>
    $(document).ready(function() {
        $('#metierTable').DataTable({
            language: {
                url: '../assets/DataTableFrench.json'
            }
        });
    });

    function openAjouterMetierModal() {
        $("#metier").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html("");

        $("#addMetierModal input[name='metier']").val('');
        $("#addMetierModal textarea[name='description_metier']").val('');
        $('#addMetierModal').modal('show');
    }



    $("#ajoutMetierForm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("admin.createMetiers") }}',
                type: 'post',
                data: $("#ajoutMetierForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if(errors.metier) {
                            $("#metier").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.metier)
                        } else {
                            $("#metier").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                    } else {
                            $("#metier").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")

                        window.location.href='{{route("admin.metiers")}}';

                            }
                    }

                
            });

        });

        $('.edit-btn').on('click', function() {
            $("#editModal input[name='metier_id']").val( $(this).data('id') );
            $("#editModal input[name='metier']").val( $(this).data('metier') );
            $("#editModal textarea[name='description_metier']").val( $(this).data('description_metier') );

            $("#edit_metier").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html("")

            // Afficher le modal
            $('#editModal').modal('show');
        });

        //Soumission du formulaire de modification

        $("#modifierMetierForm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("admin.editMetiers") }}',
                type: 'put',
                data: $("#modifierMetierForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if(errors.metier) {
                            $("#edit_metier").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.metier)
                        } else {
                            $("#edit_metier").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                    } else {
                            $("#edit_metier").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")

                        window.location.href='{{route("admin.metiers")}}';

                            }
                    }

                
            });

        });


        // supprimer metier

        function deleteMetier(id) {
        if (confirm("Etes-vous sûr que vous voulez supprimer?")) {
            $.ajax({
                url: '{{ route("admin.destroyMetiers") }}',
                type: 'delete',
                data: { id: id},
                dataType: 'json',
                success: function(response) {
                    window.location.href = '{{route("admin.metiers")}}';
                }
            });
        }
    }

</script>
    
@endsection