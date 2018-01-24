$(document).ready(function () {

    var pengajuan = $('#categoryType');

    var bpo = $('#bpo').hide();
    var mpo = $('#mpo').hide();
    var kst = $('#kst').hide();
    var sys = $('#sys').hide();

//form kebutuhan validasi
    $('#kebutuhanForm').on('submit', function (event) {
        event.preventDefault();
        var ID = $('#typeKategory option:selected').data('id');
        var title = $('#typeKategory option:selected').data('title');

        if($(this).parsley().validate()){
            alert("Anda memilih "+ID);

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

    //validate form BPO
    $('#PBOform').on('submit', function () {
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
                        location.reload();
                    }
                }
            });
        }else{
            alert("Isi Data!");
        }

    });


});
