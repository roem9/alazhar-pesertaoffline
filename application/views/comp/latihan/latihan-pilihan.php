<!-- latihan dengan pilihan beragam -->
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 mb-3">
                    <a id="backHome" class="btn btn-sm btn-danger text-light"><i class="fa fa-times mr-1"></i>keluar</a>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <!-- <label for="font">Ukuran Font</label> -->
                        <select name="font" id="font" class="form-control form-control-sm">
                            <option value="20px">Ganti Ukuran Font</option>
                            <option value="20px">20</option>
                            <option value="22px">22</option>
                            <option value="24px">24</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 mb-1">
                    <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-1"></i><?= $pesan?></div>
                </div>
            </div>
            <form action="" id="formSoal">
            <div class="row">
                    <?php 
                        $urut = 0;
                        foreach ($mufrodat as $i => $kalimat) :
                        $urut++;?>
                            <div class="col-12 col-md-12 mb-3 soal" id="soal<?= $i?>">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <?php if($soal == "arab"):?>
                                                <div class="d-flex justify-content-between" style="direction: unset !important;text-align:right;">
                                                    <span class="icon-cek-<?= $i?>"></span>
                                                    <label for="<?=$i?>" id="container-content"><strong><?= angka_arab($i+1)?>. <?= $kalimat['soal']?></strong></label>
                                                </div>
                                            <?php else :?>
                                                <div class="d-flex justify-content-between">
                                                    <label for="<?=$i?>" id="container-content"><strong><?= $i+1?>. <?= $kalimat['soal']?></strong></label>
                                                    <span class="icon-cek-<?= $i?>"></span>
                                                </div>
                                            <?php endif;?>
                                            <input type="hidden" name="kunci<?=$i?>" value="<?= $kalimat['jawaban']?>">
                                            <input type="hidden" name="j<?= $i?>" id="jawaban<?=$i?>">
                                            <div class="d-flex justify-content-center">
                                                <h5 class="text-right" id="j<?=$i?>"></h5>
                                            </div>
                                            <div id="select<?=$i?>">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <?php 
                                                            $choice[0] = $kalimat['jawaban'] ;
                                                            $r = 1;

                                                            shuffle($kalimat['kata']);

                                                            foreach ($kalimat['kata'] as $cek) {
                                                                if($cek != $kalimat['jawaban'] && $r <= 3){
                                                                    $choice[$r] = $cek;
                                                                    $r++;
                                                                }
                                                            }
                                                            array_unique($choice);
                                                            rsort($choice);
                                                        ?>
                                                        <?php foreach ($choice as $k => $data) :?>
                                                            <div class="radio-toolbar radio-shadow mr-1">
                                                                <input type="radio" id="<?= $i.$k?>" name="<?= $i?>1" class="btn-primary" value="<?= $data?>">
                                                                <label for="<?= $i.$k?>" id="container-content"><center><b><?= $data?></b></center></label>
                                                            </div>
                                                        <?php endforeach;?>
                                                    </div>
                                                </div>
                                                <a class="btn btn-block btn-sm btn-info text-light cek img-shadow" data-id="<?= $i?>|1">pilih</a>
                                            </div>
                                        </div>
                                        <?php if($i == 0) :?>
                                            <div class="d-flex justify-content-center">
                                                <a id="right<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light right"><i class="fa fa-angle-right"></i></a>
                                                <a id="btnEdit<?=$i?>" class="btn btn-sm btn-success text-light edit img-shadow" data-id="<?= $i?>" style="display: none">ubah</a>
                                            </div>
                                        <?php elseif($i == COUNT($mufrodat)) :?>
                                            <div class="d-flex justify-content-center">
                                                <a id="left<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light left mr-3"><i class="fa fa-angle-left"></i></a>
                                                <a id="btnEdit<?=$i?>" class="btn btn-sm btn-success text-light edit img-shadow" data-id="<?= $i?>" style="display: none">ubah</a>
                                            </div>
                                        <?php else :?>
                                            <div class="d-flex justify-content-center">
                                                <a id="left<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light left mr-3"><i class="fa fa-angle-left"></i></a>
                                                <a id="btnEdit<?=$i?>" class="btn btn-sm btn-success text-light edit img-shadow" data-id="<?= $i?>" style="display: none">ubah</a>
                                                <a id="right<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light right"><i class="fa fa-angle-right"></i></a>
                                            </div>
                                        <?php endif;?>
                                    </li>
                                </ul>
                            </div>
                    <?php endforeach;?>

                <div class="col-12 col-md-12 mb-3 text-center angka">
                    <span class="btn btn-sm btn-secondary"><span id="angka">1</span> / <?= COUNT($mufrodat)?></span>
                </div>
            </div>
            </form>
            <div class="row">
                <form action="<?= base_url()?>ft_1/add_latihan" method="post" id="latihan">
                    <!-- <input type="hidden" name="materi" value="<?= $materi?>">
                    <input type="hidden" name="tema" value="<?= $tema?>">
                    <input type="hidden" name="table" value="<?= $table?>">
                    <input type="hidden" name="latihan" value="Latihan 1">
                    <input type="hidden" name="redirect" value="<?= $redirect?>"> -->
                </form>
                <div class="col-12 col-md-12 mb-3 soal" id="soal<?= COUNT($mufrodat)?>">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-group">
                                <p>Selamat, Anda telah menyelesaikan latihan</p>
                                <a href="<?= base_url($redirect)?>" class="btn btn-block btn-primary text-light">Kembali</a>
                                <a data-id="<?= COUNT($mufrodat)?>" id="ulangi" class="btn btn-block btn-success text-light">Ulangi</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- <div class="col-12 col-md-12 mb-3"> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>

