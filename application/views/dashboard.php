<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">Dashboard</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Dashboard
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Halaman Utama
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>

						<i class="ace-icon fa fa-check green"></i>
						<?php if($_SESSION['id_hak_akses']==3) { ?>
							Jika Pertama Login Harap Segera Mengganti Password Default
							<strong class="green">
								Klik Disini
								<a href="#"  href="#" data-toggle="modal" data-target="#chPassword"><small>(Ganti Password)</small></a>
							</strong>
						<?php } else { ?>
							Selamat Datang Di SIBK
							<strong class="green">
								ASM
								<small>(v1)</small>
							</strong>
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="space-6"></div>

				<div class="col-sm-5 infobox-container">
					<div class="infobox infobox-green">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-user"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo count($siswa);?></span>
							<div class="infobox-content">Siswa</div>
						</div>
					</div>

					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-users"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo count($guru);?></span>
							<div class="infobox-content">Guru</div>
						</div>
					</div>

					<div class="infobox infobox-pink">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-filter"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo count($prestasi);?></span>
							<div class="infobox-content">Prestasi</div>
						</div>
					</div>

					<div class="infobox infobox-red">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-gavel"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo count($pelanggaran);?></span>
							<div class="infobox-content">Pelanggaran</div>
						</div>
					</div>

					

					<div class="space-6"></div>

					
				</div>

				<div class="vspace-12-sm"></div>

				<div class="col-sm-7">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-flat">
							<h4 class="widget-title lighter">
								<i class="ace-icon fa fa-star orange"></i>
								Pelanggaran Siswa < Bulan <?php echo date('M'); ?> >
							</h4>

							<div class="widget-toolbar">
								<a href="#" data-action="collapse">
									<i class="ace-icon fa fa-chevron-up"></i>
								</a>
							</div>
						</div>

						<div class="widget-body">
							<div class="widget-main no-padding">
								<table class="table table-bordered table-striped">
									<thead class="thin-border-bottom">
										<tr>
											<th>
												<i class="ace-icon fa fa-caret-right blue"></i>name
											</th>

											<th>
												<i class="ace-icon fa fa-caret-right blue"></i>Kelas
											</th>

											<th>
												<i class="ace-icon fa fa-caret-right blue"></i>Pelanggaran
											</th>
											<?php if($_SESSION['id_hak_akses']!=3) { ?>
												<th>
													<i class="ace-icon fa fa-caret-right blue"></i>Status
												</th>
											<?php } ?>
										</tr>
									</thead>

									<tbody>
										<?php foreach ($pelanggaran_siswa as $p) { ?>
											<tr>
												<td><?php echo $p['nama_siswa'];?></td>
												<td>
													<?php echo $p['tingkat'].' '.$p['nama_jurusan'].' '.$p['urutan_kelas_jurusan'];?>
												</td>
												<td><?php echo $p['nama_pelanggaran'];?></td>
												<?php if($_SESSION['id_hak_akses']!=3) { ?>
													<td>
														<a class="green" href="<?php echo base_url('index.php/c_pelanggaran_siswa/tampil/').$p['id_siswa'];?>">
															<i class="ace-icon fa fa-search bigger-130"></i>
														</a>
													</td>
												<?php } ?>
											</tr>
											<?PHP } ?>
										</tbody>
									</table>
								</div><!-- /.widget-main -->
							</div><!-- /.widget-body -->
						</div><!-- /.widget-box -->
					</div><!-- /.col -->
				</div>