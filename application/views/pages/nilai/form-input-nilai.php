<div class="container">
	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-xl-5 col-lg-5 col-md-5">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-12">
							<div class="p-4">
								<div class="col-12 d-flex justify-content-center mb-1">
									<img src="<?= base_url()?>assets/img/logo.png" width="75" class="img-fluid img-shadow">
								</div>
								<div class="text-center">
									<h5 class="text-gray-900 mb-4"><?= $title?></h5>
								</div>
								<?php if( $this->session->flashdata('pesan') ) : ?>
									<div class="row">
										<div class="col-12">
											<?=$this->session->flashdata('pesan')?>
										</div>
									</div>
								<?php endif; ?>
								<form action="<?= base_url()?>nilai/input_nilai" method="POST">
                                    <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas']?>">
                                    <input type="hidden" name="pelajaran" value="<?= $pelajaran?>">

                                    <?php foreach ($peserta as $i => $peserta) :?>
                                        <div class="form-group d-flex justify-content-between">
                                                <div class="col-8">
                                                    <span>
                                                        <?= ($i+1).". ".$peserta['nama_indo'];?>
                                                    </span>
                                                </div>
                                                <div class="col-4">
                                                    <span>
                                                        <input type="hidden" name="id[<?= $i?>]" value="<?= $peserta['id_peserta']?>">
                                                        <input type="text" name="nilai[<?= $i?>]" class="form-control form-control-sm" value="<?= $peserta['nilai']?>">
                                                    </span>
                                                </div>
                                        </div>
                                    <?php endforeach;?>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-sm btn-primary" id="btnSimpan">Simpan</button>
                                    </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>