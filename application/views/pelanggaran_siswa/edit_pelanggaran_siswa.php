<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Pelayanan BK</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_pelanggaran_siswa/tampil/').$pelanggaran_siswa->id_siswa;?>">pelanggaran</a></li>
				<li class="active">Edit Pelanggaran <?php echo $pelanggaran_siswa->nama_siswa;?></li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Pelayanan BK
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Pelanggaran Siswa
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="social-auth-links text-left">
				<?php  if($this->session->flashdata('alert')) : ?>
					<?php echo '<div class="social-auth-links text-center"> <div class="alert alert-info"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
				<?php endif;?>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					

					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_pelanggaran_siswa/update');?>">
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<div class="space-4"></div>
								<input type="hidden" id="form-field-1-1" value="<?php echo $pelanggaran_siswa->id_pelanggaran_siswa;?>" class="form-control" name="id_pelanggaran_siswa" required />
								<input type="hidden" id="form-field-1-1" value="<?php echo $pelanggaran_siswa->id_siswa;?>" class="form-control" name="id_siswa" required />

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Siswa</label>

									<div class="col-sm-6">
										<input type="text" id="form-field-1-1" value="<?php echo ' '.$pelanggaran_siswa->nama_siswa;?>" class="form-control" name="tingkat" required readonly />
									</div>
								</div>


								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tanggal | Waktu</label>

									<div class="col-sm-6">
										<input type="text" id="form-field-1-1" value="<?php echo $pelanggaran_siswa->waktu_input;?>" class="form-control" name="waktu_input" required readonly />
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Kategori pelanggaran</label>

									<div class="col-sm-6">
										<input type="text" id="form-field-1-1" value="<?php echo $pelanggaran_siswa->nama_kat_pelanggaran;?>" class="form-control" name="id_kat_pelanggaran" required readonly />
									</select>
								</div>
							</div>

							<div class="space-4"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">pelanggaran</label>

								<div class="col-sm-6">
									<input type="text" id="form-field-1-1" value="<?php echo $pelanggaran_siswa->nama_pelanggaran;?>" class="form-control" name="nama_pelanggaran" required readonly />
								</div>
							</div>


							<div class="space-4"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tanggal Pelanggaran</label>

								<div class="col-sm-6">
									<input type="date" id="form-field-1-1" class="form-control" value="<?php echo $pelanggaran_siswa->waktu_melanggar;?>" name="waktu_melanggar" required />
								</div>
							</div>

							<div class="space-4"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tempat Pelanggaran</label>

								<div class="col-sm-6">
									<input type="text" id="form-field-1-1" class="form-control" value="<?php echo $pelanggaran_siswa->tempat_pelanggaran;?>" name="tempat_pelanggaran" required />
								</div>
							</div>


							<div class="space-4"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Keterangan</label>

								<div class="col-sm-6">
									<textarea class="form-control" id="form-field-8" name="tindak_lanjut"><?php echo $pelanggaran_siswa->tindak_lanjut;?></textarea>
								</div>
							</div>
						</div>
					</div>


					<div class="modal-footer">
						<button class="btn btn-sm" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Cancel
						</button>

						<button class="btn btn-sm btn-primary">
							<i class="ace-icon fa fa-check"></i>
							Save
						</button>
					</div>
				</form>
				
				<div class="hr hr-24"></div>
				<div class="col-md-12">
					<a href="<?php echo base_url('index.php/c_pelanggaran_siswa/tampil/').$pelanggaran_siswa->id_siswa;?>">
						<i class="ace-icon fa fa-back bigger-110"></i>
						<< Kembali
					</a>
				</div>
				<script>
					window.onload= function(){
						$("select[name='id_kat_pelanggaran']").change(function (){
							var url = "<?php echo base_url('index.php/c_pelanggaran_siswa/pelanggaran');?>/"+$(this).val();
							$("select[name='id_pelanggaran']").load(url);
							return false;
						});
					};
    // $(document).ready(function(){
    //     alert('tes');
    // });
</script>