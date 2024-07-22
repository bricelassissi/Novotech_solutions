document.addEventListener('DOMContentLoaded', (event) => {


    // int
    document.getElementById("rayon")?.style.setProperty('display', 'none', 'important');
    document.getElementById("rangeInterval")?.style.setProperty('display', 'none', 'important');
    let currentUrl = window.location.href;
    let urlParams = new URLSearchParams(currentUrl);
    // variables
    let categorie = urlParams.has('categorie') ? urlParams.get('categorie') : ""
    let ville = urlParams.has('ville') ? urlParams.get('ville') : ""
    let commune = urlParams.has('commune') ? urlParams.get('commune') : ""
    let latitude = urlParams.has('latitude') ? urlParams.get('latitude') : ""
    let longitude = urlParams.has('longitude') ? urlParams.get('longitude') : ""
    let localisation = urlParams.has('localisation') ? urlParams.get('localisation') : false
    let rayon = urlParams.has('rayon') && urlParams.has('localisation') && urlParams.get('localisation') ? urlParams.get('rayon') : ""

    // events
    document.getElementById('categorie').addEventListener('change', handleSelectChange)
    document.getElementById('makeSearch').addEventListener('click', redirectTo)
    document.getElementById('localisation').addEventListener('change', getCurrentPosition)
    document.getElementById('rayon').addEventListener('change', getRayon)

    // functions
    function handleSelectChange(event) {
        categorie = event.target.value;
    }

    function getRayon(event){
        console.log("rayon",event.target.value);
        if(localisation)
            rayon = event.target.value
    }

    function getCurrentPosition(event){
        localisation = event.target.checked
        if(event.target.checked) {
            preventUserForActivateLocalisation()
        }else {
            document.getElementById("rayon")?.style.setProperty('display', 'none', 'important');
            document.getElementById("rangeInterval")?.style.setProperty('display', 'none', 'important');
            latitude = ""
            longitude = ""
            rayon = ""
        }
    }

    function redirectTo() {
        ville = document.getElementById('ville').value;
        commune = document.getElementById('commune').value;
        categorie = document.getElementById('categorie').value
        rayon = document.getElementById("rayon").value
        localisation = document.getElementById("localisation").checked
        if(localisation){
            preventUserForActivateLocalisation()
        }
        console.log("localisation", localisation, latitude, longitude)

        if(ville !== "" || categorie !== "" || commune !== "" || (localisation && latitude !== "" && longitude !== "" && rayon !== ""))
            window.location.href = `rechercher-un-artisans?&categorie=${encodeURIComponent(categorie)}&ville=${encodeURIComponent(ville)}&commune=${encodeURIComponent(commune)}&localisation=${encodeURIComponent(localisation)}&longitude=${encodeURIComponent(longitude)}&latitude=${encodeURIComponent(latitude)}&rayon=${encodeURIComponent(rayon)}`;
    }

    function preventUserForActivateLocalisation(){
        if ("geolocation" in navigator) {
            document.getElementById("rayon")?.style.setProperty('display', 'block', 'important');
            document.getElementById("rangeInterval")?.style.setProperty('display', 'block', 'important');
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    latitude = position.coords.latitude
                    longitude = position.coords.longitude
                },
                (error) => {
                    if (error.code === error.PERMISSION_DENIED) {
                        alert("Vous avez désactivez l'accès sur ce site. Veuillez svp réactivé l'accès dans les paramètre du navigateur.");
                    } else {
                        alert("Error: " + error.message);
                    }
                }
            );
        } else {
            alert("Geolocation n'est pas supporter sur ce navigateur.");
            return ;
        }
        console.log("latitude longitude", latitude, longitude);
    }

    document.addEventListener("DOMContentLoaded", function() {
        if (window.location.hash) {
            const element = document.querySelector(window.location.hash);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
});
