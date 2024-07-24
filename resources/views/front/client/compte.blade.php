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

                <form action="" name="updateClientProfileForm" id="updateClientProfileForm">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body  p-4">

                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                <p>{{Session::get('error')}}</p>
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{Session::get('success')}}</p>
                            </div>
                        @endif


                        <h3 class="fs-4 mb-1">Mon profil</h3>
                        <input type="hidden" name="user_id" value="{{$user->id}}">
    
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Nom :<span class="req">*</span></label>
                                <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" value="{{$user->nom}}" />
                                <p></p>
                            </div>
                            <div class="col-md-6">
                                <label for="">Prénom :<span class="req">*</span></label>
                                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Nom" value="{{$user->prenom}}" />
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <label for="">Email :<span class="req">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{$user->email}}"  />
                            <p></p>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Mettre à jour les informations</button>
                    </div>
                    </form>
                </div>
                



                <form action="" name="updatePasswordForm" id="updatePasswordForm">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body p-4">
                            <h3 class="fs-4 mb-1">Changer Mot de passe</h3>
                            <div class="mt-3">
                                <label for="">Ancien Mot de passe*</label>
                                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Ancien mot de passe" />
                                <p></p>
                            </div>
                            <div class="mt-3">
                                <label for="">Nouveau Mot de passe*</label>
                                <input type="password" name="password" id="password" placeholder="Nouveau Password" class="form-control">
                                <p></p>
                            </div>
                            <div class="mt-3">
                                <label for="">Confirmer Password*</label>
                                <input type="password" name="confirmation_password" id="confirmation_password" class="form-control" placeholder="Confirmation mot de passe" />
                                <p></p>
                            </div>                        
                        </div>
                        <div class="card-footer  p-4">
                            <button type="submit" class="btn btn-primary">Mettre à jour le mot de passe</button>
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</section>



@endsection


@section('customJs')
    <script>
        $("#updateClientProfileForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("account.updateClient") }}',
                type: 'put',
                data: $("#updateClientProfileForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if(errors.nom) {
                            // alert('erreur')
                            $("#nom").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.nom)
                        } else {
                            $("#nom").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.prenom) {
                            // alert('erreur')
                            $("#prenom").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.prenom)
                        } else {
                            $("#prenom").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.email) {
                            // alert('erreur')
                            $("#email").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.email)
                        } else {
                            $("#email").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        

                        


                    } else {
                            $("#user_id").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#nom").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#prenom").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#email").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            

                        window.location.href='{{route("client.compte")}}';

                            }
                    }

                
            })

        });


        $("#updatePasswordForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("account.updatePassword") }}',
                type: 'put',
                data: $("#updatePasswordForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if(errors.old_password) {
                            // alert('erreur')
                            $("#old_password").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.old_password)
                        } else {
                            $("#old_password").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.password) {
                            // alert('erreur')
                            $("#password").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.password)
                        } else {
                            $("#password").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.confirmation_password) {
                            // alert('erreur')
                            $("#confirmation_password").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.confirmation_password)
                        } else {
                            $("#confirmation_password").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                      
                        


                    } else {
                            
                            $("#old_password").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#password").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#confirmation_password").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                           
                           

                        window.location.href='{{route("client.compte")}}';

                            }
                    }

                
            })

        });



       
    </script>
@endsection