<?php 
require_once 'class.user.php';
$config = new USER();


if(isset($_GET['add'])){
	$update = $_GET['add'];
}else{
	$update = "";
}
if(isset($_GET['del'])){
	$delete = $_GET['del'];
}else{
	$delete = "";
}

$kode = $_GET['pendaftaran'];


if (!empty($update)) {
	$stKaryawan = "KDKRY0011";

	$id = "2";
	$sql = "UPDATE tb_list_karyawan SET status_karyawan = :status WHERE no_nip = :nip";
	$stmt = $config->runQuery($sql);
	$stmt->execute(array(':status' => $id, ':nip' => $update));

	if ($stmt) {
		echo "<script>
            alert('Karyawan Berhasil di tambahkan!');
            window.location.href='home.php?p=detail&kode=".$kode."';
			</script>";
		$sql2 = "UPDATE tb_karyawan SET kd_status_karyawan = :status WHERE no_ktp = :nip";
		$stmt2 = $config->runQuery($sql2);
		$stmt2->execute(array(':status'	=> $stKaryawan, ':nip'	=> $update));
	}else{
		echo "<script>
            alert('Karyawan tidak berhasil di tambahkan!');
            window.location.href='home.php?p=detail&kode=".$kode."';
            </script>";
	}
}elseif(!empty($delete)){
	$stKaryawan = "KDKRY0012";
	$id = "3";
	$sql = "UPDATE tb_list_karyawan SET status_karyawan = :status WHERE no_nip = :nip";
	$stmt = $config->runQuery($sql);
	$stmt->execute(array(':status' => $id, ':nip' => $delete));

	if ($stmt) {
		echo "<script>
            alert('Karyawan Berhasil di Remove!');
            window.location.href='home.php?p=detail&kode=".$kode."';
			</script>";
			$sql2 = "UPDATE tb_karyawan SET kd_status_karyawan = :status WHERE no_ktp = :nip";
		$stmt2 = $config->runQuery($sql2);
		$stmt2->execute(array(':status'	=> $stKaryawan, ':nip'	=> $delete));
	}else{
		echo "<script>
            alert('Karyawan tidak berhasil di Remove!');
            window.location.href='home.php?p=detail&kode=".$kode."';
            </script>";
	}
}
?>