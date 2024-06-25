@extends('front.layouts.app')

@section('main')

<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        
    <h1 class="h3 text-center text-secondary">Inscription à NovoTech</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0 p-5">
                    <form action="" name="registrationForm" id="registrationForm">
                        <div class="mb-3">
                                <label for="">Etes-vous artisan ?</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">----Selectionner----</option>
                                    <option value="Oui">Oui</option>
                                    <option value="Non">Non</option>
                                </select>
                                <p></p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-2">Nom*</label>
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrer votre Nom">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Prénom*</label>
                            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Entrer votre Prénom">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Entrer votre Email">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Mot de passe*</label>
                            <input type="password" name="motDePasse" id="motDePasse" class="form-control" placeholder="Votre mot de passe">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Confirmer votre mot de passe*</label>
                            <input type="password" name="confirmMotDePasse" id="confirmMotDePasse" class="form-control" placeholder="Confirmation votre mot de passe">
                            <p></p>
                        </div> 
                        <!-- <div class="mb-3 alert alert-primary" role="alert">
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Inscrire un artisan ?</label>
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                              </div>
                        </div> -->
                        <button class="btn btn-primary mt-2">Créer mon compte </button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Avez-vous dejà un compte? <a  href="login.html">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection

@section('customJs')
    <script>
        $("#registrationForm").submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                url: '{{ route("account.userRegistration") }}',
                type: 'post',
                data: $("#registrationForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if(errors.type) {
                            $("#type").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.type)
                        } else {
                            $("#type").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.nom) {
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
                        if(errors.motDePasse) {
                            $("#motDePasse").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.motDePasse)
                        } else {
                            $("#motDePasse").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.confirmMotDePasse) {
                            $("#confirmMotDePasse").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.confirmMotDePasse)
                        } else {
                            $("#confirmMotDePasse").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                    } else {

                        $("#type").removeClass('is-invalid')
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
                        $("#motDePasse").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        $("#confirmMotDePasse").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")

                    window.location.href='{{route("account.login")}}';


                    }
                }
            });
        })
    </script>
@endsection