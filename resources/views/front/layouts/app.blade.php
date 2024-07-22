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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css" integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
		<div class="container">
			<a class="navbar-brand" href="{{route('front.home')}}"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item">
						<a class="nav-link {{ Request::routeIs('front.home') ? 'active' : '' }}"
                           aria-current="page" href="{{route('front.home')}}">Accueil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="qui-sommes-nous.html">Qui sommes nous?</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ Request::routeIs('front.find-artisans-by-criteria') ? 'active' : '' }}"
                           aria-current="page" href="{{route('front.find-artisans-by-criteria')}}">Trouver un artisan</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('front.contact-us') ? 'active' : '' }}"
                           aria-current="page" href="{{route('front.contact-us')}}">Nous contacter</a>
                    </li>
				</ul>
                @if (!Auth::check())
				<a class="btn btn-outline-primary me-2" href="{{route('account.login')}}" type="submit">Se Connecter</a>
				<a class="btn btn-primary" href="{{route('account.register')}}" type="submit">S'inscrire</a>
                @else
				<a class="btn btn-outline-primary me-2" href="{{route('account.profile')}}" type="submit">Mon profil</a>
				<a class="btn btn-danger" href="{{ route('account.logout') }}" type="submit">Se déconnecter</a>
                @endif
			</div>
		</div>
	</nav>
</header>




@yield('main')

<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.5.1.3.min.js')}}"></script>
<script src="{{asset('assets/js/instantpages.5.1.0.min.js')}}"></script>
<script src="{{asset('assets/js/lazyload.17.6.0.min.js')}}"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js" integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script>
    // $('.textarea').trumbowyg();
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>
@yield('customJs')
</body>
</html>
