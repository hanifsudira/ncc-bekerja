<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAoc-YJOyHqg7eAQCJnIDPRfNZLvSwRfo0"></script>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="form-group">
        <label>Cari</label>
          <input class="search-input form-control"></input>
      </div>
      <br>
      <div class="row col-xs-12">
		<div class="col-xs-7">
			<center>
			  <h4>Hirarchy Item</h4>
			</center>
			<div id="jstree"></div>
		</div>
		  <div class="col-xs-5" style="" id="detail">
			<center>
			  <h4>Detail Item</h4>
			</center>
			<div class="loader" style="display:none">Loading...</div>
			<div class="col-xs-12" id="detailText"></div>
		  </div>
      </div>
    <div class="col-md-12">
  </div>
</section>
<script>
  $(function() {
    $(".search-input").keyup(function() {
      var searchString = $(this).val();
      $('#jstree').jstree('search', searchString);
    });
    $('#jstree').jstree({
      'core': {
		'data' : {
			'dataType': 'json',
			'type' : 'get',
			'url' : function(node){
				if(node.id === "#") {
					return "<?php echo base_url()?>"+"tree/getparentitem";
				}
				else{					
					return "<?php echo base_url()?>"+"tree/getitembyid";
				}
			},	
			'success' : function(data){
				return data;
			},
			'data' : function (node) {
				return { 'id' : node.id };
			}
		}
      },
      'plugins': ["search","json_data","wholerow","contextmenu","dnd","state","cookies"],
	  'cookies' : { cookie_options : { path : '/' } },
      'search': {
        "case_insensitive": true,
        "show_only_matches" : true
      },
      "contextmenu": {
        "items": function ($node) {
          return {
            "Create": {
              "label": "Add New Child",
              "action": function (obj) {
                var id = obj.reference.prevObject.selector;
                id = id.replace('#','');
                var url = "<?php echo base_url()?>"+"tree/insertnew/"+id;
                window.location = url;
              }
            },
            "Edit": {
              "label": "Edit Item",
              "action": function (obj) {
                var id = obj.reference.prevObject.selector;
                id = id.replace('#','');
                var url = "<?php echo base_url()?>"+"tree/edit/"+id;
                window.location = url;
              }
            },
            "Delete": {
              "label": "Delete Item",
              "separator_after"   : true,
			  "action": function (obj) {
                var id = obj.reference.prevObject.selector;
                id = id.replace('#','');
                if(id==1){
					alertify.alert("Root Item Tidak Dapat Dihapus!!");
				}
				else{
					alertify.confirm("Hapus Item?",
                    function(){
						  var url = "<?php echo base_url()?>"+"tree/hapus/"+id;
						  window.location = url;
						},
						function(){
						  alertify.error('Cancel');
					});
				}
              }
            },
			"Uplevel": {
              "label": "Up One Level",
              "action": function (obj) {
                var id = obj.reference.prevObject.selector;
                id = id.replace('#','');
				alertify.confirm("Yakin Menaikan Level Item?",
				function(){
					  var url = "<?php echo base_url()?>"+"tree/uplevel/"+id;
					  window.location = url;
					},
					function(){
					  alertify.error('Cancel');
				});
              }
            },
			"MoveUp": {
              "label": "Move Up",
              "action": function (obj) {
                var id = obj.reference.prevObject.selector;
                id = id.replace('#','');
              }
            },
			"MoveDown": {
              "label": "Move Down",
              "action": function (obj) {
                var id = obj.reference.prevObject.selector;
                id = id.replace('#','');
              }
            }
          };
        }
      }
    });
  });

$("#jstree").on('click',"li",function(){
  var id=this.id;
  var url="<?php echo base_url()?>tree/lihat/"+id;
  console.log($(this).attr('aria-selected'))  ;
  
  if ($(this).attr('aria-selected')=='false') {
    return false;
  };
  $(".loader").show();
   $.ajax({
        url: url,
        type: "get",
        success: function (response) {
          $(".loader").hide();
          $("#detailText").html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
});
</script>
