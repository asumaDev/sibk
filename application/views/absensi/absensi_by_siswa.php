<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Kesiswaan</li>
				<li class="active">Absensi</li>
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
					
					<div class="row">
						<div class="col-xs-4">
							<div class="widget-box widget-color-blue" id="widget-box-2">
								<div class="widget-header">
									<h5 class="widget-title bigger lighter">
										<i class="ace-icon fa fa-table"></i>
										Rentang Absensi
									</h5>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_absensi/tampil_siswa');?>">

											<input type="hidden" id="form-field-1-1" value="<?php echo $id_siswa;?>" class="form-control" name="id_siswa" required />
											
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Awal</label>

												<div class="col-sm-9">
													<?php if ($tanggal_awal==NULL) { ?> 
														<input type="date" id="form-field-1-1" class="form-control" name="tanggal_awal" required />
													<?php } else { ?>
														<input type="date" id="form-field-1-1" value="<?php echo $tanggal_awal;?>" class="form-control" name="tanggal_awal" required />
													<?php } ?>
													
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Akhir</label>

												<div class="col-sm-9">
													<?php if ($tanggal_akhir==NULL) { ?> 
														<input type="date" id="form-field-1-1" class="form-control" name="tanggal_akhir" required />
													<?php } else { ?>
														<input type="date" id="form-field-1-1" value="<?php echo $tanggal_akhir;?>" class="form-control" name="tanggal_akhir" required />
													<?php } ?>
													
												</div>
											</div>

											<div class="row">
												<div class="col-sm-3">
													
												</div>
												<div class="col-sm-9">
													<?php if ($tanggal_awal==NULL) { ?>
													<?php } else { ?>
														<button class="btn btn-sm btn-warning">
															<i class="ace-icon fa fa-circle-o"></i>
															Refersh
														</button>
													<?php } ?>
													

													<button class="btn btn-sm btn-primary">
														<i class="ace-icon fa fa-eye"></i>
														Lihat
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-8">
							<div class="widget-box widget-color-blue" id="widget-box-2">
								<div class="widget-header">
									<h5 class="widget-title bigger lighter">
										<i class="ace-icon fa fa-table"></i>
										Hasil Result "<?php echo $nama_siswa;?>"
									</h5>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<div class="row">
											<div class="col-xs-6">
											</div>
											<div class="col-xs-6">
												<div class="clearfix">
													<div class="pull-right tableTools-container"></div>
												</div>
											</div>
										</div>
										
										<div class="table-header">
											<div class="row">
												<?php if ($this->uri->segment(2)!='tampil') { ?>
													<div class="col-xs-9">
														Results for "Data"
													</div>
													<div class="col-xs-3">
														Daya Tampung : 0/0
													</div>
												<?php } else { ?>
													<div class="col-xs-9">
														Results for "<?php echo $nama_siswa;?>"
													</div>
													<div class="col-xs-3">
														Absensi Siswa
													</div>
												<?php } ?>
												
											</div>
										</div>


										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															No <br/>
															{ <?php echo $nama_siswa;?> ]
														</th>
														<th>Tanggal</th>
														<th>Sakit</th>
														<th>Izin</th>
														<th>Alpa</th>
													</tr>
												</thead>

												<tbody>
													<?php if ($tanggal_awal==NULL) { ?>

													<?php } else { ?>
														<?php $no = 1; foreach ($absensi as $a) { ?>
															<tr>
																<td class="center">
																	<?php echo $no++;?>
																</td>
																<td><?php echo $a['tanggal_absensi'];?></td>
																<td><?php echo $a['sakit'];?></td>
																<td><?php echo $a['izin'];?></td>
																<td><?php echo $a['tanpa_ket'];?></td>
															</tr>

														<?php } ?>
													<?php } ?>
													
													
												</tbody>
											</table>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>