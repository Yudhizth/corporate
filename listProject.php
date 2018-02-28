<?php
$query = "SELECT tb_kerjasama_perusahan.nomor_kontrak, tb_kerjasama_perusahan.kode_perusahaan, tb_kerjasama_perusahan.kode_request, tb_kerjasama_perusahan.kode_plan, tb_kerjasama_perusahan.kode_list_karyawan, tb_kerjasama_perusahan.total_karyawan, tb_kerjasama_perusahan.tgl_input, tb_perusahaan.nama_perusahaan, tb_temporary_perusahaan.kebutuhan, tb_temporary_perusahaan.nama_project, tb_kategori_pekerjaan.nama_kategori, tb_kategori_pekerjaan.keterangan FROM tb_kerjasama_perusahan
INNER JOIN tb_perusahaan ON tb_perusahaan.kode_perusahaan=tb_kerjasama_perusahan.kode_perusahaan
INNER JOIN tb_temporary_perusahaan ON tb_temporary_perusahaan.no_pendaftaran=tb_kerjasama_perusahan.kode_request
INNER JOIN tb_kategori_pekerjaan ON tb_kategori_pekerjaan.kode_kategori=tb_temporary_perusahaan.kebutuhan
WHERE tb_kerjasama_perusahan.kode_perusahaan= :kode";
$stmt = $config->runQuery($query);
$stmt->execute(array(':kode' => $kode));

?>
<div class="contain">
    <h3 class="page-header">List Project</h3>

    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th width="20%">Type Project</th>
            <th width="20%">Nama Project</th>
            <th width="15%">Tanggal Pengajuan</th>
            <th width="20%">Progress</th>
            <th width="10%">Action</th>
        </tr></thead>
        <tbody>
        <?php
        $i = 1;
        while ($data = $stmt->fetch(PDO::FETCH_LAZY)){
                if(!empty($data['nama_project'])){
                    $title = $data['nama_project'];
                }else{
                    $title = "--";
                }
        ?>
        <tr>
            <td><?=$i++?></td>
            <td><?=$data['nama_kategori'];?> (<?=$data['keterangan'];?>)</td>
            <td><?=$title;?></td>
            <td>2018-01-20 09:39:42</td>
            <td><label class="label label-lg label-default">not set</label></td>
            <td>
                <a href="?p=detailProject&spk=<?=$data['nomor_kontrak'];?>">
                    <button class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="Detail">
                        <span class="glyphicon glyphicon-list-alt"></span>
                    </button>
                </a>
            </td>
        </tr>
        <?php } ?>

        </tbody></table>
</div>