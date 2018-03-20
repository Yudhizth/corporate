<div class="signin-form">

    <div class="container form-signin">


        <form class="" method="post" id="PBOform" data-parsley-validate="">

            <h2 class="form-signin-heading">Pendaftaran Perusahaan</h2>
            <hr/>
            <div id="error">
                <?php
                if (isset($error)) {
                    ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i><strong> &nbsp; <?php echo $error; ?> !</strong>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="form-group">
                <?php if(isset($_SESSION['kode_session'])){ ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="txtKodePerusahaan" name="txtKodePerusahaan" value="<?=$info['kode_perusahaan'];?>" readonly/>
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="txt_nama" id="kstNama" value="<?=$info['nama_perusahaan'];?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="txtProject" name="txt_project" placeholder="nama project" data-parsley-minlength="5" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." required/>
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="txt_cp" id="kstCp" value="<?=$info['contact_person'];?>">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="txt_phone" id="kstPhone" value="<?=$info['nomor_hp'];?>">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="txt_email" id="kstEmail"  value="<?=$info['email'];?>">
                    </div>
                <?php }else{ ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="txtKodePerusahaan" name="txtKodePerusahaan" value="" readonly/>
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="txtProject" name="txt_project" placeholder="nama project" data-parsley-minlength="5" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." required/>
                        <span id="check-e"></span>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="txtNama" name="txt_nama" placeholder="nama perusahaan" data-parsley-minlength="5" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." required/>
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="txtCp" name="txt_cp" placeholder="nama contact person" data-parsley-minlength="3" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 3 character.." required/>
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="txtPhone" name="txt_phone" placeholder="nomor telphone" data-parsley-minlength="5" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." required/>
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="txtEmail" name="txt_email" placeholder="example@domain.com"
                               required/>
                        <span id="check-e"></span>
                    </div>
               <?php } ?>


            </div>

            <hr/>

            <div class="form-group">
                <button type="submit" name="ajukanBPO" class="btn btn-success">
                    <i class="glyphicon glyphicon-send	"></i> &nbsp; Ajukan Kebutuhan
                </button>
            </div>
            <hr>
            <br/>

        </form>
        <?php if(isset($_SESSION['kode_session'])){ }else{ ?>
        <label>Jika perusahaan anda telah Terdaftar, <a href="sign-up.php">
                <button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>
            </a></label>
        <?php } ?>
    </div>

</div>