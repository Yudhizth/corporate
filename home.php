<?php 
require_once 'header.php';
require_once ("session.php");
include_once 'class.user.php';
$config = new USER();

$curdir = dirname($_SERVER['REQUEST_URI'])."/";


if(isset($_SESSION['kode_session'])){
    $kode = $_SESSION['kode_session'];
}else{
    $config->redirect('sign-up.php');
}

    $sql = "SELECT * FROM tb_perusahaan INNER JOIN tb_temporary_perusahaan ON tb_temporary_perusahaan.kode_perusahaan = tb_perusahaan.kode_perusahaan WHERE tb_perusahaan.kode_perusahaan = :kode";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array( ':kode' => $kode));

    $info = $stmt->fetch(PDO::FETCH_LAZY);


include 'navbar.php';


if (isset($_POST['addList'])) {
      $namePekerjaan = $_POST['listPekerjaan'];
      $jmlh = $_POST['total'];
        $kode = $_POST['kodeMPO'];

      $data = new USER();

      $sql = "INSERT INTO tb_list_perkerjaan_perusahaan (code, name_list, total) VALUES (:kode, :name, :total)";
      $stmt = $data->runQuery($sql);
      $stmt->execute(array(
            ':kode' => $kode,
        ':name' => $namePekerjaan,
        ':total' => $jmlh
        ));
      if (!$stmt) {
        # code...
        echo "Data tidak masuk";
      } else 
      {
        header('Location: ?p=reqMPO');
      }
    }

include 'page.php';

include 'modal.php';

require_once'footer.php';
?>