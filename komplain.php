<?php

$sql = "SELECT * FROM tb_complain_perusahaan WHERE tb_complain_perusahaan.kode_perusahaan= :kode";

$stmt = $config->runQuery($sql);
$stmt->execute(array(':kode'    => $kode));


?>
<div class="signin-form" id="formComplain" style="margin-top: 1%;">

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
                    <div class="form-group">
                        <input type="text" class="form-control" name="txt_judul" id="kmpJudul" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." placeholder="komplain mengenai....." required />
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group">
                        <textarea cols="6" rows="5" class="form-control" name="txt_isi" id="kmpIsi" data-parsley-maxlength="1000" data-parsley-minlength-message="You need to enter at least a 5 character.." placeholder="penjelasan komplain..." required></textarea>

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

<div class="contain" id="listComplain">
	<h3 class="page-header">Komplain Perusahaan</h3>

        <button id="btnFormComplain" class="btn btn-xs btn-primary">Complain</button>
    <br/>
    <br/>
    <br/>
<table class="table table-hover table-bordered">
	<thead>
		<th>#</th>
		<th>Tanggal Komplain</th>
		<th>Mengenai</th>
		<th>Status</th>
		<th>Update On</th>
		<th>Details</th>
	</thead>
		<tbody>
           <?php 
           $i = 1;
           while($row = $stmt->fetch(PDO::FETCH_LAZY)){ 
               
            if(empty($row['status'])){
                $status = '<label class="label label-default">unset</label>';
            }elseif($row['status'] == '1'){
                $status = '<label class="label label-primary">Process</label>';
            }else{
                $status = '<label class="label label-success">Done</label>';
            }
               ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row['create_date']?></td>
                    <td style="text-transform: capitalize;"><?=$row['judul']?></td>
                    <td><?=$status?></td>
                    <td><?=$row['update_on']?></td>
                    <td>
                        <a href="?p=detailKomplain&kupon=<?=$row['kode_komplain']?>">
                        <button class="btn btn-xs btn-primary">Details</button>
                        </a>
                    </td>
                </tr>
           <?php }
           
           ?>
	</tbody>
</table>
</div>