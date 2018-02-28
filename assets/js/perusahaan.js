$(document).ready(function () {
    var baseUrl = document.location.origin;

    //edit profile perusahaan

    $('#editPerusahaan').on('submit', function (e) {
        e.preventDefault();

        var npwp = $('#editNPWP').val();
        var siup = $('#editSIUP').val();
        var telp = $('#editPhone').val();
        var hp   = $('#editHP').val();
        var fax  = $('#editFAX').val();
        var kode = $('#kodePerusahaan').val();

        if($(this).parsley().validate()){
            $.ajax({
                url : 'Json/editPerusahaan.php',
                type: 'post',
                data: 'npwp='+npwp+'&siup='+siup+'&telp='+telp+'&hp='+hp+'&fax='+fax+'&kode='+kode,

                success : function (msg) {
                    if(msg != ''){
                        alert(msg);
                        location.reload('?p=info');
                    }
                }
            });
        }else{
            alert('Field Required!');
        }
    });
    
})