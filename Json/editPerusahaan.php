<?php
/**
 * Created by PhpStorm.
 * User: small-project
 * Date: 26/01/2018
 * Time: 21.35
 */
require '../class.user.php';

$config = new USER();

    $kodePerusahaan = $_POST['kode'];
    $npwp           = $_POST['npwp'];
    $siup           = $_POST['siup'];
    $telp           = $_POST['telp'];
    $hp             = $_POST['hp'];
    $fax            = $_POST['fax'];

    $sql = "UPDATE tb_perusahaan SET nomor_NPWP = :npwp, nomor_SIUP = :siup, nomor_telp = :telp, nomor_hp = :hp, nomor_fax = :fax WHERE kode_perusahaan = :kode";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array(
       ':npwp'  => $npwp,
       ':siup'  => $siup,
       ':telp'  => $telp,
       ':hp'    => $hp,
       ':fax'   => $fax,
       ':kode'  => $kodePerusahaan
    ));

    if(!$stmt){
        echo "Tidak bisa di UPdate!";
    }else{
        echo "Berhasil Di Update!";
    }

//echo "Kode perusahaan: ".$kodePerusahaan.' Nomor NPWP: '.$npwp." Nomor SIUP: ".$siup." Nomor Telp. ".$telp." Nomor HP: ".$hp. "Nomor FAX: ".$fax;