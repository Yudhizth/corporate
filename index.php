<?php 

require_once 'header.php';
require_once 'class.user.php';

$set = new USER();
$kodeMPO = $set->generateRandomString(24);

$query = "SELECT * FROM tb_jenis_pekerjaan";
$listMPO = $set->runQuery($query);
$listMPO->execute();


//if (isset($_POST['cekKebutuhan'])) {
//	# code...
//	$kode = $_POST['txt_kode'];
//	if ($kode == '0') {
//		# code...
//		$error = "Pilih salah satu jenis Kebutuhan";
//	}elseif($_POST['check'] == "")
//    {
//        $error = "Please Checkbox Persetujuan";
//
//    }
//    else
//    {
//
//        $jenis = $_POST['txt_kode'];
//        echo $jenis;
//
//        switch ($jenis)
//        {
//            case "BPO01":
//            header('Location: pengajuan.php?p=bpo');
//            break;
//            case "MPO01":
//            header('Location: pengajuan.php?p=mpo');
//            session_start();
//            $_SESSION['kode'] = $kodeMPO;
//            break;
//            case "SYG01":
//            header('Location: pengajuan.php?p=sys');
//            break;
//            case "KST01":
//            header('Location: pengajuan.php?p=kst');
//            break;
//            default:
//            header('Location: pengajuan.php?p=default');
//        }
//
//	}
//}
$upass = "admin123";
$new_password = password_hash($upass, PASSWORD_DEFAULT);

?>

    <div class="signin-form" id="categoryType">

        <div class="container form-signin">


            <form class="" method="post" id="kebutuhanForm" data-parsley-validate="">

                <h2 class="form-signin-heading">Pilih Jenis Kebutuhan</h2>
                <hr/>
                <div id="error">
                    <?php
                    if (isset($error)) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <i class="glyphicon glyphicon-warning-sign"></i><strong> &nbsp; <?php echo $error; ?>
                                !</strong>
                        </div>
                        <?php
                    } elseif (isset($pesan)) {
                        # code...?>
                        <div class="alert alert-success">
                            <i class="glyphicon glyphicon-warning-sign"></i><strong> &nbsp; <?php echo $pesan; ?>
                                !</strong>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                    <select class="form-control" name="txt_kode" id="typeKategory" required="">
                        <option value="">Choose..</option>
                        <?php
                        $stmt = $set->runQuery("SELECT * FROM tb_kategori_pekerjaan");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
                            # code...

                            ?>
                            <option value="<?php echo $row['kode_kategori']; ?>" data-id="<?= $row['kode_kategori'] ?>"
                                    data-title="<?= $row['nama_kategori'] ?>"><?php echo $row['nama_kategori']; ?>
                                | <?php echo $row['keterangan']; ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="check" value="1" required > Anda setuju dengan pilihan kebutuhan anda.
                    </label>
                </div>
                <hr/>
                <div class="form-group">
                    <button type="submit" name="cekKebutuhan" class="btn btn-danger btn-block">
                        <i class="glyphicon glyphicon-send	"></i> &nbsp; Pilih Kebutuhan
                    </button>
                </div>

            </form>
            <br/>
            <hr/>
            <div id="btnLogin">
                <label>Jika perusahaan anda telah Terdaftar, <a href="#" data-toggle="modal" data-target="#loginModal">
                        <button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>
                    </a></label>
            </div>
            <div id="btnKomplain">
                <label>Jika ada kendala silahkan komplain disini, <button class="btn btn-sm btn-danger btnKomplain" data-id="1"><span class="glyphicon glyphicon-log-in"></span> Komplain</button> </label>
            </div>

        </div>

    </div>

<!--bpo-->
    <div id="bpo">
        <?php include 'BPO.php'; ?>
    </div>
<!--end bpo-->

<!--mpo-->
    <div id="mpo">
        <?php include 'MPO.php'; ?>
    </div>
<!--end mpo-->

<!--konsultan-->
    <div id="kst">
        <?php include 'konsultan.php'; ?>
    </div>
<!--end konsultan-->

<!--system integrator-->
    <div id="sys">
        <?php include 'systemIntergrator.php'; ?>
    </div>
<!--end system integrator-->

    <!--system integrator-->
    <div id="komplain">
        <?php include 'komplain.php'; ?>
    </div>
    <!--end system integrator-->

<!--<br>-->
<!--<div class="col-md-8 col-md-offset-2">-->
<!--    <div class="well">-->
<!--        <h4>Keterangan</h4>-->
<!--        <ul>-->
<!--            <li>BPO : -->
<!--                <p>Adalah</p>-->
<!--            </li>-->
<!--            <li>MPO : -->
<!--                <p>Adalah</p>-->
<!--            </li>-->
<!--            <li>System Integrator : -->
<!--                <p>Adalah</p>-->
<!--            </li>-->
<!--            <li>Konsultan : -->
<!--                <p>Adalah</p>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->

    <div class="modal fade" id="loginModal" role="dialog">
        <div class="modal-dialog">

            <form method="post" class="form-login" id="formLogin" action="" data-parsley-validate="">
                <h2 class="form-signin-heading">Login Corporate</h2><hr />
                <?php
                if(isset($error))
                {
                    ?>
                    <div div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="glyphicon glyphicon-danger-sign"></i> &nbsp; <?php echo $error; ?>
                    </div>
                    <?php
                }
                else if(isset($_GET['joined']))
                {
                    ?>
                    <div class="alert alert-info">
                        <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <strong><a href='index.php'>login</a></strong> here
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="txt_kode" id="logKode" placeholder="kode perusahanan" required />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="txt_upass" id="logPass" placeholder="enter password" required />
                </div>
                <div class="clearfix"></div><hr />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="btn-login">
                        <i class="glyphicon glyphicon-log-in"></i>&nbsp;LOGIN
                    </button>
                </div>
            </form>

        </div>
    </div>


    <div class="modal fade" id="addListMPO" role="dialog">
        <div class="modal-dialog">

            <form class="form-login" method="post" id="formListMPO" data-parsley-validate="">

                <div class="form-group">

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="listNomorMPO" id="listNomorMPO"  value="<?php echo $kodeMPO; ?>" />
                        <span id="check-e"></span>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="txtlistMPO" id="addListMPO" required="">
                            <option value="">Choose..</option>
                            <?php
                            while ($row = $listMPO->fetch(PDO::FETCH_LAZY)) {
                                # code...

                                ?>
                                <option value="<?php echo $row['kd_pekerjaan']; ?>" data-id ="<?=$row['kd_pekerjaan']?>" data-title="<?=$row['nama_pekerjaan']?>"><?php echo $row['nama_pekerjaan']; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <input type="text" data-parsley-type="number" class="form-control" name="listJumlahMPO" id="listJumlahMPO"  required />

                    </div>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">
                        <i class="glyphicon glyphicon-plus-sign"></i> &nbsp; Tambah List
                    </button>
                </div>
            </form>
        </div>
    </div>




<?php
require_once'footer.php';
 ?>