@extends('front.layouts.app')

@section('customCss')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        .about-message {
        background: #f4f4f4;
        min-height: 374px;
        padding: 50px;
        }

        .about-message ul li a {
        color: #6A6A6A;
        }
        .team {
            padding-bottom: 50px;
        }

        /* Team
        ================================================== */
        .img-hexagon span {
        position: absolute;
        display: block;
        float: left;
        border-left: 120px solid #fff;
        border-right: 120px solid #fff;
        }

        .img-top {
        top: 0;
        border-top: 0px solid transparent;
        border-bottom: 75px solid transparent;
        }

        .img-bottom {
        bottom: 0px;
        border-bottom: 0px solid transparent;
        border-top: 75px solid transparent;
        }

        .img-hexagon {
        width: 240px;
        height: 250px;
        position: relative;
        display: inline-block;
        }

        .img-hexagon img {
        width: 100%;
        height: 100%;
        }

        .team-content h3 {
        margin-bottom: 0;
        font-size: 20px;
        }

        .team-content p {
        color: #959595;
        }

        .team-social a {
        background: #d5d5d5;
        color: #fff;
        width: 28px;
        height: 28px;
        line-height: 28px;
        border-radius: 100%;
        display: inline-block;
        text-align: center;
        transition: all 300ms ease;
        }

        .team-social a.fb:hover {
        background: #325c94;
        }

        .team-social a.twt:hover {
        background: #00abdc;
        }

        .team-social a.gplus:hover {
        background: #dd4b39;
        }

        .team-social a.linkdin:hover {
        background: #007bb6;
        }

        .team-social a.dribble:hover {
        background: #ea4c89;
        }

        /* Team list */
        .team-list .img-hexagon {
        float: left;
        margin-right: 30px;
        }

        /* Team list square */
        .team-list-square .img-square {
        float: left;
        margin-right: 30px;
        }



    </style>
@endsection



