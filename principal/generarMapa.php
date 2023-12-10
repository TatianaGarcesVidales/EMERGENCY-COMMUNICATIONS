 <!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 50%;
       }
    </style>
  </head>
  <body>
<?php
require_once "../includes/conexion.php";  // Conexión tiene la información sobre la conexión de la base de datos.
// Convierte el número del dispositivo en una cadena
$codigoDispositivo = strval($numeroDispositivo);

// Realiza la consulta
$sql = "SELECT latitud, longitud
        FROM ubicaciones
        WHERE codigoDispositivo = '$codigoDispositivo'
        ORDER BY id DESC
        LIMIT 1";

$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

$latitud = $row['latitud'];
$longitud = $row['longitud'];

?>

    <h3>My Google Maps</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var latit= <?php echo $latitud ?>;
        var longi= <?php echo $longitud ?>;
        var uluru = {lat: latit, lng: longi};
        
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"> 
    //<!-- Se deben reemplazar el espacio vacio por la API Key de Google MAPS, si se quiere ver el mapa sin el mensaje de "For development purposes only"-->
    </script>
  </body>
</html>