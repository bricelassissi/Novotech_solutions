<!DOCTYPE html>
<html class="no-js" lang="fr" />
<head>
	{{-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> --}}
    <meta charset="UTF-8">
	<title>NovoTech</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
	<meta name="csrf-token" content="{{csrf_token()}}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />
	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
		<div class="container">
			<a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt=""></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="index.html">Accueil</a>
					</li>	
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="qui-sommes-nous.html">Qui sommes nous?</a>
					</li>	
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="trouver-artisan.html">Trouver un artisan</a>
					</li>										
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="nous-contacter.html">Nous contacter</a>
					</li>										
				</ul>				
				<a class="btn btn-outline-primary me-2" href="{{route('account.login')}}" type="submit">Se Connecter</a>
				<a class="btn btn-primary" href="{{route('account.register')}}" type="submit">S'inscrire</a>
			</div>
		</div>
	</nav>
</header>


@yield('main')




<footer class="bg-dark py-3 bg-2">
    <div class="container text-white">
        <div class="row">
            <div class="col-md-4">
                <p>Qui sommes nous?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, labore....</p>
                <p class="mb-0">
                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                    <span class="ps-1">Abidjan - Plateau (Immeuble CIAM )</span>
                </p>
                <p class="mb-0">
                    <span class="fw-bolder"><i class="fa fa-address"></i></span>
                    <span class="ps-1">info@novotech.com</span>
                </p>
                <p class="mb-0">
                    <span class="fw-bolder"><i class="fa fa-phone"></i></span>
                    <span class="ps-1">00225 - 0700000000</span>
                </p>
            </div>
            <div class="col-md-4">
                <p>Liens</p>

                <ul>
                    <li><a href="">Accueil</a></li>
                    <li><a href="">Trouver un artisan</a></li>
                    <li><a href="">Nous contacter</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <p>Contacts</p>


                <form action="">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom & Prénom(s)</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nom & Prénom(s)">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">N° de téléphone</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="N° de téléphone">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Votre Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Objet</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Objet">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Votre message ici"></textarea>
                    </div>
                    
                    <button class="btn btn-success">Envoyer</button>
                </form>


            </div>
        </div>
        <p class="text-center text-white pt-3 fw-bold fs-6">© 2024 NovoTech, tous droits reservés</p>
    </div>
</footer> 
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.5.1.3.min.js')}}"></script>
<script src="{{asset('assets/js/instantpages.5.1.0.min.js')}}"></script>
<script src="{{asset('assets/js/lazyload.17.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script>
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>
@yield('customJs')
</body>
</html>