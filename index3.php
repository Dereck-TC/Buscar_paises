<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>
  <head>
    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="module" src="index.js"></script>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div class="form-group" id="container">
        <form action="" class="" method="get">
            <table border="0" align="center">
                <tr>
                    <td colspan="2">
                        <h2>Ingrese Dato</h2>
                    </td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="txtnom" class="form-control" placeholder="Ingrese País" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="boton" class="btn btn-primary btn-lg" value="Enviar" ></td>
                    <!-- onclick="obtenerDatos()" -->
            </table>
        </form>
    </div>
    <?php
    $lat = "";
    $lng = "";
    $country = "";
    if (isset($_GET['txtnom'])) {
        $dir = $_GET['txtnom'];
        $api = "YOUR_API_KEY";
        $url = "https://maps.googleapis.com/maps/api/geocode/json?components=country:" . $dir . "&key=" .$api;
        $json = file_get_contents($url);
        $datos = json_decode($json, true);

        $lat = $datos["results"][0]["geometry"]["location"]["lat"];
        $lng = $datos["results"][0]["geometry"]["location"]["lng"];
        $country = $datos["results"][0]["address_components"][0]["long_name"];
    }
    ?>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-header text-center">
                País: <?php echo $country; ?>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Latitud: <span  id="lt"><?php echo $lat; ?></span></li>
                <li class="list-group-item">Longitud: <span  id="lg"><?php echo $lng ?></span> </li>
            </ul>
        </div>
    </div>
    <div id="map"></div>

    <!-- 
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
  
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
</script>
    
  </body>
</html>