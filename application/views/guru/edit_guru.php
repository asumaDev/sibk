<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Data Master</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_guru');?>">Guru</a></li>
				<li class="active">Edit Guru</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Data Master
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Guru
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
					

					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_guru/update');?>">
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<div class="space-4"></div>

								<input type="hidden" id="form-field-1-1" class="form-control" name="id_guru" value="<?php echo $guru->id_guru;?>" required />

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">NBM</label>

									<div class="col-sm-6">
										<input type="number" id="form-field-1-1" class="form-control" name="nbm" value="<?php echo $guru->nbm;?>" required />
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama</label>

									<div class="col-sm-6">
										<input type="text" id="form-field-1-1" value="<?php echo $guru->nama_guru;?>" class="form-control" name="nama_guru" required />
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Alamat</label>

									<div class="col-sm-6">
										<textarea name="alamat" class="form-control" id="form-field-8" ><?php echo $guru->alamat;?></textarea>
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Jenis Kelamin</label>

									<div class="col-sm-6">
										<select class="form-control" id="form-field-select-1" name="jenkel_guru">
											<?php if($guru->jenkel_guru=='L') { ?>
												<option value="L" checked>Laki-laki</option>
												<option value="P">Perempuan</option>
											<?php } else { ?> 
												<option value="P" checked>Perempuan</option>
												<option value="L">Laki-laki</option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Handphone</label>

									<div class="col-sm-6">
										<input type="number" id="form-field-1-1" value="<?php echo $guru->hp_guru;?>" class="form-control" name="hp_guru" required />
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Jabatan</label>

									<div class="col-sm-6">
										<select class="form-control" id="form-field-select-1" name="id_jabatan">
											<?php foreach ($jabatan as $j) { 
												if ($guru->id_jabatan==$j['id_jabatan']) { ?>
													<option value="<?php echo $j['id_jabatan'];?>" selected><?php echo $j['nama_jabatan'];?></option>
												<?php } else { ?>
													<option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
												<?php } } ?>
											</select>
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
					<a href="<?php echo base_url('index.php/c_guru');?>">
						<i class="ace-icon fa fa-back bigger-110"></i>
						<< Kembali
					</a>
				</div>