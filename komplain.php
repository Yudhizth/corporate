<div class="signin-form">

    <div class="container form-signin">


        <form class="" method="post" id="formKomplain" data-parsley-validate="">

            <h2 class="form-signin-heading">Komplain Perusahaan</h2><hr />
            <div id="error">
                <?php
                if(isset($error))
                {
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
                        <input type="text" class="form-control" name="txt_nama" id="txtName" value="<?=$info['nama_perusahaan']?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="txt_cp" id="txtCp" value="<?=$info['cp'];?>" >
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="txt_phone" id="txtPhone" value="<?=$info['phone'];?>">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="txt_email" id="txtEmail" value="<?=$info['email'];?>" />
                        <span id="check-e"></span>
                    </div>
                <?php }else{ ?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="txt_nama" id="kmpName" data-parsley-minlength="5" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." placeholder="nama perusahaan yang terdaftar" required />
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="txt_cp" id="kmpCp" data-parsley-minlength="3" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 3 character.." placeholder="nama contact yang terdaftar" required />
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="txt_phone" id="kmpPhone" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." placeholder="nomor telphone yang terdaftar" required />
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="txt_email" id="kmpEmail" placeholder="example@domain.com" required />
                        <span id="check-e"></span>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="txt_judul" id="kmpJudul" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." placeholder="komplain mengenai....." required />
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group">
                        <textarea cols="6" rows="5" class="form-control" name="txt_isi" id="kmpIsi" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." placeholder="penjelasan komplain..." required></textarea>

                    </div>
                <?php } ?>
            </div>

            <hr />

            <div class="form-group">
                <button type="submit" name="komplain" class="btn btn-success">
                    <i class="glyphicon glyphicon-send	"></i> &nbsp; Ajukan Komplain
                </button>
            </div>

        </form>
    </div>

</div>