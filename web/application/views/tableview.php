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
                            <th>Nama</th>
                            <th>Detail</th>
                            <th>Aksi</th>
                            <th>Parent Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($query as $data){?>
                            <?php if($data->parent_id){?>
                                <tr>
                                    <td><?php echo $data->id?></td>
                                    <td><?php echo $data->nama?></td>
                                    <td><a href="<?php echo base_url()?>tree/lihat/<?php echo $data->id?>" class="btn btn-primary btn-xs">Lihat</a></td>
                                    <td>
                                        <a href="<?php echo base_url()?>tree/hapus/<?php echo $data->id?>" class="btn btn-danger btn-xs hapus">Hapus</a>
                                        <!--<a href="<?php /*echo base_url()*/?>tree/edit/<?php /*echo base64_encode($data->id)*/?>" class="btn btn-success btn-xs">Edit</a>-->
                                    </td>
                                    <td><?php echo $data->parent_name;?></td>
                                </tr>
                            <?php }?>
                        <?php }?>
                        </tbody>
                    </table>
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
</script>