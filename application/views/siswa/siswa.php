<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Kesiswaan</li>
				<li class="active">Siswa</li>
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
										<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_siswa/tampil');?>">
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
														<?php if ($this->uri->segment(2)!='tampil') { ?>
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

								<?php
								if ($this->uri->segment(2)!='tampil') { ?>

								<?php } else { ?>

									<?php $data = count($siswa); if ($status_hasil == NULL && $data !=NULL) { ?>
										<a href="#modal-pindah" role="button" class="blue" data-toggle="modal">
											<button class="btn btn-success btn-block">
												<i class="ace-icon fa fa-external-link small-60 white"></i>
												Naik Kelas
											</button>
										</a>
									<?php } else { ?>

										<small>-| Untuk Data Kelas Ini Sudah Mengalamai Kenaikan Kelas/Data Siswa Masih Kosong</small>

									<?php } } ?>
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
												
												<div class="clearfix">
													<div class="pull-right tableTools-container"></div>
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
																Daya Tampung : <?php echo $hitung = count($siswa);?>/<?php echo $id_kelas_jurusan->daya_tampung;?>
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
																<th>Alamat</th>
																<th>Jenis Kelamin</th>
																<?php if ($this->uri->segment(2)!='tampil') { ?>

																<?php } else { ?>
																	<th>

																		

																		<?php $hasil = $id_kelas_jurusan->daya_tampung-(count($siswa));
																		if($hasil<=0) { ?> 
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
																<?php $no = 1; foreach ($siswa as $s) { ?>
																	<tr>
																		<td class="center">
																			<?php echo $no++;?>
																		</td>
																		
																		<td><?php echo $s['nis'];?></td>
																		<td><?php echo $s['nama_siswa'];?></td>
																		<td><?php echo $s['alamat_siswa'];?></td>
																		<td>
																			<?php if($s['jenkel_siswa']=='L') {
																				echo 'Laki-laki';
																			} else {
																				echo 'Perempuan';
																			} ?>
																			
																		</td>
																		<td>
																			<div class="hidden-sm hidden-xs action-buttons">

																				<a class="green" href="<?php echo base_url('index.php/c_siswa/edit/').$s['id_siswa'];?>">
																					<i class="ace-icon fa fa-pencil bigger-130"></i>
																				</a>

																				<a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url('index.php/c_siswa/hapus/').$s['id_kelas_jurusan'].'/'.$s['id_siswa'];?>">
																					<i class="ace-icon fa fa-trash-o bigger-130"></i>
																				</a>

																				<?php if($s['account']==1) { ?>

																					<span class="label label-danger">User Aktif</span>

																				<?php } else { ?>

																					<a class="red" href="<?php echo base_url('index.php/c_siswa/account/').$s['id_siswa'];?>">
																						<i class="ace-icon fa fa-user bigger-130">User</i>
																					</a>

																				<?php } ?>

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
						</div>
					</div>
					





					<div id="modal-form" class="modal" tabindex="-1">
						<div class="modal-dialog">
							
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="blue bigger">Tambah Data Siswa</h4>
								</div>

								<div class="modal-body">
									<div class="row">
										<div class="col-xs-12 col-sm-12">
											
											<div class="hr hr-18 dotted hr-double"></div>
											
											<form class="form-horizontal" action="<?php echo base_url('index.php/c_siswa/upload');?>" method="post" enctype="multipart/form-data">
												<div class="form-group">
													<input type="hidden" id="form-field-1-1" value="<?php echo $id_kelas_jurusan->id_kelas_jurusan;?>" class="form-control" name="id_kelas_jurusan" required />

													<label class="col-xs-3" for="form-field-1-1">Input Data (Excel)</label>

													<div class="col-xs-6">
														<input type="file" name="file" class="form-control" required/>
													</div>
													<div class="col-sm-3">
														<button class="btn btn-sm btn-primary">
															<i class="ace-icon fa fa-plus"> Tambah</i>
														</button>
													</div>
												</div>
											</form>	

											<div class="hr hr-18 dotted hr-double"></div>

											<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('index.php/c_siswa/tambah_banyak');?>">
												<div class="clearfix form-actions">
													<div class="form-group">
														<input type="hidden" id="form-field-1-1" value="<?php echo $id_kelas_jurusan->id_kelas_jurusan;?>" class="form-control" name="id_kelas_jurusan" required />

														<label class="col-xs-7 control-label no-padding-right" for="form-field-1-1">Tambah Data Banyak | Masukan Jumlah</label>

														<div class="col-xs-2">
															<select class="form-control" id="form-field-select-1" name="banyak_input">
																<?php for ($i=$hasil;$i>0;$i--){ ?>

																	<option value="<?php echo $i;?>"><?php echo $i;?></option>
																<?php } ?>
															</select>
														</div>
														<div class="col-sm-3">
															<button class="btn btn-sm btn-primary">
																<i class="ace-icon fa fa-plus"></i>
																
															</button>
														</div>
													</div>
												</div>
											</form>

											<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('index.php/c_siswa/tambah');?>">
												<div class="hr hr-18 dotted hr-double"></div>
												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">NIS</label>

													<div class="col-sm-9">
														<input type="number" id="form-field-1-1" placeholder="ex : 9789787088969" class="form-control" name="nis" required />
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama</label>

													<div class="col-sm-9">
														<input type="text" id="form-field-1-1" placeholder="ex : Anggi Surya Permana" class="form-control" name="nama_siswa" required />
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Alamat</label>

													<div class="col-sm-9">
														<textarea name="alamat_siswa" class="form-control" id="form-field-8" placeholder="ex : Jl. Yogyakarta"></textarea>
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Jenis Kelamin</label>

													<div class="col-sm-9">
														<select class="form-control" id="form-field-select-1" name="jenkel_siswa" required>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
														</select>
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Handphone</label>

													<div class="col-sm-9">
														<input type="number" id="form-field-1-1" placeholder="ex : 0888xxxxxx" class="form-control" name="hp_siswa" required />
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Wali Murid</label>

													<div class="col-sm-9">
														<select class="form-control" id="form-field-select-1" name="id_ortu" required>
															<?php foreach ($ortu as $o) { ?>
																<option value="<?php echo $o['id_ortu'];?>"><?php echo $o['nama_ortu'];?></option>
															<?php } ?>
														</select>
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Photo Siswa</label>

													<div class="col-sm-9">
														<input type="file" name="userfile" size="20" class="form-control" required />
													</div>
												</div>

												<div class="form-group">
													<label class="col-xs-3 control-label no-padding-right" for="form-field-1-1">Buat Account</label>

													<div class="col-xs-9">
														<input name="user" class="ace ace-switch ace-switch-7" type="checkbox" value="1" />
														<span class="lbl"></span>
													</div>
												</div>


												
												<input type="hidden" id="form-field-1-1" value="<?php echo $id_kelas_jurusan->id_kelas_jurusan;?>" class="form-control" name="id_kelas_jurusan" required />
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
											</div>
										</div>
									</div>

									
								</div>
							
						</div>
					</div>



					<div id="modal-pindah" class="modal" tabindex="-1">
						<div class="modal-dialog">
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_siswa/transfer');?>">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Kenaikan Kelas</h4>
									</div>

									<div class="modal-body">
										<div class="row">
											<div class="col-xs-12 col-sm-12">

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Dari Kelas</label>

													<div class="col-sm-9">
														<input type="kelas" id="form-field-1-1" value="<?php echo $id_kelas_jurusan->tingkat.' '.$id_kelas_jurusan->nama_jurusan.' '.$id_kelas_jurusan->urutan_kelas_jurusan;?>" readonly required class="form-control"	/>
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Pilih Tahun Ajaran</label>

													<div class="col-sm-9">
														<select class="form-control" id="form-field-select-1" name="id_tahun">
															<?php foreach ($tahun as $t) { 
																if ($_SESSION['id_tahun']==$t['id_tahun']) { ?>
																	
																<?php } else { ?>
																	<option value="<?php echo $t['id_tahun'];?>"><?php echo $t['tahun_ajaran'];?></option>
																<?php } } ?>
															</select>
														</div>
													</div>


													<div class="space-4"></div>

													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Naik Kelas</label>

														<div class="col-sm-9">
															<select class="form-control" id="form-field-select-1" name="id_kelas_jurusan">

																<?php foreach ($kelas_jurusan as $k) { 
																	if ($id_kelas_jurusan->id_kelas_jurusan==$k['id_kelas_jurusan']) {
																		?>
																		
																	<?php } else { ?>
																		<option value="<?php echo $k['id_kelas_jurusan'];?>"><?php echo $k['tingkat'].' '.$k['nama_jurusan'].' '.$k['urutan_kelas_jurusan'];?></option>
																	<?php }}?>
																</select>
															</div>
														</div>

														<div class="space-4"></div>

														<div class="form-group">
															<label class="col-xs-3 control-label no-padding-right" for="form-field-1-1">Semua Data</label>

															<div class="col-xs-9">
																<input name="seleksi" class="ace ace-switch ace-switch-7" type="checkbox" value="1" />
																<span class="lbl"></span>
															</div>
														</div>

														<input type="hidden" id="form-field-1-1" value="<?php echo $id_kelas_jurusan->id_kelas_jurusan;?>" class="form-control" name="kelas_jurusan" required />

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
													Proses
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>