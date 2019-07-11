
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Pribadi Siswa</li>
				<li class="active">Penilaian</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Pribadi Siswa
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Penilaian
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
										<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_penilaian_siswa/tampil');?>">
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
												<div class="row">
													<div class="col-sm-3">
														
													</div>
													<div class="col-sm-9">
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

								<div class="space-4"></div>
								<div class="space-4"></div>

								<div class="widget-box widget-color-green" id="widget-box-2">
									<div class="widget-header">
										<h5 class="widget-title bigger lighter">
											<i class="ace-icon fa fa-book"></i>
											Keterangan Tabel
										</h5>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<b>SWB</b> -> Sholat Wajib Berjamaah
											<div class="hr hr-1 hr-double"></div>

											<b>KBA</b> -> Kebiasaan Membaca Al-Quran
											<div class="hr hr-1 hr-double"></div>

											<b>SS</b> -> Sholat Sunnah
											<div class="hr hr-1 hr-double"></div>

											<b>KRJ</b> -> Kerajinan
											<div class="hr hr-1 hr-double"></div>

											<b>KDS</b> -> Kedisiplinan
											<div class="hr hr-1 hr-double"></div>

											<b>KRP</b> -> Kerapihan
											<div class="hr hr-1 hr-double"></div>
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
												<div class="col-xs-3">

													<?php if ($this->uri->segment(2)!='tampil') { ?>

													<?php } else { ?>

														<?php $hasil = count($penilaian_siswa); 
														if ($hasil==0) { ?>
														<?php } else { ?>
															<a href="<?php echo base_url('index.php/c_penilaian_siswa/cetak/').$id_kelas_jurusan->id_kelas_jurusan;?>" target="_blank">
																<button class="btn btn-sm btn-warning">
																	<i class="ace-icon fa fa-print"></i>
																	Cetak
																</button>
															</a>
														<?php } }?>
													</div>
													<div class="col-xs-9">
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
																<?php if (count($penilaian_siswa)==NULL) { 
																	echo "Data Belum Diinput"; }?>
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
																	<th>Nama Siswa</th>
																	<th>SWB</th>
																	<th>KBA</th>
																	<th>SS</th>
																	<th>KRJ</th>
																	<th>KDS</th>
																	<th>KRP</th>
																	<?php if ($this->uri->segment(2)!='tampil') { ?>

																	<?php } else { ?>
																		<th>

																			

																			<?php $hasil = count($penilaian_siswa);
																			if($hasil!=0) { ?> 
																				Status
																			<?php } else { ?>
																				<a href="#modal-form" role="button" class="blue" data-toggle="modal">
																					<button class="btn btn-white btn-info btn-bold">
																						<i class="ace-icon fa fa-plus small-60 blue"></i>
																						Tambah
																					</button>
																				</a>
																			<?php } ?>
																			


																		</th>
																	<?php } ?>
																</tr>
															</thead>

															<tbody>
																<?php if ($this->uri->segment(2)!='tampil') { ?>

																<?php } else { ?>
																	<?php $no = 1; foreach ($penilaian_siswa as $ps) { ?>
																		<tr>
																			<td class="center">
																				<?php echo $no++;?>
																			</td>
																			<td><?php echo $ps['nama_siswa'];?></td>
																			<td><?php echo $ps['sholat_wajib'];?></td>
																			<td><?php echo $ps['membaca_kitab'];?></td>
																			<td><?php echo $ps['sholat_sunnah'];?></td>
																			<td><?php echo $ps['kerajinan'];?></td>
																			<td><?php echo $ps['kedisiplinan'];?></td>
																			<td><?php echo $ps['kerapihan'];?></td>
																			<td>
																				<div class="hidden-sm hidden-xs action-buttons">

																					<a class="green" href="<?php echo base_url('index.php/c_penilaian_siswa/edit/').$ps['id_penilaian_siswa'];?>">
																						<i class="ace-icon fa fa-pencil bigger-130"></i>
																					</a>

																			<!-- <a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url('index.php/c_penilaian_siswa/hapus/').$ps['id_kelas_jurusan'].'/'.$ps['id_penilaian_siswa'];?>">
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
						</div>
						<?php if($this->uri->segment(2)=='tampil') { ?>
						</div>
					</div>
				<?php } ?>
				




				<div id="modal-form" class="modal" tabindex="-1">
					<div class="modal-dialog">
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_penilaian_siswa/tambah_banyak');?>">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="blue bigger">Tambah Data Siswa</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-xs-12 col-sm-12">
											<div class="clearfix form-actions">
												<div class="form-group">
													<input type="hidden" id="form-field-1-1" value="<?php echo $id_kelas_jurusan->id_kelas_jurusan;?>" class="form-control" name="id_kelas_jurusan" required />

													<label class="col-xs-10 control-label no-padding-right" for="form-field-1-1">Kelas 
														<?php echo $id_kelas_jurusan->tingkat.' '.$id_kelas_jurusan->nama_jurusan.' '.$id_kelas_jurusan->urutan_kelas_jurusan;?>
													| Total Data Siswa </label>

													<div class="col-xs-2">
														<input type="number" id="form-field-1-1" class="form-control" name="banyak_input" value="<?php echo $hasil= (count($siswa)-count($penilaian_siswa));?>"  readonly required />
													</div>
												</div>
											</div>

											<?php if ($this->uri->segment(2)=='tampil') { ?>

												<input type="hidden" id="form-field-1-1" value="<?php echo $id_kelas_jurusan->id_kelas_jurusan;?>" class="form-control" name="id_kelas_jurusan" required />

											<?php } ?>

											<div class="hr hr-18 dotted hr-double"></div>
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-sm" data-dismiss="modal">
										<i class="ace-icon fa fa-times"></i>
										Cancel
									</button>

									<button class="btn btn-sm btn-primary">
										<i class="ace-icon fa fa-plus"></i>
										Input
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>