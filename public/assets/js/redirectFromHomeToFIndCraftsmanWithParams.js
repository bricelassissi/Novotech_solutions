document.addEventListener('DOMContentLoaded', (event) => {
    // variables
    let category = ""
    let city = ""
    let town = ""
    let latitude = ""
    let longitude = ""

    // events
    document.getElementById('category').addEventListener('change', handleSelectChange)
    document.getElementById('makeSearch').addEventListener('click', redirectTo)
    document.getElementById('localisation').addEventListener('change', getCurrentPosition)

    // functions
    function handleSelectChange(event) {
        category = event.target.value;
    }

    function getCurrentPosition(){
        if("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(e => {
                latitude = e.coords.latitude
                longitude = e.coords.longitude
            })
        }else {
            alert("Geolocation n'est pas supporter sur ce navigateur.");
        }
    }

    function redirectTo() {
        preventUserForActivateLocalisation()
        city = document.getElementById('city').value;
        town = document.getElementById('town').value;
        category = document.getElementById('category').value
        if(city !== "" || category !== "" || town !== "" || (latitude !== "" && longitude !== ""))
            window.location.href = `rechercher-un-artisans?&categorie=${encodeURIComponent(category)}&ville=${encodeURIComponent(city)}&commune=${encodeURIComponent(town)}&longitude=${encodeURIComponent(longitude)}&latitude=${encodeURIComponent(latitude)}`;
    }

    function preventUserForActivateLocalisation(){
        if ("geolocation" in navigator) {
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
        }
    }
});
