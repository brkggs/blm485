/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
      function initialize() {
        var mapOptions = {
          zoom: 16,
          center: new google.maps.LatLng(39.921487,32.853964),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map_canvas'),
            mapOptions);

        var panoramioLayer = new google.maps.panoramio.PanoramioLayer();
        panoramioLayer.setMap(map);
        
        var photoPanel = document.getElementById('photo-panel');
        map.controls[google.maps.ControlPosition.RIGHT_TOP].push(photoPanel);

        google.maps.event.addListener(panoramioLayer, 'click', function(photo) {
          var li = document.createElement('li');
          var link = document.createElement('a');
          link.innerHTML = photo.featureDetails.title + ': ' +
              photo.featureDetails.author;
          link.setAttribute('href', photo.featureDetails.url);
          li.appendChild(link);
          photoPanel.appendChild(li);
          photoPanel.style.display = 'block';
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);