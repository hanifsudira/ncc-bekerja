<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New user</h3>
                </div>
                <form action="<?php echo base_url()?>auth/registerprocess" id="myform" method="post" role="form">
                    <div class="active tab-pane" id="data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Assign Item</label>
                                <select class="form-control select2" name="id">
                                    <?php foreach($query as $value){?>
                                        <option value="<?php echo $value->id?>"><?php echo $value->id?>-<?php echo $value->nama?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                            </div>
                            <div class="form-group">
                                <label>Re-Password</label>
                                <input type="password" class="form-control" placeholder="Re-Password" name="repassword" id="repassword" required>
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
<script type="text/javascript">
<?php if($error=="error"){?>
        alertify.error('Username Sudah Terdaftar');
<?php }elseif($error=="ok") {?>
        alertify.success('Berhasil Menambahkanhkan User');
<?php }?>
</script>

