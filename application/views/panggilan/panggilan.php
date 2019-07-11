
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Panggilan Siswa</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Panggilan Siswa
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Surat Panggilan
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="social-auth-links text-left">
				<?php  if($this->session->flashdata('alert')) : ?>
					<?php echo '<div class="social-auth-links text-center"> <div class="alert alert-info"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
				<?php endif;?>
			</div>

			<div class="social-auth-links text-center"> 
				<div class="alert alert-success"> <b> Nama Siswa : <?php echo $siswa->nama_siswa;?> - Poin Pelanggaran [
					<?php $jumlah = 0;
					foreach ($pelanggaran_siswa as $s) {
						$jumlah = $jumlah + $s['point_pelanggaran'];
					}
					echo $jumlah;
					?>
				] </b>
			</div>
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
									Surat Panggilan
								</h5>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<form class="form-horizontal" target="_blank" role="form" method="post" action="<?php echo base_url('index.php/c_panggilan/surat_panggilan');?>">

										<input type="hidden" id="form-field-1-1" class="form-control" name="id_siswa" value="<?php echo $siswa->id_siswa;?>" required />

										<div class="hr hr-1 hr-double"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nomor</label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1-1" placeholder="ex : 1392/I.Min/L/2018" class="form-control" name="nomor_surat" required />
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Lampiran</label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1-1" placeholder="ex : 2 (dua) Lembar" class="form-control" name="lampiran" required />
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Hal</label>

											<div class="col-sm-9">
												<textarea name="hal" class="form-control" id="form-field-8" placeholder="ex : Pemberitahuan dan Pengiriman"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Isi Surat</label>

											<div class="col-sm-9">
												<textarea name="isi_surat" class="form-control" id="form-field-8" placeholder="ex : Surat Pernyataan Siswa dan Lembar Bimbingan Siswa"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tanggal</label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1-1" placeholder="ex : 13 Rajab 1429" class="form-control" name="tanggal_hijriah" required /> <br/>
												<input type="text" id="form-field-1-1" placeholder="ex : 31 Maret 2018" class="form-control" name="tanggal_masehi" required />

											</div>
										</div>

										<div class="hr hr-1 hr-double"></div>



										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tujuan</label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1-1" placeholder="ex : Bapak Drs. Margono/Ibu Ir. Siti Rahayu" class="form-control" name="tujuan" required />
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Alamat</label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1-1" placeholder="ex : Branjangan RT.16 RW.06 Tijayan" class="form-control" name="desa" required />
												<input type="text" id="form-field-1-1" placeholder="ex : Manisrenggo, Klaten" class="form-control" name="kabupaten" required />
												<input type="text" id="form-field-1-1" placeholder="ex : Jawa Tengah" class="form-control" name="provinsi" required />
											</div>
										</div>

										<div class="hr hr-1 hr-double"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Konselor</label>

											<div class="col-sm-9">
												<select required data-placeholder="- Pilih Guru - " class="form-control" tabindex="-1" id="form-field-select-1" name="konselor">
													<option value="">- Pilih Guru -</option>
													<?php foreach ($guru as $j) { ?>
														<option value="<?php echo $j['id_guru'];?>"><?php echo $j['nama_guru'];?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="hr hr-1 hr-double"></div>

										<div class="social-auth-links text-center"> 
											<div class="alert alert-info"> <b> Tembusan </b>
											</div>
										</div>
										<hr/>

										<div class="form-group">
											<label class="col-xs-1 control-label no-padding-right" for="form-field-1-1">1</label>

											<div class="col-xs-4">
												<select required data-placeholder="- Jabatan - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_jabatan_1">
													<option value="">- Jabatan -</option>
													<?php foreach ($jabatan as $j) { ?>
														<option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
													<?php } ?>
												</select>
											</div>

											<div class="col-xs-7">
												<select required data-placeholder="- Pilih Guru - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_guru_1">
													<option value="">- Pilih Guru -</option>
												</select>
											</div>

										</div>

										<div class="form-group">
											<label class="col-xs-1 control-label no-padding-right" for="form-field-1-1">2</label>

											<div class="col-xs-4">
												<select required data-placeholder="- Jabatan - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_jabatan_2">
													<option value="">- Jabatan -</option>
													<?php foreach ($jabatan as $j) { ?>
														<option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
													<?php } ?>
												</select>
											</div>

											<div class="col-xs-7">
												<select required data-placeholder="- Pilih Guru - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_guru_2">
													<option value="">- Pilih Guru -</option>
												</select>
											</div>

										</div>

										<div class="form-group">
											<label class="col-xs-1 control-label no-padding-right" for="form-field-1-1">3</label>

											<div class="col-xs-4">
												<select required data-placeholder="- Jabatan - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_jabatan_3">
													<option value="">- Jabatan -</option>
													<?php foreach ($jabatan as $j) { ?>
														<option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
													<?php } ?>
												</select>
											</div>

											<div class="col-xs-7">
												<select required data-placeholder="- Pilih Guru - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_guru_3">
													<option value="">- Pilih Guru -</option>
												</select>
											</div>

										</div>

										<div class="form-group">
											<label class="col-xs-1 control-label no-padding-right" for="form-field-1-1">4</label>

											<div class="col-xs-4">
												<select required data-placeholder="- Jabatan - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_jabatan_4">
													<option value="">- Jabatan -</option>
													<?php foreach ($jabatan as $j) { ?>
														<option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
													<?php } ?>
												</select>
											</div>

											<div class="col-xs-7">
												<select required data-placeholder="- Pilih Guru - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_guru_4">
													<option value="">- Pilih Guru -</option>
												</select>
											</div>

										</div>

										<div class="form-group">
											<label class="col-xs-1 control-label no-padding-right" for="form-field-1-1">5</label>

											<div class="col-xs-4">
												<select required data-placeholder="- Jabatan - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_jabatan_5">
													<option value="">- Jabatan -</option>
													<?php foreach ($jabatan as $j) { ?>
														<option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
													<?php } ?>
												</select>
											</div>

											<div class="col-xs-7">
												<select required data-placeholder="- Pilih Guru - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_guru_5">
													<option value="">- Pilih Guru -</option>
												</select>
											</div>

										</div>

										<div class="form-group">
											<label class="col-xs-1 control-label no-padding-right" for="form-field-1-1">6</label>

											<div class="col-xs-4">
												<select required data-placeholder="- Jabatan - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_jabatan_6">
													<option value="">- Jabatan -</option>
													<?php foreach ($jabatan as $j) { ?>
														<option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
													<?php } ?>
												</select>
											</div>

											<div class="col-xs-7">
												<select required data-placeholder="- Pilih Guru - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_guru_6">
													<option value="">- Pilih Guru -</option>
												</select>
											</div>

										</div>

										<div class="form-group">
											<label class="col-xs-1 control-label no-padding-right" for="form-field-1-1">7</label>

											<div class="col-xs-4">
												<select required data-placeholder="- Jabatan - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_jabatan_7">
													<option value="">- Jabatan -</option>
													<?php foreach ($jabatan as $j) { ?>
														<option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
													<?php } ?>
												</select>
											</div>

											<div class="col-xs-7">
												<select required data-placeholder="- Pilih Guru - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_guru_7">
													<option value="">- Pilih Guru -</option>
												</select>
											</div>

										</div>

										<div class="row">
											<div class="col-sm-3">
												
											</div>
											<div class="col-sm-9">
												<button class="btn btn-sm btn-primary">
													<i class="ace-icon fa fa-print"></i>
													Cetak
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-4">
						<div class="widget-box widget-color-green" id="widget-box-2">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter">
									<i class="ace-icon fa fa-table"></i>
									Surat Pernyataan
								</h5>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<form class="form-horizontal" target="_blank" role="form" method="post" action="<?php echo base_url('index.php/c_panggilan/surat_pernyataan');?>">

										<input type="hidden" id="form-field-1-1" class="form-control" name="id_siswa" value="<?php echo $siswa->id_siswa;?>" required />

										<div class="hr hr-1 hr-double"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tanggal</label>

											<div class="col-sm-9">
												<input type="date" id="form-field-1-1" class="form-control" name="tanggal_surat" required />
											</div>
										</div>

										<div class="hr hr-1 hr-double"></div>

										<div class="form-group">
											<label class="col-xs-3 control-label no-padding-right" for="form-field-1-1">Kategori</label>

											<div class="col-xs-9">
												<select required data-placeholder="- Jabatan - " class="form-control" tabindex="-1" id="form-field-select-1" name="kategori_sp">
													<?php if($this->uri->segment(4)!=NULL) { ?> 
														<?php if($this->uri->segment(4)==0) { ?>
															<option value="">- Kategori SP -</option>
															<option value="" selected>Surat Pernyataan</option>
															<option value="1">Surat Pernyataan 1</option>
															<option value="2">Surat Pernyataan 2</option>
															<option value="3">Surat Pernyataan 3</option>
														<?php } else if ($this->uri->segment(4)==1) { ?>
															<option value="">- Kategori SP -</option>
															<option value="">Surat Pernyataan</option>
															<option value="1" selected>Surat Pernyataan 1</option>
															<option value="2">Surat Pernyataan 2</option>
															<option value="3">Surat Pernyataan 3</option>
														<?php } else if ($this->uri->segment(4)==2) { ?>
															<option value="">- Kategori SP -</option>
															<option value="">Surat Pernyataan</option>
															<option value="1">Surat Pernyataan 1</option>
															<option value="2" selected>Surat Pernyataan 2</option>
															<option value="3">Surat Pernyataan 3</option>
														<?php } else { ?>
															<option value="">- Kategori SP -</option>
															<option value="">Surat Pernyataan</option>
															<option value="1">Surat Pernyataan 1</option>
															<option value="2">Surat Pernyataan 2</option>
															<option value="3" selected>Surat Pernyataan 3</option>
														<?php }?>
														<?php } else { ?>}
														<option value="">- Kategori SP -</option>
														<option value="">Surat Pernyataan</option>
														<option value="1">Surat Pernyataan 1</option>
														<option value="2">Surat Pernyataan 2</option>
														<option value="3">Surat Pernyataan 3</option>
													<?php } ?>
												</select>
											</div>

										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Asrama</label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1-1" placeholder="ex : 2" class="form-control" name="asrama" required />
											</div>
										</div>
										
										<div class="hr hr-1 hr-double"></div>

										<div class="social-auth-links text-center"> 
											<div class="alert alert-info"> <b> Tanda Tangan </b>
											</div>
										</div>
										<hr/>

										<div class="hr hr-1 hr-double"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">BK</label>

											<div class="col-sm-9">
												<select class="form-control" name="bk">
													<option value="">- Pilih Guru -</option>
													<?php foreach ($guru as $j) { ?>
														<option value="<?php echo $j['nama_guru'];?>"><?php echo $j['nama_guru'];?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-3">
												
											</div>
											<div class="col-sm-9">
												<button class="btn btn-sm btn-primary">
													<i class="ace-icon fa fa-print"></i>
													Cetak
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-4">
						<div class="widget-box widget-color-red" id="widget-box-2">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter">
									<i class="ace-icon fa fa-table"></i>
									Lembar Bimbingan
								</h5>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<form class="form-horizontal" target="_blank" role="form" method="post" action="<?php echo base_url('index.php/c_panggilan/lembar_bimbingan');?>">

										<input type="hidden" id="form-field-1-1" class="form-control" name="id_siswa" value="<?php echo $siswa->id_siswa;?>" required />
										
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

										<div class="row">
											<div class="col-sm-3">
												
											</div>
											<div class="col-sm-9">
												<button class="btn btn-sm btn-primary">
													<i class="ace-icon fa fa-print"></i>
													Cetak
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<script>
			window.onload= function(){
				$("select[name='id_jabatan_1']").change(function (){
					var url = "<?php echo base_url('index.php/c_panggilan/guru');?>/"+$(this).val();
					$("select[name='id_guru_1']").load(url);
					return false;
				});

				$("select[name='id_jabatan_2']").change(function (){
					var url = "<?php echo base_url('index.php/c_panggilan/guru');?>/"+$(this).val();
					$("select[name='id_guru_2']").load(url);
					return false;
				});

				$("select[name='id_jabatan_3']").change(function (){
					var url = "<?php echo base_url('index.php/c_panggilan/guru');?>/"+$(this).val();
					$("select[name='id_guru_3']").load(url);
					return false;
				});

				$("select[name='id_jabatan_4']").change(function (){
					var url = "<?php echo base_url('index.php/c_panggilan/guru');?>/"+$(this).val();
					$("select[name='id_guru_4']").load(url);
					return false;
				});

				$("select[name='id_jabatan_5']").change(function (){
					var url = "<?php echo base_url('index.php/c_panggilan/guru');?>/"+$(this).val();
					$("select[name='id_guru_5']").load(url);
					return false;
				});

				$("select[name='id_jabatan_6']").change(function (){
					var url = "<?php echo base_url('index.php/c_panggilan/guru');?>/"+$(this).val();
					$("select[name='id_guru_6']").load(url);
					return false;
				});

				$("select[name='id_jabatan_7']").change(function (){
					var url = "<?php echo base_url('index.php/c_panggilan/guru');?>/"+$(this).val();
					$("select[name='id_guru_7']").load(url);
					return false;
				});

				$("select[name='id_jabatan_8']").change(function (){
					var url = "<?php echo base_url('index.php/c_panggilan/guru');?>/"+$(this).val();
					$("select[name='id_guru_8']").load(url);
					return false;
				});
			};
		</script>