<script>
    $(".soal").hide();
    $("#soal0").show();
    $("#right0").hide();
    
    $(".right").click(function(){
        let id = $(this).data("id");
        
        id = id + 1;
        
        if($("#jawaban"+id).val() == "betul"){
            $("#right"+id).show();
        } else {
            $("#right"+id).hide();
        }

        $(".soal").hide();
        $("#soal"+id).show();
        if(id != <?= COUNT($mufrodat)?>){
            $("#angka").html(id+1);
        } else {
            $(".angka").hide();
        }
    })

    $(".left").click(function(){
        let id = $(this).data("id");
        $("#angka").html(id);
        
        id = id - 1;
        // console.log(id)
        $(".soal").hide();
        $("#soal"+id).show();

    })

    $("#ulangi").click(function(){
        let count = $(this).data("id");
        for (let i = 0; i < count; i++) {
            $("input[name='j"+i+"']").val("");
            $(".bg-cek-"+i).removeClass("list-group-item-success");
            $(".icon-cek-"+i).html("");
            $("#select"+i).show();
            $("#j"+i).html("");
        }
        
        $(".angka").show();
        $("#angka").html("1");
        $('#formSoal').trigger("reset");
        $("#soal"+count).hide();
        $("#soal0").show();
        $("#right0").hide();
    })

    $("#backHome").click(function(){
        Swal.fire({
            icon: 'question',
            text: 'yakin akan keluar dari latihan?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: '<a href="<?= base_url($redirect)?>">Ya</a>',
            cancelButtonText: 'Tidak'
        })
    })

    $(".cek").click(function(){
        let data = $(this).data("id");
        data = data.split("|");
        let id = parseInt(data[0]);
        let total = data[1];

        let html = '';
        for (let i = 0; i < total; i++) {
            html += $("input[name='"+id+""+1+"']:checked").val();
        }

        if(html === 'undefined'){
            html = '-';
        }

        if(html == $("input[name='kunci"+id+"']").val()){
            $(".icon-cek-"+id).html(`<i class="fa fa-check-circle text-success"></i>`);
            $("#j"+id).html(html);
            $("#jawaban"+id).val("betul");
            $("#select"+id).hide();
            $("#btnEdit"+id).hide();
            $("#right"+id).show();   
            // pindah soal 
                id = id + 1;
                if($("#jawaban"+id).val() == "betul"){
                    $("#right"+id).show();
                } else {
                    $("#right"+id).hide();
                }

                $(".soal").hide();
                $("#soal"+id).show();
                if(id != <?= COUNT($mufrodat)?>){
                    $("#angka").html(id+1);
                } else {
                    $(".angka").hide();
                }
            // pindah soal 
        } 
        else {
            $(".icon-cek-"+id).html(`<i class="fa fa-times-circle text-danger"></i>`);
            $("#jawaban"+id).val("salah");
        }
    })

    $(".edit").click(function(){
        let id = $(this).data("id");
        
        $("#btnEdit"+id).hide();
        $("#j"+id).html("");
        $("#jawaban"+id).val("");
        $("#select"+id).show();
    });
    
    $("#font").change(function(){
        let font = $(this).val();
        $("[id='container-content']").css("font-size", font)
    })
</script>