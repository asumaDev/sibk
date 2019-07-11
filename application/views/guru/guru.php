<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Data Master</li>
				<li class="active">Guru</li>
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
					

					<div class="row">
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-3">
									<?php $data = count($guru); if ($status_hasil == NULL && $data !=NULL) { ?>
										<a href="#modal-pindah" role="button" class="blue" data-toggle="modal">
											<button class="btn btn-success btn-block" style="margin-bottom: 4%">
												<i class="ace-icon fa fa-external-link small-60 white"></i>
												Pindah Tahun Ajaran
											</button>
										</a>
									<?php } else { ?>

										<small>-| Untuk Data Guru Sudah Mengalamai Pemindahan Tahun/Data Masih Kosong</small>

									<?php } ?>
								</div>
								<div class="col-xs-9">
									<div class="clearfix">
										<div class="pull-right tableTools-container"></div>
									</div>
								</div>
							</div>
							
							<div class="table-header">
								Results for "Guru"
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
											<th>NBM</th>
											<th>Nama</th>
											<th>Alamat</th>
											<th>Jenis Kelamain</th>
											<th>Nomor HP</th>
											<th>Jabatan</th>
											<th>
												<a href="#modal-form" role="button" class="blue" data-toggle="modal">
													<button class="btn btn-white btn-info btn-bold">
														<i class="ace-icon fa fa-plus small-60 blue"></i>
														Tambah
													</button>
												</a>
											</th>
										</tr>
									</thead>

									<tbody>
										<?php $no = 1; foreach ($guru as $g) { ?>
											<tr>
												<td class="center">
													<?php echo $no++;?>
												</td>
												<td><?php echo $g['nbm'];?></td>
												<td><?php echo $g['nama_guru'];?></td>
												<td><?php echo $g['alamat'];?></td>
												<td><?php echo $g['jenkel_guru'];?></td>
												<td><?php echo $g['hp_guru'];?></td>
												<td><?php echo $g['nama_jabatan'];?></td>
												<td>
													<div class="hidden-sm hidden-xs action-buttons">

														<a class="green" href="<?php echo base_url('index.php/c_guru/edit/').$g['id_guru'];?>">
															<i class="ace-icon fa fa-pencil bigger-130"></i>
														</a>

														<a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url('index.php/c_guru/hapus/').$g['id_guru'];?>">
															<i class="ace-icon fa fa-trash-o bigger-130"></i>
														</a>
													</div>
												</td>
											</tr>

										<?php } ?>
										
									</tbody>
								</table>
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
							<h4 class="blue bigger">Tambah Guru</h4>
						</div>

						<div class="modal-body">
							<div class="row">
								<div class="col-xs-12 col-sm-12">
									<div class="hr hr-18 dotted hr-double"></div>
									
									<form class="form-horizontal" action="<?php echo base_url('index.php/c_guru/upload');?>" method="post" enctype="multipart/form-data">
										<div class="form-group">

											<label class="col-xs-3" for="form-field-1-1">Input Data (Excel)</label>

											<div class="col-xs-6">
												<input type="file" name="file" class="form-control" required/>
											</div>
											<div class="col-sm-3">
												<button class="btn btn-sm btn-primary">
													<i class="ace-icon fa fa-plus">Tambah</i>
												</button>
											</div>
										</div>
									</form>	


									<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_guru/tambah_banyak');?>">
										<div class="clearfix form-actions">
											<div class="form-group">

												<label class="col-xs-7 control-label no-padding-right" for="form-field-1-1">Tambah Data Banyak | Masukan Jumlah</label>

												<div class="col-xs-2">
													<select class="form-control" id="form-field-select-1" name="banyak_input">
														<?php for ($i=50;$i>0;$i--){ ?>

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

									<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_guru/tambah');?>">
										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">NBM</label>

											<div class="col-sm-9">
												<input type="number" id="form-field-1-1" placeholder="ex : 9789787088969" class="form-control" name="nbm" required />
											</div>
										</div>

										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama</label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1-1" placeholder="ex : Anggi Surya Permana" class="form-control" name="nama_guru" required />
											</div>
										</div>

										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Alamat</label>

											<div class="col-sm-9">
												<textarea name="alamat" class="form-control" id="form-field-8" placeholder="ex : Jl. Yogyakarta"></textarea>
											</div>
										</div>

										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Jenis Kelamin</label>

											<div class="col-sm-9">
												<select class="form-control" id="form-field-select-1" name="jenkel_guru">
													<option value="L">Laki-laki</option>
													<option value="P">Perempuan</option>
												</select>
											</div>
										</div>

										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Handphone</label>

											<div class="col-sm-9">
												<input type="number" id="form-field-1-1" placeholder="ex : 0888-8888-8888" class="form-control" name="hp_guru" required />
											</div>
										</div>


										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Jabatan</label>

											<div class="col-sm-9">
												<select class="form-control" id="form-field-select-1" name="id_jabatan" required>
													<?php foreach ($jabatan as $j) { ?>
														<option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
													<?php } ?>
												</select>
											</div>
										</div>

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
									Save
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>



			<div id="modal-pindah" class="modal" tabindex="-1">
				<div class="modal-dialog">
					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_guru/transfer');?>">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="blue bigger">Pemindahan Tahun Ajaran</h4>
							</div>

							<div class="modal-body">
								<div class="row">
									<div class="col-xs-12 col-sm-12">
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
												<label class="col-xs-3 control-label no-padding-right" for="form-field-1-1">Semua Data</label>

												<div class="col-xs-9">
													<input name="seleksi" class="ace ace-switch ace-switch-7" type="checkbox" value="1" />
													<span class="lbl"></span>
												</div>
											</div>
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