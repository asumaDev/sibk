<ul class="nav nav-list">

					<?php if ($this->uri->segment(1)=='c_home') { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
					<?php } ?>
						<a href="<?php echo base_url('index.php/c_home');?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Halaman Awal </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if ($_SESSION['id_hak_akses']==1) { ?>

					<?php if ($this->uri->segment(1)=='c_jabatan'||$this->uri->segment(1)=='c_guru'||$this->uri->segment(1)=='c_guru'||$this->uri->segment(1)=='c_ortu'||$this->uri->segment(1)=='c_tahun'||$this->uri->segment(1)=='c_pengguna'||$this->uri->segment(1)=='c_jurusan'||$this->uri->segment(1)=='c_kelas'||$this->uri->segment(1)=='c_kat_pelanggaran'||$this->uri->segment(1)=='c_pelanggaran'||$this->uri->segment(1)=='c_kat_prestasi'||$this->uri->segment(1)=='c_prestasi'||$this->uri->segment(1)=='c_kat_panggilan') { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
					<?php } ?>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Data Master
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<?php if ($this->uri->segment(1)=='c_jabatan'||$this->uri->segment(1)=='c_guru'||$this->uri->segment(1)=='c_guru'||$this->uri->segment(1)=='c_ortu'||$this->uri->segment(1)=='c_tahun'||$this->uri->segment(1)=='c_pengguna') { ?>
								<li class="active">
							<?php } else { ?> 
								<li class="">
							<?php } ?>
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									Awal
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
								<ul class="submenu">


									<?php if ($this->uri->segment(1)=='c_jabatan') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_jabatan');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Jabatan
										</a>

										<b class="arrow"></b>
									</li>

									<?php if ($this->uri->segment(1)=='c_guru') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_guru');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Guru
										</a>

										<b class="arrow"></b>
									</li>

									<?php if ($this->uri->segment(1)=='c_ortu') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_ortu');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Wali Murid
										</a>

										<b class="arrow"></b>
									</li>

									<?php if ($this->uri->segment(1)=='c_tahun') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_tahun');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Tahun Ajaran
										</a>

										<b class="arrow"></b>
									</li>

									<?php if ($this->uri->segment(1)=='c_pengguna') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_pengguna');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Pengguna
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>

							<?php if ($this->uri->segment(1)=='c_jurusan'||$this->uri->segment(1)=='c_kelas') { ?>
								<li class="active">
							<?php } else { ?> 
								<li class="">
							<?php } ?>
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									Kelas
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
								<ul class="submenu">

									<?php if ($this->uri->segment(1)=='c_kelas') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_kelas');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Kelas
										</a>

										<b class="arrow"></b>
									</li>

									<?php if ($this->uri->segment(1)=='c_jurusan') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_jurusan');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Jurusan
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>

							<?php if ($this->uri->segment(1)=='c_kat_pelanggaran'||$this->uri->segment(1)=='c_pelanggaran') { ?>
								<li class="active">
							<?php } else { ?> 
								<li class="">
							<?php } ?>
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									Pelanggaran
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
								<ul class="submenu">

									<?php if ($this->uri->segment(1)=='c_kat_pelanggaran') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_kat_pelanggaran');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Kategori Pelanggaran
										</a>

										<b class="arrow"></b>
									</li>

									<?php if ($this->uri->segment(1)=='c_pelanggaran') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_pelanggaran');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Pelanggaran
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>

							<?php if ($this->uri->segment(1)=='c_kat_prestasi'||$this->uri->segment(1)=='c_prestasi') { ?>
								<li class="active">
							<?php } else { ?> 
								<li class="">
							<?php } ?>
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									Prestasi
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
								<ul class="submenu">

									<?php if ($this->uri->segment(1)=='c_kat_prestasi') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_kat_prestasi');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Kategori Prestasi
										</a>

										<b class="arrow"></b>
									</li>

									<?php if ($this->uri->segment(1)=='c_prestasi') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_prestasi');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Prestasi
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>

							<?php if ($this->uri->segment(1)=='c_kat_panggilan') { ?>
								<li class="active">
							<?php } else { ?> 
								<li class="">
							<?php } ?>
									<a href="<?php echo base_url('index.php/c_kat_panggilan');?>">
										<i class="menu-icon fa fa-caret-right"></i>
										Kategori Panggilan
									</a>
										<b class="arrow"></b>
								</li>
							
						</ul>
					</li>
					<?php } ?>

					<?php if ($this->uri->segment(1)=='c_kelas_jurusan'||$this->uri->segment(1)=='c_siswa'||$this->uri->segment(1)=='c_absensi') { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
					<?php } ?>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">
								Kesiswaan
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">

							<?php if ($_SESSION['id_hak_akses']==1 || $_SESSION['id_hak_akses']==2) { ?>
							<?php if ($this->uri->segment(1)=='c_kelas_jurusan') { ?>
								<li class="active">
							<?php } else { ?> 
								<li class="">
							<?php } ?>
								<a href="<?php echo base_url('index.php/c_kelas_jurusan');?>">
									<i class="menu-icon fa fa-caret-righ"></i>
									<span class="menu-text"> Kelas Jurusan </span>
								</a>

								<b class="arrow"></b>
							</li>

							<?php if ($this->uri->segment(1)=='c_siswa') { ?>
								<li class="active">
							<?php } else { ?> 
								<li class="">
							<?php } ?>
								<a href="<?php echo base_url('index.php/c_siswa');?>">
									<i class="menu-icon fa fa-caret-righ"></i>
									<span class="menu-text"> Siswa </span>
								</a>

								<b class="arrow"></b>
							</li>
							<?php } ?>

						<?php if($_SESSION['id_hak_akses']==3) { ?>

							<?php if ($this->uri->segment(1)=='c_absensi') { ?>
								<li class="active">
							<?php } else { ?> 
								<li class="">
							<?php } ?>
								<a href="<?php echo base_url('index.php/c_absensi');?>">
									<i class="menu-icon fa fa-caret-righ"></i>
									<span class="menu-text"> Absensi </span>
								</a>

								<b class="arrow"></b>
							</li>


						<?php } else { ?>
						
							<?php if ($this->uri->segment(1)=='c_absensi') { ?>
								<li class="active">
							<?php } else { ?> 
								<li class="">
							<?php } ?>
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									Absensi
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
								<ul class="submenu">

									<?php if ($this->uri->segment(2)=='tampil_kelas' || $this->uri->segment(2)=='tampil') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_absensi/tampil_kelas');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											By Kelas
										</a>

										<b class="arrow"></b>
									</li>

									<?php if ($this->uri->segment(2)=='tampil_siswa' || $this->uri->segment(2)=='cari_siswa') { ?>
										<li class="active">
									<?php } else { ?> 
										<li class="">
									<?php } ?>
										<a href="<?php echo base_url('index.php/c_absensi/cari_siswa');?>">
											<i class="menu-icon fa fa-caret-right"></i>
											By Siswa
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>
							<?php } ?>
						</ul>
					</li>

					

					<?php if ($this->uri->segment(1)=='c_prestasi_siswa'||$this->uri->segment(1)=='c_pelanggaran_siswa') { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
					<?php } ?>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-comments"></i>
							<span class="menu-text">
								Pelayanan BK
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<?php if ($this->uri->segment(1)=='c_prestasi_siswa') { ?>
								<li class="active">
							<?php } else { ?> 
								<li class="">
							<?php } ?>

							<?php if($_SESSION['id_hak_akses']==3) { ?>
								<a href="<?php echo base_url('index.php/c_prestasi_siswa/tampil');?>">
							<?php } else { ?>
								<a href="<?php echo base_url('index.php/c_prestasi_siswa');?>">
							<?php } ?>
									<i class="menu-icon fa fa-caret-righ"></i>
									<span class="menu-text"> Prestasi Siswa </span>
								</a>

								<b class="arrow"></b>
							</li>

							<?php if ($this->uri->segment(1)=='c_pelanggaran_siswa') { ?>
								<li class="active">
							<?php } else { ?> 
								<li class="">
							<?php } ?>
								
								<?php if($_SESSION['id_hak_akses']==3) { ?>
									<a href="<?php echo base_url('index.php/c_pelanggaran_siswa/tampil');?>">
								<?php } else { ?>
									<a href="<?php echo base_url('index.php/c_pelanggaran_siswa');?>">
								<?php } ?>
									<i class="menu-icon fa fa-caret-righ"></i>
									<span class="menu-text"> Pelanggaran Siswa </span>
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					

					<?php if ($this->uri->segment(1)=='c_penilaian_siswa') { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
					<?php } ?>

					<?php if($_SESSION['id_hak_akses']==3) { ?>
						<a href="<?php echo base_url('index.php/c_penilaian_siswa/tampil');?>">
					<?php } else { ?>
						<a href="<?php echo base_url('index.php/c_penilaian_siswa');?>">
					<?php } ?>
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Pribadi Siswa </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if ($_SESSION['id_hak_akses']==1 || $_SESSION['id_hak_akses']==2) { ?>

					<?php if ($this->uri->segment(1)=='c_panggilan') { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
					<?php } ?>
						<a href="<?php echo base_url('index.php/c_panggilan');?>">
							<i class="menu-icon fa fa-bullhorn"></i>
							<span class="menu-text"> Panggilan </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php } ?>

				</ul><!-- /.nav-list -->
