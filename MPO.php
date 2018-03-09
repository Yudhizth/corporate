
<style type="text/css">
    .modal-sm {
    width: 500px;
}
</style>
<div class="signin-form">

	<div class="container form-signin">

        <h2 class="form-signin-heading">Pendaftaran Perusahaan</h2><hr />
        <p>
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addListMPO">+ add</button>
        </p>
        <div id="listLowongan">

        </div>
       <form class="" method="post" id="MPOform" data-parsley-validate="">


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
                    <input type="hidden" class="form-control" id="mpoKodePerusahaan" name="mpoKodePerusahaan" value="<?=$info['kode_perusahaan'];?>" readonly/>
                    <span id="check-e"></span>
                </div>
            <?php }else{ ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="mpoKodePerusahaan" name="mpoKodePerusahaan" value="" readonly/>
                    <span id="check-e"></span>
                </div>
            <?php } ?>

        	<div class="form-group">
			        <input type="hidden" class="form-control" name="txt_kd" id="mpoKode" value="<?php echo $kodeMPO; ?>" />
			        <span id="check-e"></span>
	        </div>

	        <div class="form-group">
			        <input type="text" class="form-control" name="txt_nama" id="mpoNama" placeholder="nama perusahaan" value="<?=$info['nama_perusahaan'];?>" required />
			        <span id="check-e"></span>
	        </div>
	        <div class="form-group">
			        <input type="text" class="form-control" name="txt_cp" id="mpoCp" value="<?=$info['cp'];?>" placeholder="nama contact person" required />
			        <span id="check-e"></span>
	        </div>
	        <div class="form-group">
			        <input type="number" class="form-control" name="txt_phone" id="mpoPhone" value="<?=$info['phone'];?>" placeholder="nomor telphone" required />
			        <span id="check-e"></span>
	        </div>
	        <div class="form-group">
			        <input type="email" class="form-control" name="txt_email" id="mpoEmail" value="<?=$info['email'];?>" placeholder="example@domain.com" required />
			        <span id="check-e"></span>
	        </div>
        </div>

     	<hr />

        <div class="form-group">
            <button type="submit" name="ajukanMPO" class="btn btn-success">
                	<i class="glyphicon glyphicon-send	"></i> &nbsp; Ajukan Kebutuhan
            </button>
        </div>
        <hr>
      	<br />

      </form>
        <?php if(isset($_SESSION['kode_session'])){}else{ ?>
    <label>Jika perusahaan anda telah Terdaftar, <a href="sign-up.php"><button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-log-in"></span> Masuk</button></a></label>
        <?php } ?>
    </div>

</div>
