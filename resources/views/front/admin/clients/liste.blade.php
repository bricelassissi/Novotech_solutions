@extends('front.layouts.app')

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
                                    <tr>
                                        <td class="text-center">{{ $counter }}</td>
                                        <td class="text-capitalize">{{$client->nom}} {{$client->prenom}}</td>
                                        <td class="text-center">{{dateFormat($client->created_at)}}</td>
                                        <td class="text-center">
                                            <a  data-id="{{$client->id}}" data-nom="{{$client->nom}}" data-prenom="{{$client->prenom}}"  style="color: blueviolet"  class="view-btn" data-toggle="modal" data-target="#editModal"><i class="fa fa-eye"></i></a>
                                            /<a  onclick="deleteClient({{ $client->id }})" href="javascript:void(0);" style="color: red"  > <i class="fa fa-trash" aria-hidden="true"></i> </a>
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
</script>
    
@endsection