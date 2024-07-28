@extends('front.layouts.app')

@section('main')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('account.profile')}}">Accueil</a></li>
                        <li class="breadcrumb-item active">Compte</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.artisan.artisan-sidebar')
            </div>
            <div class="col-lg-9">

                <div class="card border-0 shadow mb-4">
                    <form action="" name="updateArtisanProfileForm" id="updateArtisanProfileForm">
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
                          <div class="col-md-6">
                            <label for="">Email :<span class="req">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{$user->email}}"  />
                            <p></p>
                          </div>
                          <div class="col-md-6">
                            <label for="">Metier :<span class="req">*</span></label>
                            <select name="metier_id" id="metier_id" class="form-control">
                              <option value="{{$user->artisan->metier_id}}">{{$user->artisan->metier->metier}}</option>
                                <option value="">Selection votre metier</option>
                                <option value="">------------</option>
                                @if ($metiers->isNotEmpty())
                                    @foreach ($metiers as $metier)
                                    <option value="{{ $metier->id }}">{{ $metier->metier }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <p></p>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Ville - Commune : <span class="req">*</span> </label>
                                        <select class="form-control" name='ville' id="ville">
                                          <option value="{{$user->artisan->ville}}">{{$user->artisan->ville}}</option>
                                            <option value="">Sélectionnez une ville</option><option value="">------------</option>
                                            <option value="ABOBO" >ABOBO</option>
                                            <option value="ADJAME" >ADJAME</option>
                                            <option value="ATTECOUBE" >ATTECOUBE</option>
                                            <option value="COCODY" >COCODY</option>
                                            <option value="KOUMASSI" >KOUMASSI</option>
                                            <option value="MARCORY" >MARCORY</option>
                                            <option value="PLATEAU" >PLATEAU</option>
                                            <option value="PORT BOUET" >PORT BOUET</option>
                                            <option value="TREICHVILLE" >TREICHVILLE</option>
                                            <option value="YOPOUGON" >YOPOUGON</option>     
                                            <option value="ABENGOUROU" >ABENGOUROU</option>
                                            <option value="ABOISSO" >ABOISSO</option>
                                            <option value="ADIAKE" >ADIAKE</option>
                                            <option value="ADZOPE" >ADZOPE</option>
                                            <option value="AGBOVILLE" >AGBOVILLE</option>
                                            <option value="AGNIBILEKRO" >AGNIBILEKRO</option>
                                            <option value="AGOU" >AGOU</option>
                                            <option value="AKOUPE" >AKOUPE</option>
                                            <option value="ALEPE" >ALEPE</option>
                                            <option value="ANOUMABA" >ANOUMABA</option>
                                            <option value="ANYAMA" >ANYAMA</option>
                                            <option value="ARRAH" >ARRAH</option>
                                            <option value="AYAMA" >AYAMA</option>
                                            <option value="AYAME" >AYAME</option>
                                            <option value="AZAGUIE" >AZAGUIE</option>
                                            <option value="BASSADZIN" >BASSADZIN</option>
                                            <option value="BAYOTA" >BAYOTA</option>
                                            <option value="BINAO" >BINAO</option>
                                            <option value="BINGERVILLE" >BINGERVILLE</option>
                                            <option value="BOCANDA" >BOCANDA</option>
                                            <option value="BONDOUKOU" >BONDOUKOU</option>
                                            <option value="BONGOUANOU" >BONGOUANOU</option>
                                            <option value="BONOUA" >BONOUA</option>
                                            <option value="BOUAFLE" >BOUAFLE</option>
                                            <option value="BOUAKE" >BOUAKE</option>
                                            <option value="BOUDEPE" >BOUDEPE</option>
                                            <option value="BUYO" >BUYO</option>
                                            <option value="DABOU" >DABOU</option>
                                            <option value="DALOA" >DALOA</option>
                                            <option value="DAOUKRO" >DAOUKRO</option>
                                            <option value="DIDIEVI" >DIDIEVI</option>
                                            <option value="DIEGONEFLA" >DIEGONEFLA</option>
                                            <option value="DIGNAGO" >DIGNAGO</option>
                                            <option value="DIMBOKRO" >DIMBOKRO</option>
                                            <option value="DIVO" >DIVO</option>
                                            <option value="DJEKANOU" >DJEKANOU</option>
                                            <option value="DUEKOUE" >DUEKOUE</option>
                                            <option value="EHIANIA" >EHIANIA</option>
                                            <option value="FERKESSEDOUGOU" >FERKESSEDOUGOU</option>
                                            <option value="FRESCO" >FRESCO</option>
                                            <option value="GAGNOA" >GAGNOA</option>
                                            <option value="GOHITAFLA" >GOHITAFLA</option>
                                            <option value="GRABO" >GRABO</option>
                                            <option value="GRAND-BASSAM" >GRAND-BASSAM</option>
                                            <option value="GRAND BEREBY" >GRAND BEREBY</option>
                                            <option value="GRAND LAHOU" >GRAND LAHOU</option>
                                            <option value="GUEYO" >GUEYO</option>
                                            <option value="GUIBEROUA" >GUIBEROUA</option>
                                            <option value="GUIGLO" >GUIGLO</option>
                                            <option value="GUITRY" >GUITRY</option>
                                            <option value="HERMANKONO" >HERMANKONO</option>
                                            <option value="IBOKE" >IBOKE</option>
                                            <option value="ISSIA" >ISSIA</option>
                                            <option value="JACQUEVILLE" >JACQUEVILLE</option>
                                            <option value="KORHOGO" >KORHOGO</option>
                                            <option value="KOTOBI" >KOTOBI</option>
                                            <option value="KOUASSI DATEKRO" >KOUASSI DATEKRO</option>
                                            <option value="KOUASSI KOUASSIKRO" >KOUASSI KOUASSIKRO</option>
                                            <option value="KOUN FAO" >KOUN FAO</option>
                                            <option value="LAKOTA" >LAKOTA</option>
                                            <option value="MAN" >MAN</option>
                                            <option value="MAYO" >MAYO</option>
                                            <option value="M BAHIAKRO" >M BAHIAKRO</option>
                                            <option value="M BATTO" >M BATTO</option>
                                            <option value="MEAGUI" >MEAGUI</option>
                                            <option value="MEMNI" >MEMNI</option>
                                            <option value="NDOUCI" >NDOUCI</option>
                                            <option value="NIAMBEZARIA" >NIAMBEZARIA</option>
                                            <option value="ODIENNE" >ODIENNE</option>
                                            <option value="ONO" >ONO</option>
                                            <option value="OTTAWA" >OTTAWA</option>
                                            <option value="OUELLE" >OUELLE</option>
                                            <option value="OUME" >OUME</option>
                                            <option value="OURAGAHIO" >OURAGAHIO</option>
                                            <option value="PARADI" >PARADI</option>
                                            <option value="PRIKRO" >PRIKRO</option>
                                            <option value="SAIOUA" >SAIOUA</option>
                                            <option value="SAN-PEDRO" >SAN-PEDRO</option>
                                            <option value="SASSANDRA" >SASSANDRA</option>
                                            <option value="SEGUELA" >SEGUELA</option>
                                            <option value="SEYDOUGOU" >SEYDOUGOU</option>
                                            <option value="SIKENSI" >SIKENSI</option>
                                            <option value="SINFRA" >SINFRA</option>
                                            <option value="SOGB" >SOGB</option>
                                            <option value="SONGON AGBAN" >SONGON AGBAN</option>
                                            <option value="SOUBRE" >SOUBRE</option>
                                            <option value="TABOU" >TABOU</option>
                                            <option value="TAI" >TAI</option>
                                            <option value="TANDA" >TANDA</option>
                                            <option value="TANGUELAN" >TANGUELAN</option>
                                            <option value="TANKESSE" >TANKESSE</option>
                                            <option value="TEHINI" >TEHINI</option>
                                            <option value="TIASSALE" >TIASSALE</option>
                                            <option value="TIEBISSOU" >TIEBISSOU</option>
                                            <option value="TOUBA" >TOUBA</option>
                                            <option value="TOULEUPLEU" >TOULEUPLEU</option>
                                            <option value="TOUMODI" >TOUMODI</option>
                                            <option value="VAVOUA" >VAVOUA</option>
                                            <option value="WOROFLA" >WOROFLA</option>
                                            <option value="YAKASSE" >YAKASSE</option>
                                            <option value="YAMOUSSOUKRO" >YAMOUSSOUKRO</option>
                                            <option value="ZIKISSO" >ZIKISSO</option>
                                            <option value="ZUENOULA" >ZUENOULA</option>   
                                        </select>
                                <p></p>
                            </div>
                            <div class="col-md-6">
                                <label for="">Quartier :<span class="req">*</span></label>
                                <input type="text" name="quartier" id="quartier" class="form-control" placeholder="Votre quartier" value="{{$user->artisan->quartier}}" />
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Poste que vous occupé : <span class="req">*</span> </label>
                                        <select class="form-control" id="poste_occupe_dans_l_entreprise" name='poste_occupe_dans_l_entreprise'>
                                          <option value="{{$user->artisan->poste_occupe_dans_l_entreprise}}" >{{$user->artisan->poste_occupe_dans_l_entreprise}}</option>
                                            <option value="">Sélectionnez le poste que vous occupé</option>
                                            <option value="">------------</option>
                                            <option value="Propriétaire" >Propriétaire</option>
                                            <option value="Gérant" >Gérant</option>
                                            <option value="Salarié" >Salarié</option>
                                        </select>
                                <p></p>
                            </div>
                            <div class="col-md-6">
                                <label for="">Numero de téléphone :<span class="req">*</span></label>
                                <input type="tel" name="telephone" id="telephone" class="form-control" placeholder="Numero de téléphone" value="{{$user->artisan->telephone}}" />
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Numero de téléphone WhatsApp :</label>
                                <input type="tel" name="telephone_whatsapp" id="telephone_whatsapp" class="form-control" placeholder="Numero de téléphone WhatsApp" value="{{$user->artisan->telephone_whatsapp}}" />
                                <p></p>
                            </div>
                            <div class="col-md-6">
                                <label for="">Latitude :<span class="req">*</span></label>
                                <input type="tel" name="latitude" id="latitude" class="form-control" step="0.0000001" min="-90" max="90" placeholder="Latitude" value="{{$user->artisan->latitude}}" />
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Longitude :<span class="req">*</span></label>
                                <input type="tel" name="longitude" id="longitude" class="form-control" step="0.0000001" min="-90" max="90" placeholder="Longitude" value="{{$user->artisan->longitude}}" />
                                <p></p>
                            </div>
                            <div class="col-md-6">
                                <label for="">cliquer sur le btn </label> <br>
                                <button type="button" class="btn btn-primary" id="locateBtn"> <i class="fa fa-map-marker"></i> Se localiser</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Votre zone de couverture : <span class="req">*</span> </label>
                                        <select class="form-control" name='zone_couverture' id="zone_couverture">
                                          <option value="{{$user->artisan->zone_couverture}}" >{{$user->artisan->zone_couverture}}</option>
                                            <option value="">Sélectionnez votre zone de couverture</option>
                                            <option value="">------------</option>
                                            <option value="Locale" >Locale</option>
                                            <option value="Régionale" >Régionale</option>
                                            <option value="Nationale" >Nationale</option>
                                            <option value="Internationale" >Internationale</option>
                                        </select>
                                <p></p>
                            </div>
                            <div class="col-md-6">
                                <label for="">Votre ancienneté: <span class="req">*</span> </label>
                                        <select class="form-control" name='anciennete' id="anciennete">
                                          <option value="{{$user->artisan->anciennete}}" >{{$user->artisan->anciennete}}</option>
                                            <option value="">Votre ancienneté</option>
                                            <option value="">------------</option>
                                            <option value="Moins de 2 ans" >Moins de 2 ans</option>
                                            <option value="2-4 ans" >2-4 ans</option>
                                            <option value="5-7 ans" >5-7 ans</option>
                                            <option value="8-10 ans" >8-10 ans</option>
                                            <option value="lus de 10 ans" >lus de 10 ans</option>
                                        </select>
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Votre plage horaire : <span class="req">*</span> </label>
                                        <select class="form-control" name='plage_horaire' id="plage_horaire">
                                          <option value="{{$user->artisan->plage_horaire}}" >{{$user->artisan->plage_horaire}}</option>
                                            <option value="">Sélectionnez votre plage horaire</option>
                                            <option value="">------------</option>
                                            <option value="6h-18h" >6h-18h</option>
                                            <option value="8h-20h" >8h-20h</option>
                                            <option value="24/24h" >24/24h</option>
                                        </select>
                                <p></p>
                            </div>
                            <div class="col-md-6">
                                <label for="">Vos jours de travail : <span class="req">*</span> </label>
                                        <select class="form-control" name='jour_travaille' id="jour_travaille">
                                          <option value="{{$user->artisan->jour_travaille}}" >{{$user->artisan->jour_travaille}}</option>
                                            <option value="">Sélectionnez vos jours de travail</option>
                                            <option value="">------------</option>
                                            <option value="Lundi au Vendredi" >Lundi au Vendredi</option>
                                            <option value="Lundi au Samedi" >Lundi au Samedi</option>
                                            <option value="Tous les jours" >Tous les jours</option>
                                        </select>
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for=""> Registre de commerce ? <span class="req">*</span> </label>
                                        <select class="form-control" name='registre_commerce' id="registre_commerce">
                                          <option value="{{$user->artisan->registre_commerce}}" >{{$user->artisan->registre_commerce}}</option>
                                            <option value="">Sélectionnez une réponse</option>
                                            <option value="">------------</option>
                                            <option value="Oui" >Oui</option>
                                            <option value="Non" >Non</option>
                                        </select>
                                <p></p>
                            </div>
                            <div class="col-md-6">
                                <label for="">Numéro registre de commerce <span class="req">*</span> </label>
                                        <input type="text" name="numero_registre_commerce" id="numero_registre_commerce" class="form-control" placeholder="Numéro du registre de commerce" value="{{$user->artisan->numero_registre_commerce}}" />
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Description de votre activité : <span class="req">*</span> </label>
                                        <textarea name="description" id="description" class="form-control textarea" id="" rows="10"> {{$user->artisan->description}} </textarea>
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
        $("#updateArtisanProfileForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("account.updateArtisan") }}',
                type: 'put',
                data: $("#updateArtisanProfileForm").serializeArray(),
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
                        if(errors.metier_id) {
                            // alert('erreur')
                            $("#metier_id").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.metier_id)
                        } else {
                            $("#metier_id").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }

                        if(errors.ville) {
                            // alert('erreur')
                            $("#ville").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.ville)
                        } else {
                            $("#ville").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }

                        if(errors.quartier) {
                            // alert('erreur')
                            $("#quartier").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.quartier)
                        } else {
                            $("#quartier").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }

                        if(errors.poste_occupe_dans_l_entreprise) {
                            // alert('erreur')
                            $("#poste_occupe_dans_l_entreprise").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.poste_occupe_dans_l_entreprise)
                        } else {
                            $("#poste_occupe_dans_l_entreprise").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.description) {
                            // alert('erreur')
                            $("#description").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.description)
                        } else {
                            $("#description").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.telephone) {
                            // alert('erreur')
                            $("#telephone").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.telephone)
                        } else {
                            $("#telephone").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.latitude) {
                            // alert('erreur')
                            $("#latitude").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.latitude)
                        } else {
                            $("#latitude").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.longitude) {
                            // alert('erreur')
                            $("#longitude").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.longitude)
                        } else {
                            $("#longitude").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.zone_couverture) {
                            // alert('erreur')
                            $("#zone_couverture").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.zone_couverture)
                        } else {
                            $("#zone_couverture").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.anciennete) {
                            // alert('erreur')
                            $("#anciennete").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.anciennete)
                        } else {
                            $("#anciennete").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.plage_horaire) {
                            // alert('erreur')
                            $("#plage_horaire").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.plage_horaire)
                        } else {
                            $("#plage_horaire").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        if(errors.jour_travaille) {
                            // alert('erreur')
                            $("#jour_travaille").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.jour_travaille)
                        } else {
                            $("#jour_travaille").removeClass('is-invalid')
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
                            $("#metier_id").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#ville").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#quartier").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#poste_occupe_dans_l_entreprise").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#description").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#telephone").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#latitude").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#longitude").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#zone_couverture").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#anciennete").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#plage_horaire").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                            $("#jour_travaille").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                           

                        window.location.href='{{route("artisan.compte")}}';

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
                           
                           

                        window.location.href='{{route("artisan.compte")}}';

                            }
                    }

                
            })

        });



        document.getElementById('locateBtn').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                document.getElementById('latitude').value = position.coords.latitude.toFixed(7);
                document.getElementById('longitude').value = position.coords.longitude.toFixed(7);
            }, function(error) {
                alert('Erreur lors de la récupération de la géolocalisation : ' + error.message);
            });
        } else {
            alert('La géolocalisation n\'est pas supportée par ce navigateur.');
        }
    });
       
    </script>
@endsection