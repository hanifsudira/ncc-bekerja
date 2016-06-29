<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="form-group">
        <label>Cari</label>
          <input class="search-input form-control"></input>
      </div>
      <br>
      <div id="jstree"></div>
    <div class="col-md-12">
  </div>
</section>
<script>
  $(function() {
    $(".search-input").keyup(function() {
      var searchString = $(this).val();
      $('#jstree').jstree('search', searchString);
    });
    $("#jstree").jstree("remove", $("#1"));

    $('#jstree').jstree({
      'core': {
        'data': <?php echo $test;?>
      },
      "search": {
        "case_insensitive": true,
        "show_only_matches" : true
      },
      "plugins": ["search","wholerow"]
    });

  });

$(window).load(function(){
    var root_id="<?php echo $this->session->root;?>";
    $("#jstree ul li").each(function(){
      console.log(this);
      if (this.id!=root_id) {
        // $(this).remove();
      };
    });
});
</script>