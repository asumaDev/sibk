<html>

<head>
	<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
	<meta name=Generator content="Microsoft Word 15 (filtered)">
	<style>
	<!--
	/* Font Definitions */
	@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
	@font-face
	{font-family:Calibri;
		panose-1:2 15 5 2 2 2 4 3 2 4;}
		/* Style Definitions */
		p.MsoNormal, li.MsoNormal, div.MsoNormal
		{margin-top:0cm;
			margin-right:0cm;
			margin-bottom:8.0pt;
			margin-left:0cm;
			line-height:107%;
			font-size:11.0pt;
			font-family:"Calibri",sans-serif;}
			p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
			{margin-top:0cm;
				margin-right:0cm;
				margin-bottom:8.0pt;
				margin-left:36.0pt;
				line-height:107%;
				font-size:11.0pt;
				font-family:"Calibri",sans-serif;}
				p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
				{margin-top:0cm;
					margin-right:0cm;
					margin-bottom:0cm;
					margin-left:36.0pt;
					margin-bottom:.0001pt;
					line-height:107%;
					font-size:11.0pt;
					font-family:"Calibri",sans-serif;}
					p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
					{margin-top:0cm;
						margin-right:0cm;
						margin-bottom:0cm;
						margin-left:36.0pt;
						margin-bottom:.0001pt;
						line-height:107%;
						font-size:11.0pt;
						font-family:"Calibri",sans-serif;}
						p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
						{margin-top:0cm;
							margin-right:0cm;
							margin-bottom:8.0pt;
							margin-left:36.0pt;
							line-height:107%;
							font-size:11.0pt;
							font-family:"Calibri",sans-serif;}
							.MsoChpDefault
							{font-family:"Calibri",sans-serif;}
							.MsoPapDefault
							{margin-bottom:8.0pt;
								line-height:107%;}
								@page WordSection1
								{size:595.3pt 841.9pt;
									margin:72.0pt 72.0pt 72.0pt 72.0pt;}
									div.WordSection1
									{page:WordSection1;}
									/* List Definitions */
									ol
									{margin-bottom:0cm;}
									ul
									{margin-bottom:0cm;}
									-->
								</style>

							</head>

							<body lang=EN-US onload="window.print()">

								<div class=WordSection1>

									<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
									text-align:center;line-height:115%'><b><span lang=IN style='font-size:16.0pt;
									line-height:115%;font-family:"Times New Roman",serif'>SURAT PERYATAAN&nbsp<?php echo $kategori_sp;?></span></b></p>

									<p class=MsoNormal align=center style='text-align:center;line-height:115%'><b><span
										lang=IN style='font-size:2.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></b></p>

										<p class=MsoNormal align=center style='text-align:center;line-height:115%'><i><span
											lang=IN style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Bismillahirrahmaanirrahiim</span></i></p>

											<p class=MsoNormal align=center style='text-align:center;line-height:115%'><i><span
												lang=IN style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></i></p>

												<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
												justify;line-height:115%'><span lang=IN style='font-size:12.0pt;line-height:
												115%;font-family:"Times New Roman",serif'>Yang bertanda tangan di bawah ini :</span></p>

												<p class=MsoNormal style='text-align:justify;line-height:115%'><span lang=IN
													style='font-size:1.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>

													<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
													justify;line-height:115%'><span lang=IN style='font-size:12.0pt;line-height:
													115%;font-family:"Times New Roman",serif'>Nama &nbsp &nbsp &nbsp &nbsp: <?php echo $siswa->nama_siswa;?></span></p>

													<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
													justify;line-height:115%'><span lang=IN style='font-size:12.0pt;line-height:
													115%;font-family:"Times New Roman",serif'>Asrama &nbsp &nbsp : <?php echo $asrama;?></span></p>

													<p class=MsoNormal style='margin-bottom:6.0pt;text-align:justify;line-height:
													115%'><span lang=IN style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Kelas &nbsp &nbsp &nbsp &nbsp: <?php echo $kelas_jurusan->tingkat.' '.$kelas_jurusan->nama_jurusan.' '.$kelas_jurusan->urutan_kelas_jurusan;?></span></p>

													<p class=MsoNormal style='margin-bottom:6.0pt;text-align:justify;line-height:
													115%'><span lang=IN style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Menyatakan
														telah melanggar tata tertib Madrasah Mu'allimin Muhammadiyah Yogyakarta berupa
													:</span></p>

													<?php $no=1; foreach ($pelanggaran_siswa as $p) { ?>
														<p class=MsoListParagraph style='margin-left:21.3pt;text-align:justify;
														text-indent:-21.3pt;line-height:115%'><span lang=IN style='font-size:12.0pt;
														line-height:115%;font-family:"Times New Roman",serif'><?php echo $no++;?>.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															</span></span><span lang=IN style='font-size:12.0pt;line-height:115%;
															font-family:"Times New Roman",serif'><?php echo $p['nama_pelanggaran'];?></span></p>
														<?php } ?>

														<p class=MsoNormal style='text-align:justify;line-height:115%'><span lang=IN
															style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Sebagai
															akibat dari pelanggaran tersebut, saya bersedia menerima hukuman/sanksi dari
														Madrasah berupa :</span></p>

														<?php $no=1; foreach ($pelanggaran_siswa as $p) { ?>
															<p class=MsoListParagraph style='margin-left:21.3pt;text-align:justify;
															text-indent:-21.3pt;line-height:115%'><span lang=IN style='font-size:12.0pt;
															line-height:115%;font-family:"Times New Roman",serif'><?php echo $no++;?>.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																</span></span><span lang=IN style='font-size:12.0pt;line-height:115%;
																font-family:"Times New Roman",serif'><?php echo $p['tindak_lanjut'];?></span></p>
															<?php } ?>

															<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
															justify;line-height:115%'><span lang=IN style='font-size:12.0pt;line-height:
															115%;font-family:"Times New Roman",serif'>Dan saya berjanji tidak akan
															mengulangi pelanggaran tata tertib Madrasah Mu'allamin Muhammadiyah Yogyakarta.
															Apabila kemudia saya dinyatakan melanggar lagi, saya bersedia menerima sanksi
															yang berlaku dari madrasah. Demikian, surat pernyataan ini saya buat dengan
														sebenar-benarnya.</span></p>

														<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
														justify;line-height:115%'><span lang=IN style='font-size:12.0pt;line-height:
														115%;font-family:"Times New Roman",serif'></span></p>

														<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
														style='margin-left:14.2pt;border-collapse:collapse;border:none'>
														<tr>
															<td width=378 valign=top style='width:10.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Mengetahui,</span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Guru
																BK</span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>(&nbsp <?php echo $bk;?> &nbsp )</span></p>
															</td>
															<td width=204 valign=top style='width:153.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span lang=IN style='font-size:12.0pt;line-height:115%;font-family:
																"Times New Roman",serif'>Yogyakarta, <?php echo $tanggal_surat;?></span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Hormat
																Saya,</span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>
																<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
																115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>( &nbsp <?php echo $siswa->nama_siswa;?> &nbsp )</span></p>
															</td>
														</tr>
													</table>

													<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
													115%'><span lang=IN style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>

													<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
													justify;line-height:115%'><span lang=IN style='font-size:12.0pt;line-height:
													115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>

													<p class=MsoNormal style='text-align:justify;line-height:115%'><span lang=IN
														style='font-family:"Times New Roman",serif'>Tembusan :</span></p>

														<p class=MsoListParagraphCxSpFirst style='text-align:justify;text-indent:-18.0pt;
														line-height:115%'><span lang=IN style='font-family:"Times New Roman",serif'>1.<span
															style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
															lang=IN style='font-family:"Times New Roman",serif'>Wa.Dir III</span></p>

															<p class=MsoListParagraphCxSpMiddle style='text-align:justify;text-indent:-18.0pt;
															line-height:115%'><span lang=IN style='font-family:"Times New Roman",serif'>2.<span
																style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
																lang=IN style='font-family:"Times New Roman",serif'>Ka.BS</span></p>

																<p class=MsoListParagraphCxSpMiddle style='text-align:justify;text-indent:-18.0pt;
																line-height:115%'><span lang=IN style='font-family:"Times New Roman",serif'>3.<span
																	style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
																	lang=IN style='font-family:"Times New Roman",serif'>Wali Kelas</span></p>

																	<p class=MsoListParagraphCxSpMiddle style='text-align:justify;text-indent:-18.0pt;
																	line-height:115%'><span lang=IN style='font-family:"Times New Roman",serif'>4.<span
																		style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
																		lang=IN style='font-family:"Times New Roman",serif'>Pamong</span></p>

																		<p class=MsoListParagraphCxSpMiddle style='text-align:justify;text-indent:-18.0pt;
																		line-height:115%'><span lang=IN style='font-family:"Times New Roman",serif'>5.<span
																			style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
																			lang=IN style='font-family:"Times New Roman",serif'>Musrif</span></p>

																			<p class=MsoListParagraphCxSpMiddle style='text-align:justify;text-indent:-18.0pt;
																			line-height:115%'><span lang=IN style='font-family:"Times New Roman",serif'>6.<span
																				style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
																				lang=IN style='font-family:"Times New Roman",serif'>Orangtua/Wali</span></p>

																				<p class=MsoListParagraphCxSpLast style='text-align:justify;text-indent:-18.0pt;
																				line-height:115%'><span lang=IN style='font-family:"Times New Roman",serif'>7.<span
																					style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
																					lang=IN style='font-family:"Times New Roman",serif'>Arsip</span></p>

																				</div>

																			</body>

																			</html>
