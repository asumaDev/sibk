<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Kesiswaaan</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_siswa/tampil/').$id_kelas_jurusan->id_kelas_jurusan;?>">Siswa</a></li>
				<li class="active">Tambah Data</li>
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

			

			<div class="space-4"></div>

			<div class="row">
				
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('index.php/c_siswa/input');?>">
						<div class="form-group" hidden>
							<label class="col-sm-12 control-label no-padding-right" for="form-field-1-1"><?php echo $id_kelas_jurusan->tingkat.' '.$id_kelas_jurusan->nama_jurusan.' '.$id_kelas_jurusan->urutan_kelas_jurusan;?></label>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="widget-box widget-color-blue" id="widget-box-2">
									<div class="widget-header">
										<h5 class="widget-title bigger lighter">
											<i class="ace-icon fa fa-table"></i>
											Tambah Data Siswa
										</h5>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div class="table-header">
												<div class="row">
													<div class="col-xs-9">
														Results for "<?php echo $id_kelas_jurusan->tingkat.' '.$id_kelas_jurusan->nama_jurusan.' '.$id_kelas_jurusan->urutan_kelas_jurusan;?>"
													</div>
												</div>
											</div>

											<div>
												<table class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th class="center">
																No
															</th>
															<th>NIS</th>
															<th>Nama</th>
															<th>Alamat</th>
															<th>JK</th>
															<th>HP</th>
															<th>Wali Murid</th>
															<th>Photo</th>
															<th>Account</th>
														</tr>
													</thead>

													<tbody>
														<?php for ($no=1;$no<=$banyak_input;$no++) { ?>
															<tr>
																<td class="center">
																	<?php echo $no;?>
																</td>
																<td>
																	<input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][nis]" placeholder="987654789876" required />
																</td>
																<td>
																	<input type="text" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][nama_siswa]" placeholder="Anggi" required />
																</td>
																<td>
																	<input type="text" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][alamat_siswa]" placeholder="Yogyakarta" required />
																</td>
																<td>
																	<select class="form-control" id="form-field-select-1" name="data[<?php echo $no ?>][jenkel_siswa]" required>
																		<option value="L">Laki-laki</option>
																		<option value="P">Perempuan</option>
																	</select>
																</td>
																<td>
																	<input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][hp_siswa]" placeholder="0852xxxxx" required />
																</td>
																<td>
																	<select class="form-control" id="form-field-select-1" name="data[<?php echo $no ?>][id_ortu]" required>
																		<?php foreach ($ortu as $o) { ?>
																			<option value="<?php echo $o['id_ortu'];?>"><?php echo $o['nama_ortu'];?></option>
																		<?php } ?>
																	</select>
																</td>
																<td> 
																	<input style="width: 90%" type="file" name="userfile<?php echo $no;?>" size="20" class="form-control" required />
																</td>
																<td> 
																	<input class="ace" type="checkbox" name="data[<?php echo $no ?>][user]"/>
																	<span class="lbl"> Klick</span>
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
						</div>
						<input type="hidden" id="form-field-1-1" class="form-control" style="width:100%" name="id_kelas_jurusan" value="<?php echo $id_kelas_jurusan->id_kelas_jurusan;?>" required />
						<div class="row">
							<div class="clearfix form-actions">
								<div class="col-md-offset-10 col-md-2">

									&nbsp; &nbsp; &nbsp;
									<button class="btn btn-info">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Simpan
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			
			<div class="hr hr-24"></div>
			<div class="col-md-12">
				<a href="<?php echo base_url('index.php/c_siswa/tampil/').$id_kelas_jurusan->id_kelas_jurusan;?>">
					<i class="ace-icon fa fa-back bigger-110"></i>
					<< Kembali
				</a>
			</div>