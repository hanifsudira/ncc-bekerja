<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Table View</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Type</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($type as $data){?>
                                <tr>
                                    <td><?php echo $data->id_type?></td>
                                    <td><?php echo $data->nama_type?></td>
                                    <td>
                                        <a href="<?php echo base_url()?>type/hapus/<?php echo $data->id_type?>" class="btn btn-danger btn-xs hapus">Hapus</a>
                                        <button class="btn btn-success btn-xs edit">Edit</button>
                                    </td>
                                </tr>
                        <?php }?>
                        </tbody>
                    </table>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add Type</button>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $("#example1").DataTable( {
            responsive: true
        } );
        $(".hapus").click(function() {
            return confirm("Yakin Akan Menghapus?");
        });
    });
    $("table").on("click",".edit",function(){
        var tr=$(this).closest('tr').find('td');
        $("#editType [name='id_type']").val($(tr[0]).text());
        $("#editType [name='nama_type']").val($(tr[1]).text());
        $("#editType").modal('show');
    });
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?php echo base_url()?>type/add" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Type</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label>Type Name</label>
                <input type="text" class="form-control" name="nama_type" >
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Type</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?php echo base_url()?>type/update" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label>Type Name</label>
                <input type="hidden" class="form-control" name="id_type" >
                <input type="text" class="form-control" name="nama_type" >
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit Type</button>
      </div>
    </form>
    </div>
  </div>
</div>