<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Kesiswaan</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_kelas_jurusan');?>">Kelas Jurusan</a></li>
				<li class="active">Edit Kelas Jurusan</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Kesiswaan
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Kelas Jurusan
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
					

					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_kelas_jurusan/update');?>">
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<div class="space-4"></div>

								<input type="hidden" id="form-field-1-1" class="form-control" name="id_kelas_jurusan" value="<?php echo $kelas_jurusan->id_kelas_jurusan;?>" required />

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Kelas</label>

									<div class="col-sm-6">
										<select class="form-control" id="form-field-select-1" name="id_kelas">
											<?php foreach ($kelas as $k) { 
												if($kelas_jurusan->id_kelas==$k['id_kelas']) {
													?>
													<option value="<?php echo $k['id_kelas'];?>" selected><?php echo $k['tingkat'];?></option>
												<?php } else { ?>
													<option value="<?php echo $k['id_kelas'];?>"><?php echo $k['tingkat'];?></option>
												<?php } }?>
											</select>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Jurusan</label>

										<div class="col-sm-6">
											<select class="form-control" id="form-field-select-1" name="id_jurusan">
												<?php foreach ($jurusan as $j) { 
													if ($kelas_jurusan->id_jurusan==$j['id_jurusan']) {
														?>
														<option value="<?php echo $j['id_jurusan'];?>" selected><?php echo $j['nama_jurusan'];?></option>
													<?php } else { ?>
														<option value="<?php echo $j['id_jurusan'];?>"><?php echo $j['nama_jurusan'];?></option>
													<?php } }?>
												</select>
											</div>
										</div>

										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Daya Tampung</label>

											<div class="col-sm-6">
												<input type="number" id="form-field-1-1" value="<?php echo $kelas_jurusan->daya_tampung;?>" class="form-control" name="daya_tampung" required />
											</div>
										</div>

										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Urutan Kelas</label>

											<div class="col-sm-6">
												<input type="text" id="form-field-1-1" value="<?php echo $kelas_jurusan->urutan_kelas_jurusan;?>" class="form-control" name="urutan_kelas_jurusan" required />
											</div>
										</div>

										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Wali Kelas</label>

											<div class="col-sm-6">
												<select class="form-control" id="form-field-select-1" name="id_wali_kelas">
													<?php foreach ($guru as $g) { 
														if ($kelas_jurusan->id_wali_kelas==$g['id_guru']) {
															?>
															<option value="<?php echo $g['id_guru'];?>" selected><?php echo $g['nama_guru'];?></option>
														<?php } else { ?>
															<option value="<?php echo $g['id_guru'];?>"><?php echo $g['nama_guru'];?></option>
														<?php } } ?>
													</select>
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
									<a href="<?php echo base_url('index.php/c_kelas_jurusan');?>">
										<i class="ace-icon fa fa-back bigger-110"></i>
										<< Kembali
									</a>
								</div>
							</div>
						</div>