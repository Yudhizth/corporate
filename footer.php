</div>
<?php
    if (isset($kodeMPO)){
        $kodeMPO = $kodeMPO;
    }else{
        $kodeMPO = "";
    }
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="assets/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/vendor/js/select.js" type="text/javascript"></script>
<script src="assets/js/pengajuan.js" type="text/javascript"></script>
<script src="assets/js/parsley.min.js" type="text/javascript"></script>
<?php if(isset($_SESSION['kode_session'])){ ?>
    <script src="assets/js/perusahaan.js" type="text/javascript"></script>
<?php } ?>
<script src="assets/js/custom.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script type="application/javascript">
    function delMPOList() {

        var id = $('#delListMPO').data('kode');

        $.ajax({
            url : 'Json/delMPOlist.php?id'+id,
            type: 'get',
            data: 'id='+id,

            success: function (msg) {
                if(msg == 'ok'){
                    $('#listLowongan').load('Json/list.php?kodeMPO=<?=$kodeMPO?>');
                }else{
                    alert('Data Tidak bisa Dihapus.');
                }
            }
        });
    }
</script>
<script type="application/javascript">
    //add list mpo
    $(document).ready(function () {
        $('#formListMPO').on('submit', function (e) {
            e.preventDefault();

            var kode = $('#listNomorMPO').val();
            var ID = $('#addListMPO option:selected').data('id');
            var title = $('#addListMPO option:selected').data('title');
            var jmlh = $('#listJumlahMPO').val();

            if($(this).parsley().validate() && jmlh != '0'){

                $.ajax({
                    url  : 'Json/pengajuan.php?type=addList',
                    type : 'post',
                    data : 'kode='+kode+'&id='+ID+'&title='+title+'&jumlah='+jmlh,

                    success: function (msg) {
                        if ( msg != ''){
                            alert(msg);
                            $('#listLowongan').load('Json/list.php?kodeMPO=<?=$kodeMPO?>');
                            $("#formListMPO").each(function () {
                                this.reset();
                            });
                        }
                    }

                });
            }else{
                alert('Perhatikan Penginputan Data!');
            }
        });

    });

</script>
    <script>
            $(document).ready(function () {

                $("#pekerjaan").select2({
                    placeholder: "pilih jenis pekerjaan"
                });
            });
</script>
</body>
</html>
