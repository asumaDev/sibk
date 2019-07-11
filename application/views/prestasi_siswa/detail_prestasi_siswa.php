<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Pelayanan BK</li>
				<li class="active">Prestasi Siswa</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Pelayanan BK
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Prestasi Siswa
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="social-auth-links text-left">
				<?php  if($this->session->flashdata('alert')) : ?>
					<?php echo '<div class="social-auth-links text-center"> <div class="alert alert-info"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
				<?php endif;?>
			</div>

			<div class="row">
				<div class="col-xs-4">
					<div class="row">
						<div class="col-xs-12">
							<div class="clearfix">
								<div class="widget-box widget-color-red"></div>
							</div>
							<div class="widget-box widget-color-red">
								<div class="widget-header widget-header-small" style="padding-top: 3%;">
									Nilai Prestasi
								</div>
								
								<div class="widget-body">
									<div class="widget-main padding">
										<center>
											<h1 style="font-weight: bold;color:#FF3333;font-size: 80pt">
												<?php $jumlah = 0;
												foreach ($prestasi_siswa as $s) {
													$jumlah = $jumlah + $s['point_prestasi'];
												}
												echo $jumlah;
												?>
											</h1>
										</center>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<?php if($_SESSION['id_hak_akses']!=3) { ?>
								<a href="#modal-plus" role="button" class="blue" data-toggle="modal">
									<button class="btn btn-info">
										<i class="ace-icon fa fa-plus bigger-110"></i>
										Tambah Prestasi
									</button>
								</a>
							<?php } ?>

							<?php if ($jumlah==0){ ?>
								&nbsp &nbsp &nbsp <i class="ace-icon fa fa-search bigger-110"></i>
								Tidak Ada Prestasi

							<?php } else { ?>
								<a href="#modal-form" role="button" class="blue" data-toggle="modal">
									<button class="btn">
										<i class="ace-icon fa fa-search bigger-110"></i>
										Detail
									</button>
								</a>

								<a href="#modal-cetak" role="button" class="green" data-toggle="modal">
									<button class="btn btn-success">
										<i class="ace-icon fa fa-print bigger-110"></i>
										Cetak
									</button>
								</a>
							<?php } ?>
						</div>
					</div>
					
				</div>
				<div class="col-xs-8">
					<div class="row">
						<div class="col-xs-12">
							<div class="clearfix">
								<div class="widget-box widget-color-blue"></div>
							</div>
							<div class="widget-box widget-color-blue">
								<div class="widget-header widget-header-small" style="padding-top: 3%;">
									Data Siswa
								</div>
								
								<div class="widget-body">
									<div class="widget-main padding">
										<div class="row">
											<div class="col-lg-3">
												<img style="width: 100%;height: 100%;margin-top: 4%;" src="<?php echo base_url().$siswa->photo_siswa;?>" />
											</div>
											<div class="col-lg-9">
												<table class="table table-bordered">
													<tr>
														<td width="20%">NIS</td>
														<td><?php echo $siswa->nis; ?></td>
													</tr>
													<tr>
														<td width="20%">Nama Siswa</td>
														<td><?php echo $siswa->nama_siswa; ?></td>
													</tr>
													<tr>
														<td width="20%">Kelas</td>
														<td><?php echo $kelas_jurusan->tingkat.' '.$kelas_jurusan->nama_jurusan.' '.$kelas_jurusan->urutan_kelas_jurusan; ?></td>
													</tr>
													<tr>
														<td width="20%">HP Siswa</td>
														<td><?php echo $siswa->hp_siswa; ?></td>
													</tr>
													<tr>
														<td width="20%">Alamat Siswa</td>
														<td>
															<?php echo $siswa->alamat_siswa; ?>		
														</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="clearfix">
								<div class="widget-box widget-color-green"></div>
							</div>
							<div class="widget-box widget-color-green">
								<div class="widget-header widget-header-small" style="padding-top: 3%;">
									Data Ortu
								</div>
								
								<div class="widget-body">
									<div class="widget-main padding">
										<table class="table table-bordered">
											<tr>
												<td width="20%">Nama Wali</td>
												<td><?php echo $siswa->nama_ortu; ?></td>
											</tr>
											<tr>
												<td width="20%">Alamat Wali</td>
												<td><?php echo $siswa->alamat_ortu; ?></td>
											</tr>
											<tr>
												<td width="20%">HP Wali</td>
												<td><?php echo $siswa->hp_ortu; ?></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>      
				</div>
			</div>

			<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

			<div id="modal-form" class="modal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="blue bigger"><?php echo "Detail Prestasi ".$siswa->nama_siswa.' ['.$siswa->nis.']'; ?></h4></h4>
						</div>

						<div class="modal-body">
							<div class="row">
								<div class="col-xs-12 col-sm-12">
									<table class="table table-bordered">
										
										<tr>
											<th>#No</th>
											<th>#Nama Pretasi</th>
											<th>#Point Pretasi</th>
											<th>#Keterangan</th>
											<th>#Waktu</th>
											<?php if($_SESSION['id_hak_akses']!=3) { ?>
												<th>#Status</th>
											<?php } ?>
										</tr>
										
										<?php $no=0;foreach ($prestasi_siswa as $p):$no++ ?>
										<tr>
											<td><?php echo $no;?></td>
											<td><?php echo $p['nama_prestasi'];?></td>
											<td><?php echo $p['point_prestasi'];?></td>
											<td><?php echo $p['keterangan_prestasi'];?></td>
											<td><?php echo $p['waktu_input'];?></td>
											<?php if($_SESSION['id_hak_akses']!=3) { ?>
												<td>
													<div class="hidden-sm hidden-xs action-buttons">

														<a class="green" href="<?php echo base_url('index.php/c_prestasi_siswa/edit/').$p['id_prestasi_siswa'];?>">
															<i class="ace-icon fa fa-pencil bigger-130"></i>
														</a>

														<a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url('index.php/c_prestasi_siswa/hapus/').$p['id_prestasi_siswa'].'/'.$p['id_siswa'];?>">
															<i class="ace-icon fa fa-trash-o bigger-130"></i>
														</a>
													</div>
												</td>
											<?php } ?>
										</tr>
									<?php endforeach ?>
									
								</table>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-sm" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Cancel
						</button>
					</div>
				</div>
		</div>
	</div>



	<div id="modal-plus" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_prestasi_siswa/tambah');?>">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="blue bigger">Tambah Prestasi</h4>
					</div>

					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<div class="space-4"></div>
								<input type="hidden" id="form-field-1-1" value="<?php echo $siswa->id_siswa;?>" class="form-control" name="id_siswa" required />

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Siswa</label>

									<div class="col-sm-9">
										<input type="text" id="form-field-1-1" value="<?php echo ' '.$siswa->nama_siswa;?>" class="form-control" name="tingkat" required readonly />
									</div>
								</div>


								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tanggal | Waktu</label>

									<div class="col-sm-9">
										<input type="text" id="form-field-1-1" value="<?php date_default_timezone_set('Asia/Jakarta');
										echo date('Y-d-m H:i:s');?>" class="form-control" name="waktu_input" required readonly />
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Pilih Kategori</label>

									<div class="col-sm-9">
										<select required data-placeholder="- Pilih Kategori - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_kat_prestasi">
											<option value="">- Pilih Kategori -</option>
											<?php foreach ($kat_prestasi as $k) { ?>
												<option value="<?php echo $k['id_kat_prestasi']; ?>"><?php echo $k['nama_kat_prestasi']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Pilih Prestasi</label>

									<div class="col-sm-9">
										<select required data-placeholder="- Pilih Prestasi - "  class="chosen-select form-control" id="form-field-select-3"  tabindex="-1"  name="id_prestasi">
											<option value=""> - Pilih Prestasi- </option>
										</select>
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Keterangan</label>

									<div class="col-sm-9">
										<textarea class="form-control" id="form-field-8" placeholder="Keterangan Prestasi / Tindakan" name="keterangan_prestasi"></textarea>
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

	<div id="modal-cetak" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<form class="form-horizontal" role="form" target="_blank" method="post" action="<?php echo base_url('index.php/c_prestasi_siswa/lembar_bimbingan');?>">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="blue bigger">Tambah Prestasi</h4>
					</div>

					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<div class="space-4"></div>
								<input type="hidden" id="form-field-1-1" value="<?php echo $siswa->id_siswa;?>" class="form-control" name="id_siswa" required />

								<div class="hr hr-1 hr-double"></div>

										<div class="social-auth-links text-center"> 
											<div class="alert alert-info"> <b> Tanda Tangan </b>
											</div>
										</div>
										<hr/>

										<div class="hr hr-1 hr-double"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Semester</label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1-1" placeholder="ex : 1,2,3,4...dst" class="form-control" name="semester" required />
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Kaur BS</label>

											<div class="col-sm-9">
												<select class="form-control" name="kaur_bs">
													<option value="">- Pilih Guru -</option>
													<?php foreach ($guru as $j) { ?>
														<option value="<?php echo $j['nama_guru'];?>"><?php echo $j['nama_guru'];?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Pembimbing</label>

											<div class="col-sm-9">
												<select class="form-control" name="guru_pembimbing">
													<option value="">- Pilih Guru -</option>
													<?php foreach ($guru as $j) { ?>
														<option value="<?php echo $j['nama_guru'];?>"><?php echo $j['nama_guru'];?></option>
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
							<i class="ace-icon fa fa-print"></i>
							Cetak
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script>
		window.onload= function(){
			$("select[name='id_kat_prestasi']").change(function (){
				var url = "<?php echo base_url('index.php/c_prestasi_siswa/prestasi');?>/"+$(this).val();
				$("select[name='id_prestasi']").load(url);
				return false;
			});
		};
    // $(document).ready(function(){
    //     alert('tes');
    // });
</script>