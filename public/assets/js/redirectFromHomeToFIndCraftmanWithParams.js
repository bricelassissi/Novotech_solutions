document.addEventListener('DOMContentLoaded', (event) => {
    // variables
    let category = ""
    let city = ""
    let town = ""

    // events
    document.getElementById('category').addEventListener('change', handleSelectChange);
    document.getElementById('makeSearch').addEventListener('click', redirectTo)

    // functions
    function handleSelectChange(event) {
        category = event.target.value;
        console.log(category)
    }
    function getFirstOptionValue() {
        const selectElement = document.getElementById('category');
        return selectElement.options[1].value;
    }
    function redirectTo() {
        initParam()
        city = document.getElementById('city').value;
        town = document.getElementById('town').value;
        if(city !== "" || category !== "" || town !== "")
            window.location.href = `rechercher-un-artisans?&categorie=${encodeURIComponent(category)}&ville=${encodeURIComponent(city)}&commune=${encodeURIComponent(town)}`;
    }
});
