<?php
/**
 * Created by PhpStorm.
 * User: small-project
 * Date: 25/01/2018
 * Time: 23.30
 */
require '../class.user.php';

if(isset($_GET['kodeMPO'])){
    $kodeMPO = $_GET['kodeMPO'];

    $data = new USER();
    $listMPOData = "SELECT tb_list_perkerjaan_perusahaan.id, tb_list_perkerjaan_perusahaan.name_list, tb_list_perkerjaan_perusahaan.code, tb_list_perkerjaan_perusahaan.total, tb_list_perkerjaan_perusahaan.status, tb_jenis_pekerjaan.nama_pekerjaan FROM tb_list_perkerjaan_perusahaan INNER JOIN tb_jenis_pekerjaan ON tb_jenis_pekerjaan.kd_pekerjaan = tb_list_perkerjaan_perusahaan.name_list WHERE tb_list_perkerjaan_perusahaan.status = 0 AND tb_list_perkerjaan_perusahaan.code = :code";
    $stmt = $data->runQuery($listMPOData);
    $stmt->execute(array(':code' => $kodeMPO ));

}
?>

<table class="table table-hover table-bordered" id="<?=$kodeMPO?>">
    <thead>
    <th style="width: 60%;">Jenis Kebutuhan</th>
    <th style="width: 30%;">Jumlah</th>
    <th style="width: 10%;">#</th>
    </thead>
    <tbody>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
        ?>
        <tr>
            <td><?=$row['nama_pekerjaan']?></td>
            <td><?=$row['total']?></td>
            <td>
                <button class="btn btn-xs btn-danger" id="delListMPO" onclick="delMPOList()" data-kode="<?=$row['id']?>" >
                    <span class="fa fa-fw fa-trash"></span>
                </button>

            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
