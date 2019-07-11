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
										Pilih Jurusan Kelas
									</h5>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_absensi/tampil');?>">
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Kelas</label>

												<div class="col-sm-9">
													<select class="form-control" id="form-field-select-1" name="id_kelas_jurusan">

														<?php foreach ($kelas_jurusan as $k) { 
															if ($id_kelas_jurusan->id_kelas_jurusan==$k['id_kelas_jurusan']) {
																?>
																<option value="<?php echo $k['id_kelas_jurusan'];?>" selected><?php echo $k['tingkat'].' '.$k['nama_jurusan'].' '.$k['urutan_kelas_jurusan'];?></option>
															<?php } else { ?>
																<option value="<?php echo $k['id_kelas_jurusan'];?>"><?php echo $k['tingkat'].' '.$k['nama_jurusan'].' '.$k['urutan_kelas_jurusan'];?></option>
															<?php }}?>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tanggal</label>

													<div class="col-sm-9">
														<?php if ($tanggal_absensi==NULL) { ?> 
															<input type="date" id="form-field-1-1" class="form-control" name="tanggal_absensi" required />
														<?php } else { ?>
															<input type="date" id="form-field-1-1" value="<?php echo $tanggal_absensi;?>" class="form-control" name="tanggal_absensi" required />
														<?php } ?>
														
													</div>
												</div>

												<div class="row">
													<div class="col-sm-3">
														
													</div>
													<div class="col-sm-9">
														<?php if ($tanggal_absensi==NULL) { ?>
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
											Hasil Result
										</h5>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div class="row">
												<div class="col-xs-6">
													<div class="form">
														<div class="form-group">
															<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_absensi/tambah');?>">
																<?php if ($tanggal_absensi==NULL) { ?> 
																	
																<?php } else { ?>
																	<input type="hidden" id="form-field-1-1" value="<?php echo $tanggal_absensi;?>" class="form-control" name="tanggal_absensi" required hidden/>
																<?php } ?>
																<div class="form-group" hidden>
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Kelas</label>

																	<div class="col-sm-9">
																		<select class="form-control" id="form-field-select-1" name="id_kelas_jurusan">

																			<?php foreach ($kelas_jurusan as $k) { 
																				if ($id_kelas_jurusan->id_kelas_jurusan==$k['id_kelas_jurusan']) {
																					?>
																					<option value="<?php echo $k['id_kelas_jurusan'];?>" selected><?php echo $k['tingkat'].' '.$k['nama_jurusan'].' '.$k['urutan_kelas_jurusan'];?></option>
																				<?php } else { ?>
																					<option value="<?php echo $k['id_kelas_jurusan'];?>"><?php echo $k['tingkat'].' '.$k['nama_jurusan'].' '.$k['urutan_kelas_jurusan'];?></option>
																				<?php }}?>
																			</select>
																		</div>
																	</div>
																	<?php if ($tanggal_absensi==NULL) { ?> 
																		
																	<?php } else { ?>
																		<?php if (count($absensi)==NULL) { ?>
																			<button class="btn btn-sm btn-primary">
																				<i class="ace-icon fa fa-plus"></i>
																				Input
																			</button>
																		<?php } else {}?>
																	<?php } ?>
																</form>
															</div>
														</div>
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
																Results for "<?php echo $id_kelas_jurusan->tingkat.' '.$id_kelas_jurusan->nama_jurusan.' '.$id_kelas_jurusan->urutan_kelas_jurusan;?>"
															</div>
															<div class="col-xs-3">
																Daya Tampung : <?php $hasil = $id_kelas_jurusan->daya_tampung-(count($absensi)); echo $hasil;?>/<?php echo $id_kelas_jurusan->daya_tampung;?>
															</div>
														<?php } ?>
														
													</div>
												</div>

												<!-- div.table-responsive -->

												<!-- div.dataTables_borderWrap -->
												<div>
													<table id="dynamic-table" class="table table-striped table-bordered table-hover">
														<thead>
															<tr>
																<th class="center">
																	No
																</th>
																<th>NIS</th>
																<th>Nama Siswa</th>
																<th>Sakit</th>
																<th>Izin</th>
																<th>Alpa</th>
																<th>Status</th>
															</tr>
														</thead>

														<tbody>
															<?php if ($tanggal_absensi==NULL) { ?>

															<?php } else { ?>
																<?php $no = 1; foreach ($absensi as $a) { ?>
																	<tr>
																		<td class="center">
																			<?php echo $no++;?>
																		</td>
																		
																		<td><?php echo $a['nis'];?></td>
																		<td><?php echo $a['nama_siswa'];?></td>
																		<td><?php echo $a['sakit'];?></td>
																		<td><?php echo $a['izin'];?></td>
																		<td><?php echo $a['tanpa_ket'];?></td>
																		<td>
																			<div class="hidden-sm hidden-xs action-buttons">

																				<a class="green" href="<?php echo base_url('index.php/c_absensi/edit/').$a['id_absensi'];?>">
																					<i class="ace-icon fa fa-pencil bigger-130"></i>
																				</a>

																			<!-- <a onclick="javascript: return confirm('Are you sure you want to delete this data ?')" class="red" href="<?php echo base_url('index.php/c_absensi/hapus/').$a['id_kelas_jurusan'].'/'.$a['id_absensi'].'/'.$tanggal_absensi;?>">
																				<i class="ace-icon fa fa-trash-o bigger-130"></i>
																			</a> -->
																		</div>
																	</td>
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
						</div></div>
					</div>
					