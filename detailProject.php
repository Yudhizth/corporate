<?php

$kode = $_GET['spk'];


    $sql1 = "SELECT tb_kerjasama_perusahan.nomor_kontrak, tb_kerjasama_perusahan.kode_perusahaan, tb_kerjasama_perusahan.kode_request, tb_kerjasama_perusahan.kode_list_karyawan, tb_kerjasama_perusahan.total_karyawan,
    tb_list_karyawan.no_nip, tb_list_karyawan.kode_jabatan, tb_list_karyawan.kode_pekerjaan, tb_list_karyawan.status_karyawan, tb_karyawan.nama_depan, tb_karyawan.nama_belakang, tb_karyawan.jenis_kelamin, 
    year(curdate()) - year(str_to_date(tb_karyawan.tgl_lahir,'%d-%m-%Y')) as Age FROM tb_kerjasama_perusahan
    INNER JOIN tb_list_karyawan ON tb_list_karyawan.kode_list_karyawan = tb_kerjasama_perusahan.kode_list_karyawan
    INNER JOIN tb_karyawan ON tb_karyawan.no_ktp = tb_list_karyawan.no_nip
    WHERE tb_kerjasama_perusahan.nomor_kontrak = :kode1";

    $stmt1 = $config->runQuery($sql1);
    $stmt1->execute(array(':kode1' => $kode));

    $sql2 = "SELECT tb_job.nomor_kontrak, tb_job.id, tb_job.kode_detail_job, tb_job.title, tb_job.type, tb_job.status, tb_jenis_pekerjaan.nama_pekerjaan
    FROM tb_job 
    LEFT JOIN tb_jenis_pekerjaan ON tb_jenis_pekerjaan.kd_pekerjaan=tb_job.title
    WHERE tb_job.nomor_kontrak = :kode2";
   
    $stmt2 = $config->runQuery($sql2);
    $stmt2->execute(array(':kode2' => $kode));




?>
<br>
<h2>Detail Project ~ <small><?=$kode;?></small></h2>
<hr>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="panel-group" role="tablist">
            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="listKaryawan">
                    <h4 class="panel-title"> <a href="#dataKaryawan" class="" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseListGroup1"> List Karyawan Project </a> </h4> </div>
                <div class="panel-collapse collapse in" role="tabpanel" id="dataKaryawan" aria-labelledby="collapseListGroupHeading1" aria-expanded="true" style="">
                    <ul class="list-group">
                        <?php if($stmt1->rowCount() > 0){
                            while($row = $stmt1->fetch(PDO::FETCH_LAZY)){ ?>
                                <li class="list-group-item"><?= $row['nama_depan']?> <?= $row['nama_belakang']?> (<?= $row['jenis_kelamin']?>)</li>
                           <?php  }
                        }else{
                            echo "<li class='list-group-item'>Data Karyawan Belum ada.</li>";
                        } ?>
                    </ul>
                    <div class="panel-footer">Footer</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="panel-group" role="tablist">
            <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="listPekerjaan">
                    <h4 class="panel-title"> <a href="#dataJobs" class="" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseListGroup1"> List Pekerjaan </a> </h4> </div>
                <div class="panel-collapse collapse in" role="tabpanel" id="dataJobs" aria-labelledby="collapseListGroupHeading1" aria-expanded="true" style="">
                    <ul class="list-group">
                    <?php if($stmt2->rowCount() > 0){
                            while($row = $stmt2->fetch(PDO::FETCH_LAZY)){ ?>
                                <li class="list-group-item" style = "text-transform: capitalize;"><?= $row['title']?> (<?= $row['type']?>)</li>
                           <?php  }
                        }else{
                            echo "<li class='list-group-item'>Data Pekerjaan Belum ada.</li>";
                        } ?>
                    </ul>
                    <div class="panel-footer">
                        <button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="right" title="Add New Jobs">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="panel-group" role="tablist">
            <div class="panel panel-warning">
                <div class="panel-heading" role="tab" id="listReport">
                    <h4 class="panel-title"> <a href="#dataReport" class="" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseListGroup1"> List Report </a> </h4> </div>
                <div class="panel-collapse collapse in" role="tabpanel" id="dataReport" aria-labelledby="collapseListGroupHeading1" aria-expanded="true" style="">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i>Akun Premium</i>
                        </li>
                        
                    </ul>
                    <div class="panel-footer">Footer</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="panel-group" role="tablist">
            <div class="panel panel-success">
                <div class="panel-heading" role="tab" id="listAbsen">
                    <h4 class="panel-title"> <a href="#dataAbsen" class="" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseListGroup1"> List Absen </a> </h4> </div>
                <div class="panel-collapse collapse in" role="tabpanel" id="dataAbsen" aria-labelledby="collapseListGroupHeading1" aria-expanded="true" style="">
                    <ul class="list-group">
                        <li class="list-group-item"><i>Akun Premium</i></li>
                    </ul>
                    <div class="panel-footer">Footer</div>
                </div>
            </div>
        </div>
    </div>
</div>
