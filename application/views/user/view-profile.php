    <div class="container"> 
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <hr class="my-0" />
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
          <?php $profile=$user->row_array(); ?>
          <div class="card-body">
            <form id="formAccountSettings" action="<?= site_url('admin/user/save') ?>" method="post">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="username" class="form-label">Username</label>
                  <input class="form-control" type="text" id="username" name="username" value="<?= $profile['username']; ?>"autofocus readonly/>
                  <input type="hidden" id="user_id" name="user_id" value="<?= $profile['user_id']?>">
                </div>

                <div class="mb-3 col-md-6">
                  <label for="lastName" class="form-label">Fullname</label>
                  <input class="form-control" type="text" name="fullname" id="fullname" value="<?= $profile['fullname']?>" />
                </div>
                
                <div class="mb-3 col-md-6">
                  <label for="state" class="form-label">Email</label>
                  <input class="form-control" type="email" id="email" name="email" placeholder="" value="<?= $profile['email']?>"/>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom:4px;color:white">Save</button>
              <a href="javascript:;" onclick="editData(<?= $profile['user_id']?>)" style="margin-bottom:4px;color:white;" class="btn btn-dark btn-sm">Change Passsowrd</a>
              <a class="btn btn-warning btn-sm tombol-reset" href="<?= site_url('admin/user/reset/'.$profile['user_id'])?>" style="margin-bottom:4px;color:white;" >Reset Password</a>  
            </form>
          </div>
        </div>
    </div>

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
                        <div class="form-row mt-2">
                            <div class="col-md-4 col-xs-4">
                                <label for="password" class="col-form-label">Password <font color="#f00">*</font></label>
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <input type="password" name="password" id="password" style="margin-bottom: 5px;" class="form-control">
                                <input type="hidden" name="user_id" id="user_id">
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col-md-4 col-xs-4">
                                <label for="password_confirmation" class="col-form-label">Confirm Password <font color="#f00">*</font></label>
                            </div>
                            <div class="col-md-8 col-xs-4">
                                <input type="password" name="password_confirmation" id="password_confirmation" style="margin-bottom: 5px;" onkeyup="cekPassword(this.value)" class="form-control">
                                <p class="text-muted" id="passwordWarning" style="display: none;">Password tidak sesuai</p>
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

<script>
    var dsState;
    
    function simpandata() {
        // let password = $('#password').val();
        // console.log(password);
        
        if ($.trim($("#password").val()) == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Password tidak boleh kosong!',
            });
        }
        else if ($.trim($("#password_confirmation").val()) == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Confirm Password tidak boleh kosong!',
            });
        }
        else if ($.trim($("#password").val()) != $.trim($("#password_confirmation").val())) {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Confirm Password tidak sesuai!',
            });
        
        }else{   
            /** Fungsi save yang di jalankan, jika kondisi dsState = "Input" */
            if(dsState == "Input"){
                $('#formku').attr("action", "<?= site_url('admin/user/save') ?>");
                $('#formku').submit();
            }
            /** Fungsi update yang di jalankan, jika kondisi dsState = "Edit" */
            else{
                $('#formku').attr("action", "<?= site_url('admin/user/update_password') ?>");
                $('#formku').submit();
            }    
        }
    };

    function cekPassword(value) {
        const password = $('#password').val();
        const check = $('#password_confirmation').val();
        if (password != check) {
            $('#password_confirmation').css({
                'background-color': '#ffc89e'
            });
            $('#passwordWarning').show();
        } else {
            $('#password_confirmation').css({
                'background-color': '#ffffff'
            });
            $('#passwordWarning').hide();
        }
    };

    function editData(user_id) { 
        //alert('test')
        dsState = "Edit";
        $.ajax({
            type: "POST",
            url: "<?= site_url('admin/user/getAdmin'); ?>",
            data: {
                id: user_id
            },
            success: function(result) {

                $('#user_id').val(result['user_id']);
                $('#password').val(result['']);

                $('#modalFormTittle').html('Edit Data Password');
                $("#myModal").modal('show', {backdrop: 'true'});
            }
        })
    }
</script>