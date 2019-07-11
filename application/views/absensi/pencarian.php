<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Pencarian</li>
				<li class="active">Absensi Siswa/li>
				</ul><!-- /.breadcrumb -->
			</div>

			<div class="page-content">
				
				<div class="page-header">
					<h1>
						Pencarian
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Absensi Siswa
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
						
						<label for="" class="control-label">
							<span style="font-size: 21pt;color: #3399ff;font-weight: bold">
								S
							</span>
							<span style="font-size: 21pt;color: #ff3333;font-weight: bold">
								e
							</span>
							<span style="font-size: 21pt;color: #ffcc00;font-weight: bold">
								a
							</span>
							<span style="font-size: 21pt;color: #3399ff;font-weight: bold">
								r
							</span>
							<span style="font-size: 21pt;color: #339966;font-weight: bold">
								c
							</span>
							<span style="font-size: 21pt;color: #ff3333;font-weight: bold">
								h
							</span>
						</label>

						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_absensi/tampil_siswa');?>">
							<div class="row">
								<div class="col-xs-12 col-sm-12">
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Pilih Kelas Jurusan</label>

										<div class="col-sm-6">
											<select required data-placeholder="- Pilih Kategori - " class="form-control" tabindex="-1" id="form-field-select-1" name="id_kelas_jurusan">
												<option value="">- Pilih Kelas Jurusan -</option>
												<?php foreach ($kelas_jurusan as $k) { ?>
													<option value="<?php echo $k['id_kelas_jurusan']; ?>"><?php echo $k['tingkat'].' '.$k['nama_jurusan'].' '.$k['urutan_kelas_jurusan'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Cari Siswa</label>

										<div class="col-sm-6">
											<select name="id_siswa" class="chosen-select form-control" id="form-field-select-1" tabindex="-1">
												<option value=""> - Pilih Siswa - </option>
											</select>
										</div>
									</div>

								</div>
							</div>

							
							<div class="clearfix form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button class="btn btn-success">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Lihat
									</button>
								</div>
							</div>

						</form>
					</div>
				</div>


				<script>
					window.onload= function(){
						$("select[name='id_kelas_jurusan']").change(function (){
							var url = "<?php echo base_url('index.php/c_prestasi_siswa/siswa');?>/"+$(this).val();
							$("select[name='id_siswa']").load(url);
							return false;
						});
					};
    // $(document).ready(function(){
    //     alert('tes');
    // });
</script>