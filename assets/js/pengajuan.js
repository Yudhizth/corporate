function showLogin(id) {
    if(id === '1'){
        $('#btnLogin').show(500);
        $('#btnKomplain').hide();
    }
}

$(document).ready(function () {

    var btnLogin = $('#btnLogin').hide();

    var pengajuan = $('#categoryType');

    var bpo = $('#bpo').hide();
    var mpo = $('#mpo').hide();
    var kst = $('#kst').hide();
    var sys = $('#sys').hide();
    var komplain = $('#komplain').hide();
    var baseUrl = document.location.origin;
    var url_admin = 'http://localhost/corporate/home.php';


//form kebutuhan validasi
    $('#kebutuhanForm').on('submit', function (event) {
        event.preventDefault();
        var ID = $('#typeKategory option:selected').data('id');
        var title = $('#typeKategory option:selected').data('title');

        if($(this).parsley().validate()){
            alert("Anda memilih "+title);

            switch (ID){
                case 'BPO01':
                    bpo.show(600);
                    pengajuan.hide();
                    break;

                case 'MPO01':
                    mpo.show(600);
                    pengajuan.hide();
                    break;

                case 'SYG01':
                    sys.show(600);
                    pengajuan.hide();
                    break;

                case 'KST01':
                    kst.show(600);
                    pengajuan.hide();
                    break;
            }
        }else{

        }
    });

    $('#showList').click(function () {
        $('#addList').load('Json/listMPO.php').fadeIn(5000);
    });

    //validate form BPO
    $('#PBOform').on('submit', function (event) {
        event.preventDefault();

        var kodePerusahaan = $('#txtKodePerusahaan').val();
        var title = $('#txtProject').val();
        var perusahaan = $('#txtNama').val();
        var cp = $('#txtCp').val();
        var phone = $('#txtPhone').val();
        var email = $('#txtEmail').val();

        if($(this).parsley().validate()){
            $.ajax({
                url : 'Json/pengajuan.php?type=bpo',
                type: 'post',
                data: 'title='+title+'&nama='+perusahaan+'&cp='+cp+'&phone='+phone+'&email='+email+'&kodePerusahaan='+kodePerusahaan,

                success : function (msg) {
                    if(msg != ''){
                        $("#PBOform").each( function() { this.reset; });
                        alert(msg);
                        location.reload(baseUrl);
                    }
                }
            });
        }else{
        }

    });

    //validation MPO
    $('#MPOform').on('submit', function (e) {
        e.preventDefault();

        var kode = $('#mpoKode').val();
        var nama = $('#mpoNama').val();
        var cp = $('#mpoCp').val();
        var phone = $('#mpoPhone').val();
        var email = $('#mpoEmail').val();
        var kodePerusahaan = $('#mpoKodePerusahaan').val();

        if($(this).parsley().validate()){
            $.ajax({
                url : 'Json/pengajuan.php?type=mpo',
                type: 'post',
                data: 'nama='+nama+'&cp='+cp+'&phone='+phone+'&email='+email+'&kode='+kode+'&kodePerusahaan='+kodePerusahaan,

                success : function (msg) {
                    if(msg != ''){
                        $("#MPOform").each( function() { this.reset; });
                        alert(msg);
                        location.reload(baseUrl);
                    }
                }
            });
        }
    });

    //validation Konsultan
    $('#KSTform').on('submit', function (e) {
        e.preventDefault();

        var nama = $('#kstNama').val();
        var cp = $('#kstCp').val();
        var phone = $('#kstPhone').val();
        var email = $('#kstEmail').val();
        var kodePerusahaan = $('#kstKodePerusahaan').val();

        if($(this).parsley().validate()){
            $.ajax({
               url : 'Json/pengajuan.php?type=kst',
               type: 'post',
               data: 'nama='+nama+'&cp='+cp+'&phone='+phone+'&email='+email+'&kodePerusahaan='+kodePerusahaan,

                success : function (msg) {
                    if(msg != ''){
                        $("#KSTform").each( function() { this.reset; });
                        alert(msg);
                        location.reload(baseUrl);
                    }
                }
            });
        }
    });

    //validation System Itegrator
    $('#sysForm').on('submit', function (e) {
        e.preventDefault();

        var nama = $('#sysName').val();
        var cp = $('#sysCp').val();
        var phone = $('#sysPhone').val();
        var email = $('#sysEmail').val();
        var kodePerusahaan = $('#sysKodePerusahaan').val();


        if($(this).parsley().validate()){
            $.ajax({
                url : 'Json/pengajuan.php?type=sys',
                type: 'post',
                data: 'nama='+nama+'&cp='+cp+'&phone='+phone+'&email='+email+'&kodePerusahaan='+kodePerusahaan,

                success : function (msg) {
                    if(msg != ''){
                        $("#sysForm").each( function() { this.reset; });
                        alert(msg);
                        location.reload(baseUrl);
                    }
                }
            });
        }
        else{
        }
    });


    //validation Login

    $('#formLogin').on('submit', function (e) {
        e.preventDefault();

        var kode = $('#logKode').val();
        var pass = $('#logPass').val();


        if($(this).parsley().validate()){
            $.ajax({
                url : 'Json/pengajuan.php?type=login',
                type: 'post',
                data: 'kode='+kode+'&pass='+pass,

                success : function (msg) {
                    if(msg=="ok"){

                        window.location = url_admin;
                    }else{
                        alert(msg);

                    }
                }
            });
        }else{
        }

    });

    $('#categoryType').on('click', '.btnKomplain', function () {
        pengajuan.hide();
        komplain.show(500);
    });

    $('#formKomplain').on('submit', function () {

        var nama = $('#kmpName').val();
        var cp = $('#kmpCp').val();
        var phone = $('#kmpPhone').val();
        var email = $('#kmpEmail').val();
        var title = $('#kmpJudul').val();
        var isi = $('#kmpIsi').val();

        if($(this).parsley().validate()){
            $.ajax({
                url : 'Json/pengajuan.php?type=komplain',
                type: 'post',
                data: 'nama='+nama+'&cp='+cp+'&phone='+phone+'&email='+email+'&judul='+title+'&isi='+isi,

                success : function (msg) {
                    if(msg != ''){

                        alert(msg);
                        location.reload();
                    }
                }
            });
        }
        else{
        }

    });





});
