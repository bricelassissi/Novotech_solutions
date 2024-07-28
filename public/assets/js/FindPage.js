document.addEventListener('DOMContentLoaded', (event) => {
    let currentUrl = window.location.href;
    let urlParams = new URLSearchParams(currentUrl);

    if (urlParams.has('categorie')) {
        document.getElementById('categorie').value = urlParams.get('categorie');
    }
    if (urlParams.has('ville')) {
        document.getElementById('ville').value = urlParams.get('ville');
    }
    if (urlParams.has('commune')) {
        document.getElementById('commune').value = urlParams.get('commune');
    }

    if (urlParams.has('localisation')) {
        document.getElementById('localisation').checked = urlParams.get('localisation') === "true";
        if(document.getElementById('localisation').checked){
            document.getElementById('rayon')?.style.setProperty( "display","block", "important")
            document.getElementById("rangeInterval")?.style.setProperty('display', "block", "important");
            if (urlParams.has('rayon')) {
                document.getElementById('rayon').value = urlParams.get("rayon");
                var rangeInput = document.getElementById("rayon");
                $(rangeInput).trigger('input');
            }
        }
    }
})


