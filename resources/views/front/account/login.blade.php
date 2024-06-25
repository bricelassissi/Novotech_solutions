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

        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Se connecter</h1>
                    <form action="account.html" method="post">
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="example@example.com">
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Mot de passe*</label>
                            <input type="password" name="name" id="name" class="form-control" placeholder="Entrer votre mot de passe">
                        </div> 
                        <div class="justify-content-between d-flex">
                        <button class="btn btn-primary mt-2">Valider</button>
                            <a href="#" class="mt-3">Mot de passe oublié?</a>
                        </div>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Vous n'avez pas de compte? <a  href="inscription.html">S'inscrire</a></p>
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>



    
@endsection