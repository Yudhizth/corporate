<?php
/**
 * Created by PhpStorm.
 * User: small-project
 * Date: 25/01/2018
 * Time: 01.40
 */

session_start();
require '../class.user.php';

    $config = new USER();

    
if(@$_GET['type'] == 'replay'){
    $kupon = $_POST['kode'];
    $judul = $_POST['judul'];
    $msg = $_POST['msg'];
    $admin = $_POST['id'];

    $sql = "INSERT INTO tb_complain_perusahaan (id_reff, judul, isi, admin) VALUES(:a, :b, :c, :d)";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array(
        ':a'    => $kupon,
        ':b'    => $judul,
        ':c'    => $msg,
        ':d'    => $admin
    ));
    if($stmt){
        echo "Berhasil di Replay";
    }else{
        "Gagal Replay";
    }
}