<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Data Master</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_siswa');?>">Siswa</a></li>
				<li class="active">Kenaikan Kelas</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">

			<div class="page-header">
				<h1>
					Data Master
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
					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_siswa/seleksi');?>">
						<input type="hidden" id="form-field-1-1" value="<?php echo $id_kelas_jurusan_baru;?>" class="form-control" name="id_kelas_jurusan" required />
						<input type="hidden" id="form-field-1-1" value="<?php echo $id_kelas_jurusan;?>" class="form-control" name="kelas_jurusan" required />
						<input type="hidden" id="form-field-1-1" value="<?php echo $id_tahun;?>" class="form-control" name="id_tahun" required />

						<div class="row">
							<div class="col-xs-12">
								<div class="widget-box widget-color-blue" id="widget-box-2">
									<div class="widget-header">
										<h5 class="widget-title bigger lighter">
											<i class="ace-icon fa fa-table"></i>
											Kenaikan Kelas
										</h5>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div class="table-header">
												<div class="row">
													<div class="col-xs-9">
														Berikan Tanda ( ✓ ) Untuk Siswa Yang Naik Kelas
													</div>
												</div>
											</div>

											<div>
												<table id="dynamic-table" class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th class="center">
																<label class="pos-rel">
																	<input type="checkbox" class="ace" />
																	<span class="lbl"></span>
																</label>
															</th>
															<th>NIS</th>
															<th>Nama</th>
															<th>Alamat</th>
															<th hidden>Hidden</th>
														</tr>
													</thead>

													<tbody>
														<?php $no=1; foreach ($siswa as $s) { ?>
															<tr>
																<td class="center">
																	<label class="pos-rel">
																		<input name="data[<?php echo $no ?>][status]" value="1" type="checkbox" class="ace" />
																		<span class="lbl"></span>
																	</label>
																</td>
																<td><?php echo $s['nis'];?></td>
																<td><?php echo $s['nama_siswa'];?></td>
																<td><?php echo $s['alamat_siswa'];?></td>
																<td hidden>
																	<input type="text" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][id_siswa]" value="<?php echo $s['id_siswa'];?>" />
																	<input type="text" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][nis]" value="<?php echo $s['nis'];?>" required />
																	<input type="text" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][nama_siswa]" value="<?php echo $s['nama_siswa'];?>" required />
																	<input type="text" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][jenkel_siswa]" value="<?php echo $s['jenkel_siswa'];?>" required />
																	<input type="text" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][alamat_siswa]" value="<?php echo $s['alamat_siswa'];?>" required />
																	<input type="text" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][hp_siswa]" value="<?php echo $s['hp_siswa'];?>" required />
																	<input type="text" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][photo_siswa]" value="<?php echo $s['photo_siswa'];?>" required />
																	<input type="text" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][id_ortu]" value="<?php echo $s['id_ortu'];?>" required />
																</td>

															</tr>

															<?php $no++; } ?>


														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="clearfix form-actions">
								<div class="col-md-offset-10 col-md-2">

									&nbsp; &nbsp; &nbsp;
									<button class="btn btn-info">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Proses
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="hr hr-24"></div>
			<div class="col-md-12">
				<a href="<?php echo base_url('index.php/c_siswa/tampil/').$id_kelas_jurusan;?>">
					<i class="ace-icon fa fa-back bigger-110"></i>
					<< Kembali
				</a>
			</div>