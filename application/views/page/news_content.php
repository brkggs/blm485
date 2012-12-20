<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.mapbox.js"></script>
<script type="text/javascript" src="/assets/js/jquery.mousewheel.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/mapbox.css">
<div class="mapwrapper">
    <div id="viewport">
      <div style="background: url(/assets/imgs/layer1.png) no-repeat; width: 469px; height: 400px;"> 
      </div> 
      <div style="height: 1097px; width: 1286px;"> 
          <img src="/assets/imgs/layer2.jpg" alt="" /> 
      </div> 
      <div style="height: 1794px; width: 2104px;"> 
          <img src="/assets/imgs/layer3.jpg" alt="" /> 
      </div> 
      <div style="height: 2492px; width: 2922px;"> 
          <img src="/assets/imgs/layer4.jpg" alt="" /> 
      </div> 
    </div>
    
    <script type="text/javascript"> 
        $(document).ready(function() { 
            $("#viewport").mapbox({mousewheel: true});
        }); 
    </script>
</div>