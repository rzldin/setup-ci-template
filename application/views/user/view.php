<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormTittle">&nbsp;</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <form method="post" target="_self" name="formku" id="formku" class="eventInsForm">
                    <div class="form-row">
                        <div class="col-md-4 col-xs-4">
                            <label for="username" class="col-form-label">Username <font color="#f00">*</font></label>
                        </div>
                        <div class="col-md-8 col-xs-8">
                            <input type="text" name="username" id="username" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus placeholder="Username">
                            <input type="hidden" name="id" id="id">
                            
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-4 col-xs-4">
                            <label for="email" class="col-form-label">Email <font color="#f00">*</font></label>
                        </div>
                        <div class="col-md-8 col-xs-8">
                            <input type="email" name="email" id="email" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus placeholder="Email">
                            
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-4 col-xs-4">
                            <label for="name" class="col-form-label">Password <font color="#f00">*</font></label>
                        </div>
                        <div class="col-md-8 col-xs-4">
                            <input type="password" name="password" id="password" class="form-control" style="margin-bottom: 5px;" placeholder="*******">
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col-md-4 col-xs-4">
                            <label for="email" class="col-form-label">Deskripsi <font color="#f00">*</font></label>
                        </div>
                        <div class="col-md-8 col-xs-8">
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus placeholder="Deskripsi">
                            
                        </div>
                    </div>  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary" onclick="simpandata()"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Data Pengguna</h4>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
            <div class="table-responsive pt-3">
                <button class="btn btn-primary btn-sm float-left" onclick="tambahData()">Tambah</button>
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>username</th>
                            <th>password</th>
                            <th>Email</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($user as $u):?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $u->username?></td>
                            <td><?= $u->password?></td>
                            <td><?= $u->email?></td>
                            <td><?= $u->deskripsi?></td>
                            <td>
                                <a onclick="editData(<?= $u->id; ?>)" style="margin-bottom:4px;color:black;" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?= site_url('user/delete') ?>" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $u->id; ?>">
                                    <button class="btn btn-danger btn-sm tombol-hapus" style="margin-bottom:4px;" type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    var dsState;

    function tambahData() {
        $('#id').val('');
        $('#username').val('');
        $('#email').val('');
        $('#password').val('');
        $('#deskripsi').val('');
        dsState = "Input";
        $('#modalFormTittle').html('Tambah Data Pengguna');
        $('#myModal').modal('show', {backdrop: 'true'});
    }

    function simpandata() {
        if($.trim($('#username').val()) == ''){
            swal.fire({
                icon: "error",
                text: "Username tidak boleh kosong!",
                title: "error",
            });
        }
        else if($.trim($("#email").val()) == ''){
            swal.fire({
                icon: "error",
                text: "Email tidak boleh kosong!",
                title: "error",
            });
        }
        else if($.trim($("#password").val()) == ''){
            swal.fire({
                icon: "error",
                text: "Password tidak boleh kosong!",
                title: "error",
            });
        }
        else if($.trim($("#deskripsi").val()) == ''){
            swal.fire({
                icon: "error",
                text: "Deskripsi tidak boleh kosong!",
                title: "error",
            });
        } else {
            
            if (dsState == "Input") {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('user/cek_email') ?>",
                    data: {
                        data: $("#email").val()
                    },
                    success: function(result) {
                        if (result == "ADA") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Email sudah digunakan!',
                            });
                        } else {
                            $('#formku').attr("action", "<?= site_url('user/simpan') ?>");
                            $('#formku').submit();
                        }
                    }
                });
            } else {
                $('#formku').attr("action", "<?= site_url('user/update') ?>");
                $('#formku').submit();
            }
            
        };
    };

    function editData(id) {
        dsState = "Edit";
        $.ajax({
            type: "POST",
            url: "<?= site_url('user/get_edit'); ?>",
            data: {
                id: id
            },
            success: function(result) {
                $('#username').val(result['username']);
                $('#email').val(result['email']);
                $('#password').val('');
                $('#deskripsi').val(result['deskripsi']);
                
                $('#id').val(result['id']);

                $('#modalFormTittle').html('Edit Data User');
                $("#myModal").modal('show', {backdrop: 'true'});
            }
        })
    }

</script>