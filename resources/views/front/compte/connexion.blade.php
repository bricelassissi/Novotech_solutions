@extends('front.layouts.app')

@section('main')


<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        @if (Session::has('success'))
            <div class="alert alert-success">
                <p>{{Session::get('success')}}</p>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                <p>{{Session::get('error')}}</p>
            </div>
        @endif

        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Se connecter</h1>
                    <form action="{{route('account.processLogin')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            {{-- <input type="hidden" name="redirectTo" value="{{ $redirectTo }}"> --}}
                            <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="example@example.com">
                            @error('email')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Mot de passe*</label>
                            <input type="password" name="motDePasse" id="motDePasse" class="form-control @error('motDePasse') is-invalid @enderror" placeholder="Entrer votre mot de passe">
                            @error('motDePasse')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div> 
                        <div class="justify-content-between d-flex">
                        <button class="btn btn-primary mt-2">Valider</button>
                            <a href="#" class="mt-3">Mot de passe oublié?</a>
                        </div>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Vous n'avez pas de compte? <a  href="{{route('account.register')}}">S'inscrire</a></p>
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>
    
@endsection

@section('customJs')
    <script>
        

        $("#loginForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("account.processLogin") }}',
                type: 'post',
                data: $("#loginForm").serializeArray(),
                dataType: 'json',
                success: function(response) {

                    if (response.status == false) {
                        var errors = response.errors;
                        if(errors.email) {
                                $("#email").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.email)
                            } else {
                                $("#email").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
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
                                .html('')
                            }
                    } else {
                        $("#email").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#motDePasse").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
                    }
                    
                }

            })

            })


    </script>
@endsection