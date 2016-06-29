<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit New</h3>
                </div>
                <form action="<?php echo base_url()?>tree/insertupload" enctype="multipart/form-data" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="<?php echo $query->nama;?>" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" placeholder="<?php echo $query->deskripsi;?>" name="deskripsi" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" class="form-control" id="lat" name="latitude" >
                        </div>
                        <div class="form-group">
                            <label>longitude</label>
                            <input type="text" class="form-control" id="lon" name="longitude" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Location</label>
                            <div id="dvMap" class="form-control" style="auto; height: 400px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Input Gambar</label>
                            <input type="file" name="path_gambar" required>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAoc-YJOyHqg7eAQCJnIDPRfNZLvSwRfo0"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        var lat=0.0;
        var long=0.0;
        window.onload = function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
            function showPosition(position) {
                lat=position.coords.latitude;
                console.log(lat);
                long=position.coords.longitude;
                console.log(long);
                out_map();
            }
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
            if(coords){
                document.getElementById("lat").value = lat;
                document.getElementById("lon").value = long;
            }
        }
    });
</script>

