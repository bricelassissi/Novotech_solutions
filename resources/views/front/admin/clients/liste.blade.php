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
                
                <h2>Afficher les clients inscrits ici.</h2>  
                
                <div class="container card mt-5 p-3">
                    <table id="clientTable" class="stripe" style="width:100%">
                        <thead>
                            <tr style="font-size: 12px;">
                                <th>N°</th>
                                <th>Nom & Prenom(s)</th>
                                <th>Date d'inscription</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td></td>
                                    <td>{{$client->user->nom}} {{$client->user->prenom}}</td>
                                    <td>{{dateFormat($client->created_at)}}</td>
                                    <td>
                                        <i class="fa fa-eye cursor" style="color: rgb(48, 7, 171)"></i> / 
                                        <i class="fa fa-trash cursor" style="color: red"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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