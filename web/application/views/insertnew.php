<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Insert New</h3>
                </div>
                <form action="<?php echo base_url()?>tree/insertupload" enctype="multipart/form-data" method="post" role="form">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#data" data-toggle="tab">Item</a></li>
                            <li><a href="#location" data-toggle="tab">Lokasi</a></li>
                            <li><a href="#file" data-toggle="tab">File Pendukung</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Parent ID</label>
                                        <input type="text" class="form-control" placeholder="<?php echo $query;?>" value="<?php echo $query;?>" name="pid" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Serial Number</label>
                                        <input type="text" class="form-control" placeholder="Serial Number" name="sn" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="location">
                                <div class="box-body">
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
                                </div>
                            </div>
                            <div class="tab-pane" id="file">
                                <div class="box-body input_fields_wrap">
                                    <div class="form-group">
                                        <div class="col-xs-5">
                                            <input type="file" class="form-control" name="inputfile[]" />
                                        </div>
                                        <div class="col-xs-4">
                                            <button class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                //console.log(lat);
                long=position.coords.longitude;
                //console.log(long);
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

            google.maps.event.trigger(map, 'resize');

            if(coords){
                document.getElementById("lat").value = lat;
                document.getElementById("lon").value = long;
            }


            $('a[href="#location"]').on('shown', function(e) {
                google.maps.event.trigger(map, 'resize');
            });
        }

        var max_fields = 5;
        var wrapper = (".input_fields_wrap");
        var add = (".addButton");
        var x = 1;

        $(add).on("click",function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                $(wrapper).append(
                    '<div class="form-group">' +
                        '<div class="col-xs-5">' +
                            '<input type="file" class="form-control" name="inputfile[]" />' +
                        '</div>'+
                        '<div class="col-xs-4">'+
                            '<button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>'+
                        '</div>'+
                    '</div>'
                );
            }
        });

        $(wrapper).on("click",".removeButton", function(e){
            e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
        });

    });
</script>

