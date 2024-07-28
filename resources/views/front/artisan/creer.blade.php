@extends('front.layouts.app')

@section('main')

<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        
    <h1 class="h3 text-center text-danger">Veuillez compléter votre inscription à NovoTech.</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card shadow border-0 p-5">
                    <form action="" name="updateArtisanProfileForm" id="updateArtisanProfileForm">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Metier :<span class="req">*</span></label>
                                    <select name="metier_id" id="metier_id" class="form-select">
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
                                <div class="col-md-4">
                                    <label for="">Ville - Commune : <span class="req">*</span> </label>
                                            <select class="form-select" name='ville' id="ville">
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
                                <div class="col-md-4">
                                    <label for="">Quartier :<span class="req">*</span></label>
                                    <input type="text" name="quartier" id="quartier" class="form-control" placeholder="Votre quartier" />
                                    <p></p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Poste que vous occupé : <span class="req">*</span> </label>
                                            <select class="form-control" id="poste_occupe_dans_l_entreprise" name='poste_occupe_dans_l_entreprise'>
                                                <option value="">Sélectionnez le poste que vous occupé</option>
                                                <option value="">------------</option>
                                                <option value="Propriétaire" >Propriétaire</option>
                                                <option value="Gérant" >Gérant</option>
                                                <option value="Salarié" >Salarié</option>
                                            </select>
                                    <p></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Numero de téléphone :<span class="req">*</span></label>
                                    <input type="tel" name="telephone" id="telephone" class="form-control" placeholder="Numero de téléphone" />
                                    <p></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Numero de téléphone WhatsApp :</label>
                                    <input type="tel" name="telephone_whatsapp" id="telephone_whatsapp" class="form-control" placeholder="Numero de téléphone WhatsApp" />
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        
                        

                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Latitude :<span class="req">*</span></label>
                                    <input type="tel" name="latitude" id="latitude" class="form-control" step="0.0000001" min="-90" max="90" placeholder="Latitude" />
                                    <p></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Longitude :<span class="req">*</span></label>
                                    <input type="tel" name="longitude" id="longitude" class="form-control" step="0.0000001" min="-90" max="90" placeholder="Longitude" />
                                    <p></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">cliquer sur le btn </label>
                                    <button type="button" class="btn btn-primary" id="locateBtn"> <i class="fa fa-map-marker"></i> Se localiser automatiquement</button>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Votre zone de couverture : <span class="req">*</span> </label>
                                            <select class="form-control" name='zone_couverture' id="zone_couverture">
                                                <option value="">Sélectionnez votre zone de couverture</option>
                                                <option value="">------------</option>
                                                <option value="Locale" >Locale</option>
                                                <option value="Régionale" >Régionale</option>
                                                <option value="Nationale" >Nationale</option>
                                                <option value="Internationale" >Internationale</option>
                                            </select>
                                    <p></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Votre ancienneté dans le domaine : <span class="req">*</span> </label>
                                            <select class="form-control" name='anciennete' id="anciennete">
                                                <option value="">Sélectionnez votre ancienneté dans le domaine</option>
                                                <option value="">------------</option>
                                                <option value="Moins de 2 ans" >Moins de 2 ans</option>
                                                <option value="2-4 ans" >2-4 ans</option>
                                                <option value="5-7 ans" >5-7 ans</option>
                                                <option value="8-10 ans" >8-10 ans</option>
                                                <option value="lus de 10 ans" >lus de 10 ans</option>
                                            </select>
                                    <p></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Votre plage horaire : <span class="req">*</span> </label>
                                            <select class="form-control" name='plage_horaire' id="plage_horaire">
                                                <option value="">Sélectionnez votre plage horaire</option>
                                                <option value="">------------</option>
                                                <option value="6h-18h" >6h-18h</option>
                                                <option value="8h-20h" >8h-20h</option>
                                                <option value="24/24h" >24/24h</option>
                                            </select>
                                    <p></p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Vos jours de travail : <span class="req">*</span> </label>
                                            <select class="form-control" name='jour_travaille' id="jour_travaille">
                                                <option value="">Sélectionnez vos jours de travail</option>
                                                <option value="">------------</option>
                                                <option value="Lundi au Vendredi" >Lundi au Vendredi</option>
                                                <option value="Lundi au Samedi" >Lundi au Samedi</option>
                                                <option value="Tous les jours" >Tous les jours</option>
                                            </select>
                                    <p></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Avez-vous un registre de commerce ? <span class="req">*</span> </label>
                                            <select class="form-control" name='registre_commerce' id="registre_commerce">
                                                <option value="">Sélectionnez une réponse</option>
                                                <option value="">------------</option>
                                                <option value="Oui" >Oui</option>
                                                <option value="Non" >Non</option>
                                            </select>
                                    <p></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Numéro du registre de commerce <span class="req">*</span> </label>
                                            <input type="text" name="numero_registre_commerce" id="numero_registre_commerce" class="form-control" placeholder="Numéro du registre de commerce" />
                                    <p></p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Description de votre activité : <span class="req">*</span> </label>
                                            <textarea name="description" id="description" class="form-control textarea" id="" rows="10"></textarea>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        
                        







                        
                        <button type="submit" class="btn btn-primary mt-2 w-100"> <i class="fa fa-check-circle"></i>  Valider </button>
                    </form>                    

                        </div>

                        
                </div>
            </div>
        </div>
    </div>
</section>

@section('customJs')
    <script>
        $("#updateArtisanProfileForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("account.createArtisan") }}',
                type: 'post',
                data: $("#updateArtisanProfileForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
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
                        if(errors.registre_commerce) {
                            // alert('erreur')
                            $("#registre_commerce").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.registre_commerce)
                        } else {
                            $("#registre_commerce").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html("")
                        }
                        

                        


                    } else {
                            $("#user_id").removeClass('is-invalid')
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
                            $("#registre_commerce").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html("")
                           

                        window.location.href='{{route("account.profile")}}';

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





@endsection