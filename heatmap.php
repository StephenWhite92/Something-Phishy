<!DOCTYPE html>
<html>
  <head>
    <title>Heatmaps</title>
    <link rel="stylesheet" type="text/css" href="heatmapSS.css"/>
    <script src="heatmap.js"></script>
  </head>
  <body>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKNnmc30rVQJQ8MhZ2AZ4mvYHzTGI3jAU&callback=initMap&libraries=visualization&v=weekly"
      async
    ></script>
  </body>
</html>