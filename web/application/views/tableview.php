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
                            <th>Parent ID</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($query as $data){?>
                        <tr>
                            <td><?php echo $data->id?></td>
                            <td><?php echo $data->nama?></td>
                            <td><a href="#" class="btn btn-primary btn-xs">Lihat</a></td>
                            <td>
                                <a href="#" class="btn btn-danger btn-xs">Hapus</a>
                                <a href="#" class="btn btn-success btn-xs">Edit</a>
                            </td>
                            <td>
                                <?php
                                    if($data->parent_id == 0)
                                        echo "#";
                                    else
                                        echo $data->parent_id;
                                ?>
                            </td>
                        </tr>
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
    });
</script>