<?php
/**
 * Created by PhpStorm.
 * User: small-project
 * Date: 25/01/2018
 * Time: 01.40
 */
if(@$_GET['type'] == 'bpo'){

    $kode = 'BPO01';
    $title = $_POST['title'];
    $namaPerusahaan = $_POST['nama'];
    $cp = $_POST['cp'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    echo 'Kode'.$kode.'title '.$title.' nama perusahaan: '.$namaPerusahaan. 'cp nya: '.$cp. 'phone number: '.$phone. 'email nya breo:' .$email;
}