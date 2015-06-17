<!DOCTYPE html >
<head>
  <title</title>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <script type="text/javascript">
    //<![CDATA[
    var map = null;
    var customIcons = {
      restaurant: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
      },
      bar: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
      }
    };
    function load() {
	  var center_lat = 44.767742; // replace with user session data $_SESSION['lat'] when integrating
	  var center_lng = -93.277723; // replace with user session data  $_SESSION['lng'] when integrating
      var center = new google.maps.LatLng(center_lat, center_lng);
      map = new google.maps.Map(document.getElementById("map"), {
        center: center,
        zoom: 11,
        mapTypeId: 'roadmap'
      });
    }
    function bindInfoWindow(marker, map, infoWindow, html) {
     google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
    function searchLocations(){
      var infoWindow = new google.maps.InfoWindow;
      var search_term = document.getElementById('search-term').value;
      jQuery.ajax({
        dataType :'xml', 
        type: 'GET',
        url : 'msearchdb.php?search_term='+search_term, 
        success:function(data){
          var markers = data.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < markers.length; i++) {
            var name = markers[i].getAttribute("name");
            var address = markers[i].getAttribute("address");
            var type = markers[i].getAttribute("type");
            var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
            var html = '<p><a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
			name + '</a></b> <br/>' + address;
      		var icon = customIcons[type] || {};
            var marker = new google.maps.Marker({
              map: map,
              position: point,
			  icon: icon.icon
            });
			google.maps.event.addListener(markers[i], 'click', function(){
                window.location.href = markers[i].url;
    });
            bindInfoWindow(marker, map, infoWindow, html);
          }
        }});
      return false;
    }
    //]]>
  </script>
</head>
<body onload="load()">
 <p>Enter your radius for your tenant search (in miles).
  <form id="search-form" method="post" action="msearchdb.php"> 
   <input type="float" name="search" size="3" id="search-term"/>
   <input type="button" value="Search" onclick="searchLocations();" />
 </form>
</p>
<div id="map" style="width: 600px; height: 400px"></div>
</body>
</html>