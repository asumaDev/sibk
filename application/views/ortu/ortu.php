<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('index.php/c_home');?>">Home</a>
				</li>
				<li class="active">Data Master</li>
				<li class="active">Wali Murid</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Data Master
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Walid Murid
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
								Results for "Wali Murid"
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
											<th>Nama</th>
											<th>Alamat</th>
											<th>Jenis Kelamain</th>
											<th>Nomor HP</th>
											<th>ID Ortu</th>
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
										<?php $no = 1; foreach ($ortu as $o) { ?>
											<tr>
												<td class="center">
													<?php echo $no++;?>
												</td>
												<td><?php echo $o['nama_ortu'];?></td>
												<td><?php echo $o['alamat_ortu'];?></td>
												<td><?php echo $o['jenkel_ortu'];?></td>
												<td><?php echo $o['hp_ortu'];?></td>
												<td><?php echo $o['id_ortu'];?></td>
												<td>
													<div class="hidden-sm hidden-xs action-buttons">

														<a class="green" href="<?php echo base_url('index.php/c_ortu/edit/').$o['id_ortu'];?>">
															<i class="ace-icon fa fa-pencil bigger-130"></i>
														</a>

														<a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url('index.php/c_ortu/hapus/').$o['id_ortu'];?>">
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
					
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="blue bigger">Tambah Wali Murid</h4>
						</div>

						<div class="modal-body">
							<div class="row">
								<div class="col-xs-12 col-sm-12">
								<form class="form-horizontal" action="<?php echo base_url('index.php/c_ortu/upload');?>" method="post" enctype="multipart/form-data">
										<div class="form-group">

											<label class="col-xs-3" for="form-field-1-1">Input Data (Excel)</label>

											<div class="col-xs-6">
												<input type="file" name="file" class="form-control" required/>
											</div>
											<div class="col-sm-3">
												<button class="btn btn-sm btn-primary">
													<i class="ace-icon fa fa-plus">Tambah</i>
												</button>
											</div>
										</div>
									</form>	

									<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_ortu/tambah_banyak');?>">
										<div class="clearfix form-actions">
											<div class="form-group">

												<label class="col-xs-7 control-label no-padding-right" for="form-field-1-1">Tambah Data Banyak | Masukan Jumlah</label>

												<div class="col-xs-2">
													<select class="form-control" id="form-field-select-1" name="banyak_input">
														<?php for ($i=50;$i>0;$i--){ ?>

															<option value="<?php echo $i;?>"><?php echo $i;?></option>
														<?php } ?>
													</select>
												</div>
												<div class="col-sm-3">
													<button class="btn btn-sm btn-primary">
														<i class="ace-icon fa fa-plus"></i>
														
													</button>
												</div>
											</div>
										</div>
									</form>

									<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/c_ortu/tambah');?>">
										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama</label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1-1" placeholder="ex : Anggi Surya Permana" class="form-control" name="nama_ortu" required />
											</div>
										</div>

										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Alamat</label>

											<div class="col-sm-9">
												<textarea name="alamat_ortu" class="form-control" id="form-field-8" placeholder="ex : Jl. Yogyakarta"></textarea>
											</div>
										</div>

										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Jenis Kelamin</label>

											<div class="col-sm-9">
												<select class="form-control" id="form-field-select-1" name="jenkel_ortu">
													<option value="L">Laki-laki</option>
													<option value="P">Perempuan</option>
												</select>
											</div>
										</div>

										<div class="space-4"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Handphone</label>

											<div class="col-sm-9">
												<input type="number" id="form-field-1-1" placeholder="ex : 0888-8888-8888" class="form-control" name="hp_ortu" required />
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