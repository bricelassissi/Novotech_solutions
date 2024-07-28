@php

    function dateFormat($date_creation) {
        return !is_null($date_creation) ?  date('d/m/Y H:i', strtotime($date_creation)) :  'Null';  

    }
  
@endphp

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

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Mes artisans</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="artisanTable" class="display" style="width:100%">
                            <thead>
                                <tr style="font-size: 12px;">
                                    <th style="width:3%;">N°</th>
                                    <th style="width:20%;">Date</th>
                                    <th style="width:20%">Objet</th>
                                    <th style="width:20%">Metier</th>
                                    <th style="width:25%;">Nom Artisan</th>
                                    <th style="width:15%; text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach ($artisans as $artisan)
                                    @php
                                    $infosArtisan = \App\Models\User::where('id', $artisan->artisan_id)->first();
                                    @endphp
                                
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ dateFormat($artisan->created_at) }}</td>
                                        <td>{{$artisan->objet}}</td>
                                        <td>{{$artisan->metier->metier}}</td>
                                        <td >
                                            {{$infosArtisan->nom}} {{$infosArtisan->prenom}}
                                        </td>
                                        <td>
                                            <a href="#" style="color: blue;"><i class="fa fa-eye"></i></a> /
                                            <a href="#" style="color: red;"><i class="fa fa-trash"></i></a>
                                            {{-- <a  data-id="{{$artisan->id}}" data-metier="{{$metier->metier}}" data-description_metier="{{$metier->description_metier}}" class="edit-btn btn btn-success" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></a>
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
</script>

@endsection