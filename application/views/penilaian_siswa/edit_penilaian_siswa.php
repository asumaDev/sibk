<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Pribadi Siswa</li>
				<li class="active"><a href="<?php echo base_url('index.php/c_penilaian_siswa/tampil/').$penilaian_siswa->id_kelas_jurusan;?>">Penilaian</a></li>
				<li class="active">Edit Data</li>
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
					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_penilaian_siswa/update');?>">
						<div class="row">
							<div class="col-xs-12">
								<div class="widget-box widget-color-blue" id="widget-box-2">
									<div class="widget-header">
										<h5 class="widget-title bigger lighter">
											<i class="ace-icon fa fa-table"></i>
											Edit Data
										</h5>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div class="table-header">
												<div class="row">
													<div class="col-xs-9">
														Results for "<?php echo $penilaian_siswa->nama_siswa;?>"
													</div>
												</div>
											</div>

											<div>
												<table id="dynamic-table" class="table table-striped table-bordered table-hover">
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
														<tr>
															<td class="center">
																<?php echo $no=1;?>
															</td>
															<td hidden><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="id_siswa" value="<?php echo $penilaian_siswa->id_siswa;?>" required /></td>

															<td><?php echo $penilaian_siswa->nama_siswa;?></td>

															<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="sholat_wajib" value="<?php echo $penilaian_siswa->sholat_wajib?>" required /></td>
															
															<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="membaca_kitab" value="<?php echo $penilaian_siswa->membaca_kitab;?>" required /></td>

															<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="sholat_sunnah" value="<?php echo $penilaian_siswa->sholat_sunnah;?>" required /></td>

															<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="kerajinan" value="<?php echo $penilaian_siswa->kerajinan;?>" required /></td>

															<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="kedisiplinan" value="<?php echo $penilaian_siswa->kedisiplinan;?>" required /></td>

															<td><input type="number" id="form-field-1-1" class="form-control" style="width:100%" name="kerapihan" value="<?php echo $penilaian_siswa->kerapihan;?>" required /></td>
														</tr>
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" id="form-field-1-1" class="form-control" style="width:100%" name="id_penilaian_siswa" value="<?php echo $penilaian_siswa->id_penilaian_siswa;?>" required />

						<input type="hidden" id="form-field-1-1" class="form-control" style="width:100%" name="id_kelas_jurusan" value="<?php echo $penilaian_siswa->id_kelas_jurusan;?>" required />
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
				<a href="<?php echo base_url('index.php/c_penilaian_siswa/tampil/').$penilaian_siswa->id_kelas_jurusan;?>">
					<i class="ace-icon fa fa-back bigger-110"></i>
					<< Kembali
				</a>
			</div>