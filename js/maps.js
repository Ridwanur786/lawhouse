function initialize() {
    var  LatLng = new google.maps.LatLng(22.340407,91.842388);
    var mapOptions ={
        zoom: 17,
        center: LatLng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        draggable : true
    };
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var image = 'http://127.0.0.1/project/images/law.ico',
        marker = new google.maps.Marker({
            position: LatLng,
            map: map,
            title: 'Get address',
            icon: image
        });
    google.maps.event.addDomListener(window,"load",initialize);
}
