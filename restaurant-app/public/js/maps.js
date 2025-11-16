
window.initMap = function () {
    const googleMap = document.querySelector('.google-maps');

    const map = new google.maps.Map(googleMap, {
        center: { lat: 42.351423, lng: -71.064984 },
        zoom: 15,
        mapTypeId: 'satellite',
        tilt: 0,
    });

    const marker = new google.maps.Marker({
        position: { lat: 42.351423, lng: -71.064984 },
        map,
        title: "Sushi Sapporo"
    });

    const infowindow = new google.maps.InfoWindow({
        content: '<div>Sushi Sapporo</div>',
        ariaLabel: "Sushi Sapporo",
    });

    infowindow.open({
        anchor: marker,
        map,
    });
};