@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        
        <div>
			<div class="col-md-12  text-center">
				<h1 class="h3">A PROPOS DE NOUS</h1>
					<span>LA QUALITE ET L'EXPERIENCE A VOTRE SERVICE</span>
			</div>
		</div>
        <div>
            <div class="row about-wrapper-top mt-4">
                <div class="col-md-6 ts-padding about-message">
                    <h3 class="h5">QUI SOMMES NOUS?</h3>
                    <p>"Novotech Solutions est une entreprise spécialisée dans le développement de solutions numériques dédiées à la promotion et à la valorisation des artisans de Côte d’Ivoire. Fondée en 2024, notre mission est d'encourager l'inclusivité numérique et de soutenir les acteurs du secteur informel des domaines culturels et artisanaux à mieux communiquer et faire connaitre leurs activités à travers les médias sociaux ainsi que des technologies innovantes. .</p>
                    <!-- <p>Composée d’une équipe de 15 experts repartis en Développement Web, Marketing et Communication Digitale, Gestion de Projets et autre, notre entreprise s’engage à offrir des solutions adaptées et de qualités à vos besoins.."</p> -->
                </div>
                <!--/ About message end -->
                <div class="col-md-6 ts-padding about-img"
                    style="height:374px;background:url(assets/images/about-1.jpg) 50% 50% / cover no-repeat;">
                </div>
                <!--/ About image end -->
            </div>
            <!--/ Content row end -->
    
            <div class="row about-wrapper-bottom">
                <div class="col-md-6 ts-padding about-img"
                    style="height:374px;background:url(assets/images/about-2.jpg) 50% 50% / cover no-repeat;">
                </div>
                <!--/ About image end -->
                <div class="col-md-6 ts-padding about-message">
                    <h3 class="h5">QUE FAISONS NOUS?</h3>
                    <p>"L'artisanat en Côte d'Ivoire est un secteur crucial pour l'économie locale, représentant une riche diversité culturelle et un savoir-faire unique. Cependant, les artisans ivoiriens font face à des défis majeurs, notamment un accès limité aux marchés numériques, un manque de visibilité internationale et des ressources limitées pour promouvoir efficacement leurs produits. Le besoin d'une solution informatique pour surmonter ces obstacles est pressant afin de permettre aux artisans de maximiser leur potentiel économique et culturel.
                    </p>
                    <!-- <p>Notre mission consiste à développer des plateformes numériques intégrées visant à promouvoir et valoriser les artisans ivoiriens. Notre plateforme offre aux artisans des outils pour créer des profils détaillés, exposer leurs produits, gérer leurs ventes et interagir avec des clients potentiels, tout en augmentant leur visibilité sur le marché local et international. Il est crucial que la solution soit accessible, facile à utiliser et qu'elle soutienne la croissance durable des artisans." -->
                </div>
                <!--/ About message end -->
            </div>
        </div>
        <!-- Team start -->
		<div class="team">
			<div class="row">
				<div class="col-md-12  text-center mt-5">
                    <h1 class="h3">NOTRE EQUIPE</h1>
                        <span>LA QUALITE ET L'EXPERIENCE A VOTRE SERVICE</span>
                </div>
			</div><!-- Title row end -->
			<div class="row text-center mt-5">
				<div class="col-md-3 col-sm-6">
					<div class="team wow slideInLeft">
						<div class="img-hexagon">
							<img src="assets/images/avatar7.png" alt="">
							<span class="img-top"></span>
							<span class="img-bottom"></span>
						</div>
						<div class="team-content">
							<h3>John Doe - 1</h3>
							<p>Developpeur web</p>
							<!-- <div class="team-social">
								<a class="fb" href="#"><i class="fa fa-facebook"></i></a>
								<a class="twt" href="#"><i class="fa fa-twitter"></i></a>
								<a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
								<a class="linkdin" href="#"><i class="fa fa-linkedin"></i></a>
								<a class="dribble" href="#"><i class="fa fa-dribbble"></i></a>
							</div> -->
						</div>
					</div>
				</div>
				<!--/ Team 1 end -->
				<div class="col-md-3 col-sm-6">
					<div class="team wow slideInLeft">
						<div class="img-hexagon">
							<img src="assets/images/avatar7.png" alt="">
							<span class="img-top"></span>
							<span class="img-bottom"></span>
						</div>
						<div class="team-content">
							<h3>John Doe - 2</h3>
							<p>Responsable Marketing</p>
							<!-- <div class="team-social">
								<a class="fb" href="#"><i class="fa fa-facebook"></i></a>
								<a class="twt" href="#"><i class="fa fa-twitter"></i></a>
								<a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
								<a class="linkdin" href="#"><i class="fa fa-linkedin"></i></a>
								<a class="dribble" href="#"><i class="fa fa-dribbble"></i></a>
							</div> -->
						</div>
					</div>
				</div>
				<!--/ Team 2 end -->
				<div class="col-md-3 col-sm-6">
					<div class="team wow slideInRight">
						<div class="img-hexagon">
							<img src="assets/images/avatar7.png" alt="">
							<span class="img-top"></span>
							<span class="img-bottom"></span>
						</div>
						<div class="team-content">
							<h3>John Doe - 3</h3>
							<p>Responsable SAV</p>
							<!-- <div class="team-social">
								<a class="fb" href="#"><i class="fa fa-facebook"></i></a>
								<a class="twt" href="#"><i class="fa fa-twitter"></i></a>
								<a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
								<a class="linkdin" href="#"><i class="fa fa-linkedin"></i></a>
								<a class="dribble" href="#"><i class="fa fa-dribbble"></i></a>
							</div> -->
						</div>
					</div>
				</div>
				<!--/ Team 3 end -->
				<div class="col-md-3 col-sm-6">
					<div class="team animate wow slideInRight">
						<div class="img-hexagon">
							<img src="assets/images/avatar7.png" alt="">
							<span class="img-top"></span>
							<span class="img-bottom"></span>
						</div>
						<div class="team-content">
							<h3>John Doe - 4</h3>
							<p>Web Designer</p>
							<!-- <div class="team-social">
								<a class="fb" href="#"><i class="fa fa-facebook"></i></a>
								<a class="twt" href="#"><i class="fa fa-twitter"></i></a>
								<a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
								<a class="linkdin" href="#"><i class="fa fa-linkedin"></i></a>
								<a class="dribble" href="#"><i class="fa fa-dribbble"></i></a>
							</div> -->
						</div>
					</div>
				</div>
				<!--/ Team 4 end -->
			</div>
			<!--/ Content row end -->
		</div><!-- Team end -->
    
</section>

@endsection