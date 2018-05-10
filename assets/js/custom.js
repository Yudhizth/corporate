$(document).ready(function(){

   
    $('#replayComplain').on('submit', function(e){
        e.preventDefault();
        
        var kupon = $('#kode_kupon').val();
        var judul = $('#judulComplain').val();
        var msg = $('#msg').val();
        var kode = $('#kode_perusahaan').val();

        if($(this).parsley().validate() && msg != ''){
            $.ajax({

                url : 'Json/komplain.php?type=replay',
                type: 'post',
                data: 'kode='+kupon+'&judul='+judul+'&msg='+msg+'&id='+kode,

                success : function (msg) {
                    if(msg != ''){
                        alert(msg);
                        location.reload();
                    }
                    $('#replayComplain').trigger("reset");
                }
            });
        }else{
            alert('Field Required');
        }
    });
});