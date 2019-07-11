
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

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					
					<div class="row">
						<div class="col-xs-4">
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
												<a href="<?php echo base_url('index.php/c_penilaian_siswa/cetak/').$id_kelas_jurusan->id_kelas_jurusan;?>" target="_blank">
																<button class="btn btn-sm btn-warning">
																	<i class="ace-icon fa fa-print"></i>
																	Cetak
																</button>
															</a>
											</div>
										</div>
										
										<div class="table-header">
											<div class="row">
												<div class="col-xs-9">
													Results for "Data"
												</div>
												<div class="col-xs-3">
													Daya Tampung : 0/0
												</div>
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
													</tr>
												</thead>

												<tbody>
													<?php $no = 1; foreach ($penilaian_siswa as $ps) { ?>
														<tr>
															<td class="center">
																<?php echo $no++;?>
															</td>
															<td><?php echo $ps->nama_siswa;;?></td>
															<td><?php echo $ps->sholat_wajib;?></td>
															<td><?php echo $ps->membaca_kitab;?></td>
															<td><?php echo $ps->sholat_sunnah;?></td>
															<td><?php echo $ps->kerajinan;?></td>
															<td><?php echo $ps->kedisiplinan;?></td>
															<td><?php echo $ps->kerapihan;?></td>
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
				</div>
			</div>