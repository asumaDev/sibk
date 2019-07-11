<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Pribadi Siswa</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_penilaian_siswa/tampil/').$id_kelas_jurusan->id_kelas_jurusan;?>">Penilaian</a></li>
				<li class="active">Tambah Data</li>
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

			

			<div class="space-4"></div>

			<div class="row">
				
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_penilaian_siswa/input');?>">
						<div class="row">
							<div class="col-xs-12">
								<div class="widget-box widget-color-blue" id="widget-box-2">
									<div class="widget-header">
										<h5 class="widget-title bigger lighter">
											<i class="ace-icon fa fa-table"></i>
											Tambah Data
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
															<th hidden>ID Siswa</th>
															<th>Nama Siswa</th>
															<th>SWB</th>
															<th>KBA</th>
															<th>SS</th>
															<th>KRJ</th>
															<th>KDS</th>
															<th>KRP</th>
														</tr>
													</thead>

													<tbody>
														<?php $no = 1; foreach ($siswa as $s) { ?>
															<tr>
																<td class="center">
																	<?php echo $no;?>
																</td>
																<td hidden><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][id_siswa]" value="<?php echo $s['id_siswa'];?>" placeholder="0,2,4,6 dan 8" required /></td>

																<td><?php echo $s['nama_siswa'];?></td>

																<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][sholat_wajib]" placeholder="1,2,3,4 dan 5" required /></td>
																
																<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][membaca_kitab]" placeholder="1,2,3,4 dan 5" required /></td>

																<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][sholat_sunnah]" placeholder="1,2,3,4 dan 5" required /></td>

																<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][kerajinan]" placeholder="1,2,3,4 dan 5" required /></td>

																<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][kedisiplinan]" placeholder="1,2,3,4 dan 5" required /></td>

																<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="data[<?php echo $no ?>][kerapihan]" placeholder="1,2,3,4 dan 5" required /></td>
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
							<input type="hidden" id="form-field-1-1" class="form-control" style="width:100%" name="id_kelas_jurusan" value="<?php echo $id_kelas_jurusan->id_kelas_jurusan;?>" required />
							<div class="row">
								<div class="clearfix form-actions">
									<div class="col-md-offset-10 col-md-2">
										
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
					<a href="<?php echo base_url('index.php/c_penilaian_siswa/tampil/').$id_kelas_jurusan->id_kelas_jurusan;?>">
						<i class="ace-icon fa fa-back bigger-110"></i>
						<< Kembali
					</a>
				</div>