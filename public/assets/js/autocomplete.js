
let inputsAutocomplete = document.querySelectorAll('.cityAutocomplete')
let selectContainer = document.querySelector('.selectContainer');

inputsAutocomplete.forEach(input => {
    input.addEventListener('input',()=>{autocomplete(this.event.target)})
});
function autocomplete(input){
    let url = `https://api-adresse.data.gouv.fr/search/?q=${input.value}&type=municipality&autocomplete=1`
    fetch(url).then(res => res.json()).then(json=>htmlAutoComplete(json))
}

function htmlAutoComplete(json){
    let data = json.features
    
    data.forEach(city => {
        //console.log(city.properties.city)
        selectContainer.innerHTML = `<option value="${city.properties.city}"><strong>${city.properties.city}</strong> ${city.properties.context}</option>`
    });
}
