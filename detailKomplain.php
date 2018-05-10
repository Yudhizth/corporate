<?php
    $kupon = $_GET['kupon'];

    $sql = "SELECT * FROM tb_complain_perusahaan WHERE kode_komplain = :kode";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array(
        ':kode' => $kupon
    ));
    $isi = $stmt->fetch(PDO::FETCH_LAZY);

    $query = "SELECT * FROM tb_complain_perusahaan WHERE id_reff = :kode ORDER BY update_on ASC";
    $chat = $config->runQuery($query);
    $chat->execute(array(
        ':kode' => $kupon
    ));
    
    
?>
<style type="text/css">
    .jumbotron p{
        margin-bottom: unset !important;
        font-size:  14px;
    }
   .komplainTitle-user{
        margin: 1% 0%;
        text-align: right;
        font-size: 16px;
        font-weight: 600;
        text-transform: capitalize;
    }
    .komplainBody-user{
        text-align: right;
        margin: 0!important;
        text-transform: capitalize;
        color: #2f2b2b;
        font-size: 14px;
    }
    .komplainFooter-user{
        text-align: right;
        margin: 0!important;
        padding-top: 2.5%;
        font-size: 12px;
        font-weight: 600;
    }
    .komplainTitle-admin{
        margin: 1% 0%;
        font-size: 16px;
        font-weight: 600;
        text-transform: capitalize;
    }
    .komplainBody-admin{
        margin: 0!important;
        text-transform: capitalize;
        font-size: 14px;
    }
    .komplainFooter-admin{
        margin: 0!important;
        padding-top: 2.5%;
        font-size: 12px;
        font-weight: 600;
    }
    .hr{
        margin: 3% 0% 1%;
        border-bottom: 2px dashed #eee;
    }
</style>

<div class="contain">
	<h3 class="page-header">Detail Komplain <small></small></h3>

    <div class="jumbotron" style="text-transform: capitalize;">
        <h3>
            <?=$isi['judul']?>
        </h3>
        <p >
            <?=$isi['isi']?>
        </p>
    </div>
    
    <div id="contentComplain"></div>
    <?php 
    
    if ($chat->rowCount() > 0){
        while ($row = $chat->fetch(PDO::FETCH_LAZY)){

            $tgl = $row['update_on'];
           
            $menit = date("H:m:s a", strtotime($tgl));

            if($row['admin'] == $info['kode_perusahaan']){
                $panel = "panel-success";
                $type="user";
                $style="width: 600px; margin-left: 46%;";
            }else{
                $panel = "panel-primary";
                $type = "admin";
                $style="width: 600px;";
            }
            
    ?>
    <div class="panel <?=$panel?> " style="<?=$style?>">
        <div class="panel-heading">
            <p class="komplainBody-<?=$type?>">
                <?=$row['isi']?>
            </p>
            <p class="komplainFooter-<?=$type?>">
                <?=$row['update_on']?> by <i style= text-transform: capitalize;><?=$type?></i>
            </p>
        </div>
    </div>
    <?php
    
        }
    }else{
        echo "Belum ada Tindakan dari Admin SAS.";
    }
    ?>
    <div class="hr"></div>

    <form method="post" id="replayComplain" data-parsley-validate="">
        <div class="form-group">
            <input type="hidden" value = "<?=$kupon?>" id="kode_kupon">
            <input type="hidden" value = "<?=$isi['kode_perusahaan']?>" id="kode_perusahaan">
            <input type="hidden" value = "<?=$isi['judul']?>" id="judulComplain">
            <textarea class="form-control" name="msg" rows="3" id="msg" placeholder="your message..."
            data-parsley-minlength="20" data-parsley-maxlength="600"
            data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
            data-parsley-validation-threshold="10"
            require></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-info">Replay <span class="glyphicon glyphicon-send"></span></button>
        </div>
    </form>
</div>