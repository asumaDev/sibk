<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Pelayanan BK</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_prestasi_siswa/tampil/').$prestasi_siswa->id_siswa;?>">Prestasi</a></li>
				<li class="active">Edit Prestasi <?php echo $prestasi_siswa->nama_siswa;?></li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Pelayanan BK
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Prestasi Siswa
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
					

					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_prestasi_siswa/update');?>">
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<div class="space-4"></div>
								<input type="hidden" id="form-field-1-1" value="<?php echo $prestasi_siswa->id_prestasi_siswa;?>" class="form-control" name="id_prestasi_siswa" required />
								<input type="hidden" id="form-field-1-1" value="<?php echo $prestasi_siswa->id_siswa;?>" class="form-control" name="id_siswa" required />

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Siswa</label>

									<div class="col-sm-6">
										<input type="text" id="form-field-1-1" value="<?php echo ' '.$prestasi_siswa->nama_siswa;?>" class="form-control" name="tingkat" required readonly />
									</div>
								</div>


								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tanggal | Waktu</label>

									<div class="col-sm-6">
										<input type="text" id="form-field-1-1" value="<?php echo $prestasi_siswa->waktu_input;?>" class="form-control" name="waktu_input" required readonly />
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Kategori Prestasi</label>

									<div class="col-sm-6">
										<input type="text" id="form-field-1-1" value="<?php echo $prestasi_siswa->nama_kat_prestasi;?>" class="form-control" name="id_kat_prestasi" required readonly />
									</select>
								</div>
							</div>

							<div class="space-4"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Prestasi</label>

								<div class="col-sm-6">
									<input type="text" id="form-field-1-1" value="<?php echo $prestasi_siswa->nama_prestasi;?>" class="form-control" name="nama_prestasi" required readonly />
								</div>
							</div>

							<div class="space-4"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Keterangan</label>

								<div class="col-sm-6">
									<textarea class="form-control" id="form-field-8" name="keterangan_prestasi"><?php echo $prestasi_siswa->keterangan_prestasi;?></textarea>
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
					<a href="<?php echo base_url('index.php/c_prestasi_siswa/tampil/').$prestasi_siswa->id_siswa;?>">
						<i class="ace-icon fa fa-back bigger-110"></i>
						<< Kembali
					</a>
				</div>
				<script>
					window.onload= function(){
						$("select[name='id_kat_prestasi']").change(function (){
							var url = "<?php echo base_url('index.php/c_prestasi_siswa/prestasi');?>/"+$(this).val();
							$("select[name='id_prestasi']").load(url);
							return false;
						});
					};
    // $(document).ready(function(){
    //     alert('tes');
    // });
</script>