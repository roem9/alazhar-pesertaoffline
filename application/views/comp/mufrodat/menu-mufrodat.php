
        <!-- Modal -->
        <div class="modal fade" id="daftarIsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="daftarIsiTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info"><i class="fa fa-info-circle text-info mr-1"></i>Silahkan pilih kata yang ingin Anda gunakan untuk latihan</div>
                    <form action="" id="btn-mulai" method="POST">
                        <ul class="list-group shadow">
                            <?php foreach ($mufrodat as $mufrodat) :?>
                                <div class="col-12">
                                    <li class="list-group-item d-flex justify-content-end arab" id="container-content">
                                        <span>
                                            <?= $mufrodat['kata']?>
                                        </span>
                                        <input type="checkbox" name="data[]" value="<?= $mufrodat['id']?>" class="ml-3" checked>
                                    </li>
                                </div>
                            <?php endforeach;?>
                            <li class="list-group-item">
                                <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-1"></i><span class="message"></span></div>
                            </li>
                            <li class="list-group-item"><input type="submit" class="btn btn-sm btn-block btn-success" value="Mulai!"></li>
                        </ul>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">                    
                    <a href="<?= base_url()?><?= $level?>/mufrodat" class="btn btn-sm btn-success"><i class="fa fa-home mr-1"></i>Mufrodat</a>
                    </div>
                <div class="col-12 mb-3">
                    <img src="<?= base_url()?>assets/img/<?= $level?>/<?= str_replace("Mufrodat ", "", $materi)?>.jpg" class="img-rounded img-fluid" alt="Cinque Terre">
                </div>
                <div class="col-12 mb-3">
                    <?php if($back != "" && $next != "") :?>
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url()?><?= $back?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-left "></i></a>
                            <a href="<?= base_url()?><?= $next?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
                        </div>
                    <?php elseif($back != "" && $next == ""):?>
                        <div class="d-flex justify-content-start">
                            <a href="<?= base_url()?><?= $back?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-left "></i></a>
                        </div>
                    <?php elseif($back == "" && $next != "") :?>
                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url()?><?= $next?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
                        </div>
                    <?php endif;?>
                </div>
                <?php if(COUNT($mufrodat) != 0):?>
                    <div class="col-12">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-warning">Latihan</li>
                            <li class="list-group-item "><a href="#daftarIsi" data-toggle="modal" data-id="Latihan 1|<?= base_url()?><?= $level?>/mufrodat?latihan=<?= MD5($materi)?>&i=1" class="btn btn-sm btn-block btn-success btn-latihan">Latihan 1</a></li>
                            <li class="list-group-item "><a href="#daftarIsi" data-toggle="modal" data-id="Latihan 2|<?= base_url()?><?= $level?>/mufrodat?latihan=<?= MD5($materi)?>&i=2" class="btn btn-sm btn-block btn-success btn-latihan">Latihan 2</a></li>
                            <li class="list-group-item "><a href="#daftarIsi" data-toggle="modal" data-id="Latihan 3|<?= base_url()?><?= $level?>/mufrodat?latihan=<?= MD5($materi)?>&i=3" class="btn btn-sm btn-block btn-success btn-latihan">Latihan 3</a></li>
                        </ul>
                    </div>
                <?php else :?>
                    <div class="col-12 col-md-6">
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-info-circle  text-info"></i> belum ada kalimat. bersabarlah :)
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div>
<script>
    $("#tema").addClass("active");
    
    $(".btn-latihan").click(function(){
        let data = $(this).data("id");
        data = data.split("|")
        let judul = data[0];
        let link = data[1];

        if(judul == "Latihan 1"){
            $(".message").html("Latihan menerjemahkan bahasa Indonesia Ke bahasa Arab")
        } else if (judul == "Latihan 2"){
            $(".message").html("Latihan menerjemahkan bahasa Arab Ke bahasa Indonesia")
        } else {
            $(".message").html("Latihan menerjemahkan bahasa Indonesia Ke bahasa Arab dengan mengetik")
        }

        $("#daftarIsiTitle").html(judul);
        $("#btn-mulai").attr("action", link)
    })
    
    $("#font").change(function(){
        let font = $(this).val();
        $("[id='container-content']").css("font-size", font)
    })
</script>

