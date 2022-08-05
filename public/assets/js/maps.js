
function initMap() {
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    const paris = new google.maps.LatLng(48.52, 2.19)
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 7,
        center: paris,
    });
    calculateAndDisplayRoute(directionsService, directionsRenderer)
    directionsRenderer.setMap(map);
}

let data = document.querySelector('#travel');
let steps = JSON.parse(data.dataset.liststeps)

//console.log(start,end)

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    let start = steps[0]
    let end = steps[steps.length - 1]
    let listSteps = []
    
    steps.forEach((step, index) => {
        if (index !== 0 && index !== steps.length - 1) { listSteps.push({ location: step, stopover: true }) }
    });

    console.log(listSteps)
    directionsService
        .route({
            origin: {
                query: start,
            },
            destination: {
                query: end,
            },
            unitSystem: google.maps.UnitSystem.METRIC,
            drivingOptions: {
                departureTime: new Date(),
                trafficModel: 'optimistic'
            },
            waypoints: listSteps,
            travelMode: 'DRIVING',
        })
        .then((response) => {
            console.log(response);
            let distance = response.routes[0].legs[0].distance.text
            let duration = response.routes[0].legs[0].duration.text
            htmlDistanceAndDuration(distance, duration)
            directionsRenderer.setDirections(response);
        })
        .catch((e) => window.alert("Directions request failed due to " + status));
}

function htmlDistanceAndDuration(distance, duration) {
    console.log(distance, duration)
}
window.initMap = initMap;

