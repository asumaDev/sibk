<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Data Master</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_prestasi');?>">Prestasi</a></li>
				<li class="active">Edit Prestasi</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Data Master
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Prestasi
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
					

					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_prestasi/update');?>">
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<div class="space-4"></div>

								<input type="hidden" id="form-field-1-1" class="form-control" name="id_prestasi" value="<?php echo $prestasi->id_prestasi;?>" required />

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Prestasi</label>

									<div class="col-sm-6">
										<input type="text" id="form-field-1-1" class="form-control" name="nama_prestasi" value="<?php echo $prestasi->nama_prestasi;?>" required />
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Point Prestasi</label>

									<div class="col-sm-6">
										<input type="number" id="form-field-1-1" class="form-control" name="point_prestasi" value="<?php echo $prestasi->point_prestasi;?>" required />
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Kategori</label>

									<div class="col-sm-6">
										<select name="id_kat_prestasi" class="form-control">
											<?php foreach ($kat_prestasi as $k) { ?>
												<?php if ($prestasi->id_kat_prestasi == $k['id_kat_prestasi']){ ?>
													<option value="<?php echo $k['id_kat_prestasi'];?>" selected><?php echo $k['nama_kat_prestasi'];?></option>
												<?php } else { ?>
													<option value="<?php echo $k['id_kat_prestasi'];?>"><?php echo $k['nama_kat_prestasi'];?></option>
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
							<a href="<?php echo base_url('index.php/c_prestasi');?>">
								<i class="ace-icon fa fa-back bigger-110"></i>
								<< Kembali
							</a>
						</div>
					</div>
				</div>