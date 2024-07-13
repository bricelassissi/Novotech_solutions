document.addEventListener('DOMContentLoaded', (event) => {

    let currentUrl = window.location.href;

    let urlParams = new URLSearchParams(currentUrl);
    if (urlParams.has('categorie')) {
        document.getElementById('category').value = urlParams.get('categorie');
    }
    if (urlParams.has('ville')) {
        document.getElementById('city').value = urlParams.get('ville');
    }
    if (urlParams.has('commune')) {
        document.getElementById('town').value = urlParams.get('commune');
    }
})
