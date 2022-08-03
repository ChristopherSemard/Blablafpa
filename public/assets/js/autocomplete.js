
let inputsAutocomplete = document.querySelectorAll('.cityAutocomplete')
let selectContainer = document.querySelector('.selectContainer');

inputsAutocomplete.forEach(input => {
    input.addEventListener('input', () => { autocomplete(this.event.target) })
});
function autocomplete(input) {
    let url = `https://api-adresse.data.gouv.fr/search/?q=${input.value}&type=municipality&autocomplete=1`
    fetch(url).then(res => res.json()).then(json => htmlAutoComplete(json))
}

function htmlAutoComplete(json) {
    let data = json.features
    let contents = []
    data.forEach(city => {
        contents.push(`${city.properties.city}, ${city.properties.context}`)
    });
    return c
    $(document).ready(function () {
        $("#tags").autocomplete({
            source: contents
        });
    });
}
