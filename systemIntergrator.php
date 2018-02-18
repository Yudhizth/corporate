<div class="signin-form">

	<div class="container form-signin">
     
        
       <form class="" method="post" id="sysForm" data-parsley-validate="">
      
        <h2 class="form-signin-heading">Request Perusahaan</h2><hr />
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
                    <input type="hidden" class="form-control" id="sysKodePerusahaan" name="sysKodePerusahaan" value="<?=$info['kode_perusahaan'];?>" readonly/>
                    <span id="check-e"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="txt_nama" id="sysName" value="<?=$info['nama_perusahaan']?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="txt_cp" id="sysCp" value="<?=$info['cp'];?>" >
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="txt_phone" id="sysPhone" value="<?=$info['phone'];?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="txt_email" id="sysEmail" value="<?=$info['email'];?>" />
                    <span id="check-e"></span>
                </div>
            <?php }else{ ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="sysKodePerusahaan" name="sysKodePerusahaan" value="NULL" readonly/>
                    <span id="check-e"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="txt_nama" id="sysName" data-parsley-minlength="5" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." placeholder="nama perusahaan" required />
                    <span id="check-e"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="txt_cp" id="sysCp" data-parsley-minlength="3" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 3 character.." placeholder="nama contact person" required />
                    <span id="check-e"></span>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="txt_phone" id="sysPhone" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." placeholder="nomor telphone" required />
                    <span id="check-e"></span>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="txt_email" id="sysEmail" placeholder="example@domain.com" required />
                    <span id="check-e"></span>
                </div>
            <?php } ?>
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="sys" class="btn btn-success">
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