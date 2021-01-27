<div class="container">
	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-xl-5 col-lg-5 col-md-5">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-12">
							<div class="p-5">
								<div class="text-center mb-3">
									<img src="<?= base_url()?>assets/img/logo.png" width="75" class="img-fluid img-shadow">
								</div>
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4"><?= $title?></h1>
								</div>
								<?php if( $this->session->flashdata('pesan') ) : ?>
									<div class="row">
										<div class="col-12">
											<?=$this->session->flashdata('pesan')?>
										</div>
									</div>
								<?php endif; ?>
								<form action="registrasi/add_peserta" method="POST">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" id="nik" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_indo">Nama Lengkap</label>
                                        <input type="text" name="nama_indo" id="nama_indo" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="t4_lahir_indo">Tempat Lahir</label>
                                        <input type="text" name="t4_lahir_indo" id="t4_lahir_indo" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tgl Lahir</label>
                                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select name="jk" id="jk" class="form-control form-control-sm">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="desa_kel_indo">Desa / Kelurahan</label>
                                        <input type="text" name="desa_kel_indo" id="desa_kel_indo" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kec_indo">Kecamatan</label>
                                        <input type="text" name="kec_indo" id="kec_indo" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kota_kab_indo">Kota / Kabupaten</label>
                                        <input type="text" name="kota_kab_indo" id="kota_kab_indo" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_wa">No Whatsapp</label>
                                        <input type="text" name="no_wa" id="no_wa" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control form-control-sm">
                                        <small id="emailHelp" class="form-text text-danger">*email tidak wajib diisi</small>
                                    </div>
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

<script>
    $("#btnSimpan").click(function(){
        if(confirm("Yakin akan menyimpan data Anda?")){
            
        } else {
            return false
        }

    })
</script>