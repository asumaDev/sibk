<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Data Master</li>
				<li class="active">Kategori Panggilan</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Data Master
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Kategori Panggilan
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
							<div class="clearfix">
								<div class="pull-right tableTools-container"></div>
							</div>
							<div class="table-header">
								Results for "Kategori Panggilan"
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
											<th>Nama Kategori Panggilan</th>
											<th>Keterangan</th>
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
										<?php $no = 1; foreach ($kat_panggilan as $k) { ?>
											<tr>
												<td class="center">
													<?php echo $no++;?>
												</td>
												
												<td><?php echo $k['nama_kat_panggilan'];?></td>
												<td><?php echo $k['keterangan_kat_panggilan'];?></td>
												<td>
													<div class="hidden-sm hidden-xs action-buttons">

														<a class="green" href="<?php echo base_url('index.php/c_kat_panggilan/edit/').$k['id_kat_panggilan'];?>">
															<i class="ace-icon fa fa-pencil bigger-130"></i>
														</a>

														<a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url('index.php/c_kat_panggilan/hapus/').$k['id_kat_panggilan'];?>">
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
					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_kat_panggilan/tambah');?>">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="blue bigger">Tambah Kategori Panggilan</h4>
							</div>

							<div class="modal-body">
								<div class="row">
									<div class="col-xs-12 col-sm-12">
										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Kategori panggilan</label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1-1" placeholder="ex : SP/SP1/SP2/SP3/dll" class="form-control" name="nama_kat_panggilan" required />
											</div>
										</div>

										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Keterangan</label>

											<div class="col-sm-9">
												<textarea name="keterangan_kat_panggilan" class="form-control" id="form-field-8" placeholder="ex : Poin 16 - 30"></textarea>
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