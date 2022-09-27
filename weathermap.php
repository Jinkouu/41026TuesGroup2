<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="design.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&family=Zen+Loop:ital@1&display=swap" rel="stylesheet">
        <title>Home</title>

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDguRKIVnVT1wacnF2DTownInQqkZVLjy0">
        </script>
        <script>
          var map;
          var geoJSON;
          var request;
          var gettingData = false;
          var openWeatherMapKey = "3794141fe0cac15a9225a73d70d21ce8"
        
          function initialize() {
            var mapOptions = {
              zoom:11,
              center: new google.maps.LatLng(-33.9075416,151.026306)
            };
        
            map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

            var myMapType = new google.maps.ImageMapType({
               getTileUrl: function(coord, zoom) {
                   //return "http://maps.owm.io:8091/56ce0fcd4376d3010038aaa8/" + zoom + "/" + coord.x + "/" + coord.y + "?hash=5";
                   return "https://tile.openweathermap.org/map/precipitation_new/" + zoom + "/" + coord.x + "/" + coord.y + ".png?appid=" + openWeatherMapKey;
               },
               tileSize: new google.maps.Size(256, 256),
               maxZoom: 9,
               minZoom: 0,
               name: 'mymaptype'
            });

            map.overlayMapTypes.insertAt(0, myMapType);

            // Add interaction listeners to make weather requests
            google.maps.event.addListener(map, 'idle', checkIfDataRequested);
        
            // Sets up and populates the info window with details
            map.data.addListener('click', function(event) {
              infowindow.setContent(
               "<img src=" + event.feature.getProperty("icon") + ">"
               + "<br /><strong>" + event.feature.getProperty("city") + "</strong>"
               + "<br />" + event.feature.getProperty("temperature") + "&deg;C"
               + "<br />" + event.feature.getProperty("weather")
               );
              infowindow.setOptions({
                  position:{
                    lat: event.latLng.lat(),
                    lng: event.latLng.lng()
                  },
                  pixelOffset: {
                    width: 0,
                    height: -15
                  }
                });
              infowindow.open(map);
            });
          }
      
          var checkIfDataRequested = function() {
            // Stop extra requests being sent
            while (gettingData === true) {
              request.abort();
              gettingData = false;
            }
            getCoords();
          };
      
          // Get the coordinates from the Map bounds
          var getCoords = function() {
            var bounds = map.getBounds();
            var NE = bounds.getNorthEast();
            var SW = bounds.getSouthWest();
            getWeather(NE.lat(), NE.lng(), SW.lat(), SW.lng());
          };
      
          // Make the weather request
          var getWeather = function(northLat, eastLng, southLat, westLng) {
            gettingData = true;
            var requestString = "http://api.openweathermap.org/data/2.5/box/city?bbox="
                                + westLng + "," + northLat + "," //left top
                                + eastLng + "," + southLat + "," //right bottom
                                + map.getZoom()
                                + "&cluster=yes&format=json"
                                + "&APPID=" + openWeatherMapKey;
            request = new XMLHttpRequest();
            request.onload = proccessResults;
            request.open("get", requestString, true);
            request.send();
          };
      
          // Take the JSON results and proccess them
          var proccessResults = function() {
            console.log(this);
            var results = JSON.parse(this.responseText);
            if (results.list.length > 0) {
                resetData();
                for (var i = 0; i < results.list.length; i++) {
                  geoJSON.features.push(jsonToGeoJson(results.list[i]));
                }
                drawIcons(geoJSON);
            }
          };
      
          var infowindow = new google.maps.InfoWindow();
      
          // For each result that comes back, convert the data to geoJSON
          var jsonToGeoJson = function (weatherItem) {
            var feature = {
              type: "Feature",
              properties: {
                city: weatherItem.name,
                weather: weatherItem.weather[0].main,
                temperature: weatherItem.main.temp,
                min: weatherItem.main.temp_min,
                max: weatherItem.main.temp_max,
                humidity: weatherItem.main.humidity,
                pressure: weatherItem.main.pressure,
                windSpeed: weatherItem.wind.speed,
                windDegrees: weatherItem.wind.deg,
                windGust: weatherItem.wind.gust,
                icon: "http://openweathermap.org/img/w/"
                      + weatherItem.weather[0].icon  + ".png",
                coordinates: [weatherItem.coord.Lon, weatherItem.coord.Lat]
              },
              geometry: {
                type: "Point",
                coordinates: [weatherItem.coord.Lon, weatherItem.coord.Lat]
              }
            };
            // Set the custom marker icon
            map.data.setStyle(function(feature) {
              return {
                icon: {
                  url: feature.getProperty('icon'),
                  anchor: new google.maps.Point(25, 25)
                }
              };
            });
        
            // returns object
            return feature;
          };
      
          // Add the markers to the map
          var drawIcons = function (weather) {
             map.data.addGeoJson(geoJSON);
             // Set the flag to finished
             gettingData = false;
          };
      
          // Clear data layer and geoJSON
          var resetData = function () {
            geoJSON = {
              type: "FeatureCollection",
              features: []
            };
            map.data.forEach(function(feature) {
              map.data.remove(feature);
            });
          };
      
          google.maps.event.addDomListener(window, 'load', initialize);
        </script>

    </head>
    <body>
        <!-- navigation bar -->
        <nav>
            <h1>Weather</h1>
            <div class="container">
                <div class="hyperlinks">
                    <a href="index.php">Home</a>
                    <a href="daily.php">Daily</a>
                    <a href="#">10-Days</a>
                    <a href="#">Monthly</a>
                    <a href="tempConvert.php">Temperature Converter</a>
                    <a href="#">Weather Map</a>
                    <a href="feedback.php">Feedback</a>
                </div>
                <div class ="dropdown">
                    <button class ="dropbtn"><span class="material-symbols-outlined">person</span></button>
                    <div class = "dropdown-content">
                    <?php
                            if(!isset($_SESSION['id'])) { ?>    
                                <a href="login.php">Login</a>
                                <a href="register.php">Signup</a>
                            <?php } 
                            else{ ?>
                                <a href="home.php">Home</a>
                                <a href="logout.php">Log out</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navigation bar -->

        <!-- google map api  AIzaSyDguRKIVnVT1wacnF2DTownInQqkZVLjy0-->
        <!-- openmap api  3794141fe0cac15a9225a73d70d21ce8-->

        <div id="map-canvas"></div>

    </body>
    
</html>