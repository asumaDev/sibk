<div id="navbar" class="navbar navbar-default ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="<?php echo base_url('index.php/c_home');?>" class="navbar-brand">
				<small>
					<i class="fa fa-leaf"></i>
					SI BK
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				

				<li class=" dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="<?php echo base_url();?>assets/images/logo.png" alt="Jason's Photo" />
						<?php if($_SESSION['id_hak_akses']==1) { ?>
							<small>Administrator</small>
						<?php } else if ($_SESSION['id_hak_akses']==2) { ?>
							<small>Operator</small>
						<?php } else { ?>
							<small><?php echo $_SESSION['nama_siswa'];?></small>
						<?php } ?>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="#"  href="#" data-toggle="modal" data-target="#chPassword">
								<i class="ace-icon fa fa-cog"></i>
								Ubah Password
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="<?php echo base_url('index.php/c_auth/logout');?>">
								<i class="ace-icon fa fa-power-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>