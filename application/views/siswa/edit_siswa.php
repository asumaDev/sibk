<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Kesiswaan</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_siswa/tampil/').$siswa->id_kelas_jurusan;?>">Siswa</a></li>
				<li class="active">Edit Siswa</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Kesiswaan
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Siswa
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
					

					<form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('index.php/c_siswa/update');?>">
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<div class="space-4"></div>

								<input type="hidden" id="form-field-1-1" class="form-control" name="id_siswa" value="<?php echo $siswa->id_siswa;?>" required />

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">NIS</label>

									<div class="col-sm-6">
										<input type="number" id="form-field-1-1" value="<?php echo $siswa->nis;?>" class="form-control" name="nis" required />
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama</label>

									<div class="col-sm-6">
										<input type="text" id="form-field-1-1" value="<?php echo $siswa->nama_siswa;?>" class="form-control" name="nama_siswa" required />
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Alamat</label>

									<div class="col-sm-6">
										<textarea name="alamat_siswa" class="form-control" id="form-field-8" ><?php echo $siswa->alamat_siswa;?></textarea>
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Jenis Kelamin</label>

									<div class="col-sm-6">
										<select class="form-control" id="form-field-select-1" name="jenkel_siswa">
											<?php if($siswa->jenkel_siswa=='L') { ?>
												<option value="L" selected>Laki-laki</option>
												<option value="P">Perempuan</option>
											<?php } else { ?> 
												<option value="L">Laki-laki</option>
												<option value="P" selected>Perempuan</option>
											<?php } ?>
											
										</select>
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Handphone</label>

									<div class="col-sm-6">
										<input type="number" id="form-field-1-1" value="<?php echo $siswa->hp_siswa;?>" class="form-control" name="hp_siswa" required />
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Wali Murid</label>

									<div class="col-sm-6">
										<select class="form-control" id="form-field-select-1" name="id_ortu">
											<?php foreach ($ortu as $o) { 
												if ($siswa->id_ortu==$o['id_ortu']) { ?>
													<option value="<?php echo $o['id_ortu'];?>" selected><?php echo $o['nama_ortu'];?></option>
												<?php } else { ?>
													<option value="<?php echo $o['id_ortu'];?>"><?php echo $o['nama_ortu'];?></option>
												<?php } } ?>
											</select>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Handphone</label>

										<div class="col-sm-6">
											<input type="file" name="userfile" size="20" class="form-control" />
											<?php if($siswa->photo_siswa==null) { ?>
												<label style="color:red">Belum Ada Data Photo</label>
											<?php } else { ?>
												<a href="<?php echo base_url().$siswa->photo_siswa;?>" target="_blank">Lihat Photo Siswa</a>
											<?php } ?>
											
										</div>
									</div>

									

									<input type="hidden" id="form-field-1-1" value="<?php echo $siswa->id_kelas_jurusan;?>" class="form-control" name="id_kelas_jurusan" required />

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
							<a href="<?php echo base_url('index.php/c_siswa/tampil/').$siswa->id_kelas_jurusan;?>">
								<i class="ace-icon fa fa-back bigger-110"></i>
								<< Kembali
							</a>
						</div>
					</div>
				</div>