<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Kesiswaan</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_prestasi');?>">Absensi</a></li>
				<li class="active">Edit Data</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Kesiswaan
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Absensi
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
					

					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_absensi/update');?>">
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<div class="space-4"></div>

								<input type="hidden" id="form-field-1-1" class="form-control" name="id_absensi" value="<?php echo $absensi->id_absensi;?>" required />

								<input type="hidden" id="form-field-1-1" class="form-control" name="id_kelas_jurusan" value="<?php echo $absensi->id_kelas_jurusan;?>" required />

								<input type="hidden" id="form-field-1-1" class="form-control" name="tanggal_absensi" value="<?php echo $absensi->tanggal_absensi;?>" required />

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Sakit / Izin / Alpa</label>

									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-4">
												<input type="number" id="form-field-1-1" class="form-control" name="sakit" value="<?php echo $absensi->sakit;?>" required />
											</div>
											<div class="col-sm-4">
												<input type="number" id="form-field-1-1" class="form-control" name="izin" value="<?php echo $absensi->izin;?>" required />
											</div>
											<div class="col-sm-4">
												<input type="number" id="form-field-1-1" class="form-control" name="tanpa_ket" value="<?php echo $absensi->tanpa_ket;?>" required />
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>

						
						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Submit
								</button>
							</div>
						</div>

					</form>
					
					<div class="hr hr-24"></div>
					<div class="col-md-12">
						<a href="<?php echo base_url('index.php/c_absensi/tampil/').$absensi->id_kelas_jurusan.'/'.$absensi->tanggal_absensi;?>">
							<i class="ace-icon fa fa-back bigger-110"></i>
							<< Kembali
						</a>
					</div>