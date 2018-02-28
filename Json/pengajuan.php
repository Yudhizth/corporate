<?php
/**
 * Created by PhpStorm.
 * User: small-project
 * Date: 25/01/2018
 * Time: 01.40
 */

session_start();
require '../class.user.php';

    $data = new USER();
$login = new USER();
$config = new USER();

    $cek = new USER();
    $tbName = "tb_temporary_perusahaan";
    $kode = "REQ";
    $id = "no_pendaftaran";
    $nomor = $cek->Generate($id, $kode, $tbName);


if(@$_GET['type'] == 'bpo'){

    $kode = 'BPO01';
    $noReg = 'BPO'.$nomor;
    $title = $_POST['title'];
    $namaPerusahaan = $_POST['nama'];
    $cp = $_POST['cp'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $status      = "0";
    $kodePerusahaan = $_POST['kodePerusahaan'];

    $sql = "INSERT INTO tb_temporary_perusahaan (no_pendaftaran, kode_perusahaan, nama_perusahaan, cp, phone, email, kebutuhan, nama_project, status) VALUES (:kode, :noReg, :nama, :cp, :telp, :email, :kebutuhan, :nama_project, :st)";
    $stmt = $data->runQuery($sql);
    $stmt->execute(array(
        ':kode'	=>$noReg,
        ':noReg'=>$kodePerusahaan,
        ':nama'	=>$namaPerusahaan,
        ':cp'	=>$cp,
        ':telp'	=>$phone,
        ':email' =>$email,
        ':kebutuhan' =>$kode,
        ':nama_project'	=>$title,
        ':st' =>$status));
    if (!$stmt) {
        # code...
        echo  "DATA TIDAK MASUK KE DATABASE";
    }else{
        echo  "Data Berhasil Diajukan. Selanjutnya Anda akan dihubungi oleh pihak sales kami.";
    }
}


elseif(@$_GET['type'] == 'mpo'){

    $kode = 'MPO01';
    $noReg = 'MPO'.$nomor;
    $generate = $_POST['kode'];
    $namaPerusahaan = $_POST['nama'];
    $cp = $_POST['cp'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $nameProject = "NULL";
    $status      = "0";
    $kodePerusahaan = $_POST['kodePerusahaan'];

    $sql = "INSERT INTO tb_temporary_perusahaan (no_pendaftaran, kode_perusahaan, nama_perusahaan, cp, phone, email, kebutuhan, kode_pekerjaan, nama_project, status) VALUES (:kode, :noReg, :nama, :cp, :telp, :email, :kebutuhan, :pekerjaan, :nama_project, :st)";
    $stmt = $data->runQuery($sql);
    $stmt->execute(array(
        ':kode' =>$noReg,
        ':noReg'=>$kodePerusahaan,
        ':nama' =>$namaPerusahaan,
        ':cp'   =>$cp,
        ':telp' =>$phone,
        ':email' =>$email,
        ':kebutuhan' =>$kode,
        ':pekerjaan' =>$generate,
        ':nama_project' =>$nameProject,
        ':st' =>$status));
    if (!$stmt) {
        # code...
        echo "DATA TIDAK MASUK KE DATABASE";
    }else{
        echo  "Data Berhasil Diajukan. Selanjutnya Anda akan dihubungi oleh pihak sales kami.";

    }
}

elseif (@$_GET['type'] == 'kst'){

    $kode = 'KST01';
    $noReg = 'KST'.$nomor;
    $namaPerusahaan = $_POST['nama'];
    $cp = $_POST['cp'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $nameProject = "NULL";
    $status      = "0";
    $kodePerusahaan = $_POST['kodePerusahaan'];

    $sql = "INSERT INTO tb_temporary_perusahaan (no_pendaftaran, kode_perusahaan, nama_perusahaan, cp, phone, email, kebutuhan, nama_project, status) VALUES (:kode, :noReg, :nama, :cp, :telp, :email, :kebutuhan, :nama_project, :st)";
    $stmt = $data->runQuery($sql);
    $stmt->execute(array(
        ':kode' =>$noReg,
        ':noReg'=>$kodePerusahaan,
        ':nama' =>$namaPerusahaan,
        ':cp'   =>$cp,
        ':telp' =>$phone,
        ':email' =>$email,
        ':kebutuhan' =>$kode,
        ':nama_project' =>$nameProject,
        ':st' =>$status));
    if (!$stmt) {
        # code...
       echo "DATA TIDAK MASUK KE DATABASE";
    }else{
        echo  "Data Berhasil Diajukan. Selanjutnya Anda akan dihubungi oleh pihak sales kami.";
    }
}

elseif (@$_GET['type'] == 'sys'){

    $kode = 'SYG01';
    $noReg = 'SYG'.$nomor;
    $namaPerusahaan = $_POST['nama'];
    $cp = $_POST['cp'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $nameProject = "NULL";
    $status      = "0";
    $kodePerusahaan = $_POST['kodePerusahaan'];

    $sql = "INSERT INTO tb_temporary_perusahaan (no_pendaftaran, kode_perusahaan, nama_perusahaan, cp, phone, email, kebutuhan, nama_project, status) VALUES (:kode, :noReg, :nama, :cp, :telp, :email, :kebutuhan, :nama_project, :st)";
    $stmt = $data->runQuery($sql);
    $stmt->execute(array(
        ':kode' =>$noReg,
        ':noReg'=>$kodePerusahaan,
        ':nama' =>$namaPerusahaan,
        ':cp'   =>$cp,
        ':telp' =>$phone,
        ':email' =>$email,
        ':kebutuhan' =>$kode,
        ':nama_project' =>$nameProject,
        ':st' =>$status));
    if (!$stmt) {
        # code...
       echo "DATA TIDAK MASUK KE DATABASE";
    }else{
       echo  "Data Berhasil Diajukan. Selanjutnya Anda akan dihubungi oleh pihak sales kami.";
    }
}



elseif (@$_GET['type'] == 'addList'){

    $generate = $_POST['kode'];
    $kode = $_POST['id'];
    $title = $_POST['title'];
    $jumlah = $_POST['jumlah'];

//    echo 'Generate Kode: '.$generate.' Kodenya: '.$kode.' Title: '.$title.' Jumlah: '. $jumlah;

    $sql = "INSERT INTO tb_list_perkerjaan_perusahaan (code, name_list, total) VALUES (:kode, :name, :total)";
    $stmt = $data->runQuery($sql);
    $stmt->execute(array(
        ':kode' => $generate,
        ':name' => $kode,
        ':total' => $jumlah
    ));
    if (!$stmt) {
        # code...
        echo "Data tidak masuk";
    }else{
        echo $title." telah ditambah!";
    }

}

elseif (@$_GET['type'] == 'login'){

    $kode = $_POST['kode'];
    $pass = $_POST['pass'];

    if($login->corLogin($kode, $pass))
    {
        echo "ok";
    }
    else
    {
        echo "no";
    }

}

elseif (@$_GET['type'] == 'komplain'){

    $a = $_POST['nama'];
    $b = $_POST['cp'];
    $c = $_POST['phone'];
    $d = $_POST['email'];
    $e = $_POST['judul'];
    $f = $_POST['isi'];
    $g = $_POST['kode'];

    $table = "tb_complain_perusahaan";
    $field = "kode_komplain";
    $key = "CKMPL";

    $formatt = "d-m-Y";

    $kode = $config->getKode($field, $key, $table);
    $tgl = $config->getDate($formatt);


    $sql = "INSERT INTO tb_complain_perusahaan (kode_komplain, kode_perusahaan, cp, phone, email, judul, isi, create_date) 
    VALUES (:a, :b, :c, :d, :e, :f, :g, :h)";
    $stmt = $data->runQuery($sql);
    $stmt->execute(array(
        ':a'    => $kode,
        ':b'    => $g,
        ':c'    => $b,
        ':d'    => $c,
        ':e'    => $d,
        ':f'    => $e,
        ':g'    => $f,
        ':h'    => $tgl
    ));
    if (!$stmt) {
        # code...
        echo "Gagal diajukan!";
    }else{
        echo "Nomor Kupon Komplain Anda: ".$kode;
    }

}