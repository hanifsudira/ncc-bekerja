<section class="invoice">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                </i><?php echo $query->nama." - ".$this->session->email?>
                <small class="pull-right">Date: <?php echo date("d/m/Y")?></small>
            </h2>
        </div>
    </div>
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <address>
                Deskripsi       : <?php echo $query->deskripsi?><br>
                Latitude        : <?php echo $query->lat?><br>
                Longitude       : <?php echo $query->lon?><br>
            </address>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                </i>Lokasi
            </h2>
        </div>
    </div>
    <div  class="row invoice-info">
        <div id="dvMap" style="auto; height: 400px">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                </i>File Pendukung
            </h2>
        </div>
    </div>
    <div  class="row invoice-info">
        <?php foreach($file as $fi){
            
            ?>
            <?php $path = base_url().'/'.$fi->path_file;
            if (sizeof(explode('\\',$fi->path_file))<3) {
                continue;
            }
            ?>
            <a href="<?php echo $path?>" download><?php echo explode('\\',$fi->path_file)[4]?></a><br>
        <?php }?>
    </div>
</section>

<script type="text/javascript">

        var lat=parseFloat(<?php echo $query->lat?>);
        var long=parseFloat(<?php echo $query->lon?>);

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
            function showPosition(position) {
                lat=parseFloat(<?php echo $query->lat?>);
                console.log(lat);
                long=parseFloat(<?php echo $query->lon?>);
                console.log(long);
                out_map();
            }
    
        function out_map(){
            var coords = new google.maps.LatLng(lat, long);
            var options = {
                zoom: 18,
                center: coords,
                mapTypeControl: false,
                navigationControlOptions: {
                    style: google.maps.NavigationControlStyle.SMALL
                },
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("dvMap"), options);
            var marker = new google.maps.Marker({
                position: coords,
                map: map,
                title:"You are here!"
            });
        }
</script>