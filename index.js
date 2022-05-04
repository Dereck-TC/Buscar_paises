// Initialize and add the map
let lt = parseFloat(document.getElementById("lt").innerHTML);
let lg = parseFloat(document.getElementById("lg").innerHTML);

function initMap() {
    // The location of Uluru
    const uluru = { lat: lt, lng: lg };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }
  
  window.initMap = initMap;
 
//   function obtenerDatos(){
//     let lg = parseFloat(document.getElementById("lg").innerHTML);
//     var lt = parseFloat(document.getElementById("lt").innerHTML);
//     initMap(lt,lg);
//   }
//   window.initMap = obtenerDatos();