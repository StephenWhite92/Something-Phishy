let map, heatmap;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: { lat: 38.945, lng: -92.329 },
    mapTypeId: "satellite",
  });
  heatmap = new google.maps.visualization.HeatmapLayer({
    data: getPoints(),
    map: map,
  });
}

function getPoints() {
  return [
    new google.maps.LatLng(38.946634360310554, -92.32871734781563),
    new google.maps.LatLng(38.946634360310554, -92.32871734781563),
    new google.maps.LatLng(38.946634360310554, -92.32871734781563),
    new google.maps.LatLng(38.946634360310554, -92.32871734781563),
    new google.maps.LatLng(38.946634360310554, -92.32871734781563),
    new google.maps.LatLng(38.946634360310554, -92.32871734781563),
    new google.maps.LatLng(38.946634360310554, -92.32871734781563),
    new google.maps.LatLng(38.946634360310554, -92.32871734781563),
    new google.maps.LatLng(38.946634360310554, -92.32871734781563),
    new google.maps.LatLng(38.946634360310554, -92.32871734781563),
    new google.maps.LatLng(38.95094258911137, -92.32635697640066),
    new google.maps.LatLng(38.95094258911137, -92.32635697640066),
    new google.maps.LatLng(38.95094258911137, -92.32635697640066),
    new google.maps.LatLng(38.95094258911137, -92.32635697640066),
    new google.maps.LatLng(38.95094258911137, -92.32635697640066),
    new google.maps.LatLng(38.95094258911137, -92.32635697640066),
    new google.maps.LatLng(38.95094258911137, -92.32635697640066),
    new google.maps.LatLng(38.95094258911137, -92.32635697640066),

  ];
}
