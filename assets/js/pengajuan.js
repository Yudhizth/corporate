$(document).ready(function () {

    var pengajuan = $('#categoryType');

    var bpo = $('#bpo').hide();
    var mpo = $('#mpo').hide();
    var kst = $('#kst').hide();
    var sys = $('#sys').hide();
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
            alert('Pilih Salah Satu Kategori!');
        }
    });

    $('#showList').click(function () {
        $('#addList').load('Json/listMPO.php').fadeIn(5000);
    });

    //validate form BPO
    $('#PBOform').on('submit', function (event) {
        event.preventDefault();

        var title = $('#txtProject').val();
        var perusahaan = $('#txtNama').val();
        var cp = $('#txtCp').val();
        var phone = $('#txtPhone').val();
        var email = $('#txtEmail').val();

        if($(this).parsley().validate()){
            $.ajax({
                url : 'Json/pengajuan.php?type=bpo',
                type: 'post',
                data: 'title='+title+'&nama='+perusahaan+'&cp='+cp+'&phone='+phone+'&email='+email,

                success : function (msg) {
                    if(msg != ''){
                        alert(msg);
                        location.reload(baseUrl);
                    }
                }
            });
        }else{
            alert("Isi Data!");
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

        if($(this).parsley().validate()){
            $.ajax({
                url : 'Json/pengajuan.php?type=mpo',
                type: 'post',
                data: 'nama='+nama+'&cp='+cp+'&phone='+phone+'&email='+email+'&kode='+kode,

                success : function (msg) {
                    if(msg != ''){
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

        if($(this).parsley().validate()){
            $.ajax({
               url : 'Json/pengajuan.php?type=kst',
               type: 'post',
               data: 'nama='+nama+'&cp='+cp+'&phone='+phone+'&email='+email,

                success : function (msg) {
                    if(msg != ''){
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
        var phone = $('#sysPhonePhone').val();
        var email = $('#sysEmail').val();

        if($(this).parsley().validate()){
            $.ajax({
                url : 'Json/pengajuan.php?type=sys',
                type: 'post',
                data: 'nama='+nama+'&cp='+cp+'&phone='+phone+'&email='+email,

                success : function (msg) {
                    if(msg != ''){
                        alert(msg);
                        location.reload(baseUrl);
                    }
                }
            });
        }
        else{
            alert("Isi Data!");
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
            alert("Field required!");
        }

    });




});
