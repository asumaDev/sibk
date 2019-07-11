<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Data Master</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_kat_pelanggaran');?>">Kategori Pelanggaran</a></li>
				<li class="active">Edit Kategori Pelanggaran</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Data Master
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Kategori Pelanggaran
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
					

					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_kat_pelanggaran/update');?>">
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<div class="space-4"></div>

								<input type="hidden" id="form-field-1-1" class="form-control" name="id_kat_pelanggaran" value="<?php echo $kat_pelanggaran->id_kat_pelanggaran;?>" required />

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Kategori Pelanggaran</label>

									<div class="col-sm-6">
										<input type="text" id="form-field-1-1" class="form-control" name="nama_kat_pelanggaran" value="<?php echo $kat_pelanggaran->nama_kat_pelanggaran;?>" required />
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
						<a href="<?php echo base_url('index.php/c_kat_pelanggaran');?>">
							<i class="ace-icon fa fa-back bigger-110"></i>
							<< Kembali
						</a>
					</div>
				</div>
			</div>