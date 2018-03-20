<div class="row" style="padding-top: 6%;">
    <div class="col-md-6 col-xs-12 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Profile</h3>
            </div>
            <div class="panel-body">
                <form id="editPerusahaan" method="post" data-parsley-validate="">
<!--                    <div class="form-group">-->
<!--                        <label for="editName">Nama Perusahaan</label>-->
<!--                        <input type="text" class="form-control" id="editName" placeholder="--><?//=$info['nama_perusahaan']?><!--" data-parsley-minlength="5" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 5 character.." required>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="editAlamat">Alamat Lengkap</label>-->
<!--                        <textarea class="form-control" id="editAlamat" rows="3" data-parsley-minlength="10" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 10 character.." required placeholder="--><?//=$info['alamat']?><!--, --><?//=$info['kelurahan']?><!--, --><?//=$info['kecamatan']?><!--, --><?//=$info['kota']?><!--"></textarea>-->
<!--                    </div>-->
                    <div class="form-group">
                        <input type="hidden" id="kodePerusahaan" value="<?=$info['kode_perusahaan']?>">
                        <label for="editNPWP">NOMOR NPWP</label>
                        <input type="text" class="form-control" value="<?=$info['nomor_NPWP']?>" id="editNPWP"
                               placeholder="......." data-parsley-minlength="5"
                               data-parsley-maxlength="100"
                               data-parsley-type="number"
                               data-parsley-minlength-message="Come on! You need to enter at least a 5 character.."
                               required>
                    </div>
                    <div class="form-group">
                        <label for="editSIUP">NOMOR SIUP</label>
                        <input type="text" class="form-control" value="<?=$info['nomor_SIUP']?>" id="editSIUP"
                               placeholder="......." data-parsley-minlength="5"
                               data-parsley-maxlength="100"
                               data-parsley-type="number"
                               data-parsley-minlength-message="Come on! You need to enter at least a 5 character.."
                               required>
                    </div>
                    <div class="form-group">
                        <label for="editPhone">NOMOR Telp.</label>
                        <input type="text" class="form-control" value="<?=$info['nomor_telp']?>" id="editPhone"
                               placeholder="......." data-parsley-minlength="5"
                               data-parsley-maxlength="100"
                               data-parsley-type="number"
                               data-parsley-minlength-message="Come on! You need to enter at least a 5 character.."
                               required>
                    </div>
                    <div class="form-group">
                        <label for="editHP">NOMOR Handphone</label>
                        <input type="text" class="form-control" value="<?=$info['nomor_hp']?>" id="editHP"
                               placeholder="......." data-parsley-minlength="5"
                               data-parsley-maxlength="100"
                               data-parsley-type="number"
                               data-parsley-minlength-message="Come on! You need to enter at least a 5 character.."
                               required>
                    </div>
                    <div class="form-group">
                        <label for="editFAX">NOMOR FAX</label>
                        <input type="text" class="form-control" value="<?=$info['nomor_fax']?>" id="editFAX"
                               placeholder="......." data-parsley-minlength="5"
                               data-parsley-maxlength="100"
                               data-parsley-type="number"
                               data-parsley-minlength-message="Come on! You need to enter at least a 5 character.."
                               required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>