<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Rapat</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<!-- end card header -->
							<div class="card-body">
								<form action="/rapat" method="post" enctype="multipart/form-data" id="addRapat"> @csrf 
									<ul class="wizard-nav mb-5">
										<li class="wizard-list-item">
											<div class="list-item">
												<div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Seller Details">
													<i class="bx bx-user-voice"></i>
												</div>
											</div>
										</li>
										<li class="wizard-list-item">
											<div class="list-item">
												<div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Company Document">
													<i class="bx bx-user-plus"></i>
												</div>
											</div>
										</li>
										<li class="wizard-list-item">
											<div class="list-item">
												<div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Company Document">
													<i class="bx bx-file"></i>
												</div>
											</div>
										</li>
										<li class="wizard-list-item">
											<div class="list-item">
												<div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Bank Details">
													<i class="bx bx-envelope"></i>
												</div>
											</div>
										</li>
									</ul>
									<!-- wizard-nav -->
									<div class="wizard-tab">
										<div class="text-center mb-4">
											<h5>Detail Rapat</h5>
											<p class="card-title-desc">Isi semua informasi dibawah</p>
										</div>
										<div>
											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<input type="hidden" name="divisi_id" value="{{ session('divisi_id') }}">
														<label for="basicpill-firstname-input" class="form-label">Nama Rapat</label>
														<input type="text" class="form-control" placeholder="Masukkan Nama Rapat" id="basicpill-firstname-input" name="judul">
													</div>
												</div>
												<!-- end col -->
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="basicpill-lastname-input" class="form-label">Tanggal Rapat</label>
														<input type="date" class="form-control" placeholder="Masukkan Tanggal Rapat" id="basicpill-lastname-input" name="tanggal">
													</div>
												</div>
												<!-- end col -->
											</div>
											<!-- end row -->
											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="basicpill-phoneno-input" class="form-label">Waktu</label>
														<input type="time" class="form-control" placeholder="Enter Phone" id="basicpill-phoneno-input" name="waktu">
													</div>
												</div>
												<!-- end col -->
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="basicpill-phoneno-input" class="form-label">Tempat (Jika online sertakan link)</label>
														<input type="text" class="form-control" placeholder="Masukkan Nama Ruangan" id="basicpill-phoneno-input" name="tempat">
													</div>
												</div>
												<!-- end col -->
											</div>
											<div class="row">
												<!-- end col -->
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="basicpill-phoneno-input" class="form-label">Jenis</label>
														<select name="jenis" class="form-control">
															<option value="Rapat Offline">Rapat Offline</option>
															<option value="Rapat Online">Rapat Online</option>
														</select>
													</div>
												</div>
												{{-- <div class="col-lg-6">
													
													<div class="mb-3">
														<label for="basicpill-phoneno-input" class="form-label">Link Absensi</label>
														<input type="text" class="form-control" placeholder="Masukkan Link Absensi" id="basicpill-phoneno-input" name="link_absensi">
													</div>
												</div> --}}
											</div>
											<!-- end row -->
											<div class="row">
												<div class="col-lg-12">
													<div class="mb-3">
														<label for="basicpill-address-input" class="form-label">Deskripsi</label>
														<textarea id="basicpill-address-input" class="form-control" placeholder="Masukkan Deskripsi" rows="2" name="deskripsi"></textarea>
													</div>
												</div>
												<!-- end col -->
											</div>
											<!-- end row -->
										</div>
									</div>
									<!-- wizard-tab -->
									<div class="wizard-tab">
										<div>
											<div class="text-center mb-4">
												<h5>Anggota Rapat</h5>
												<p class="card-title-desc">Anda bisa memilih lebih dari satu divisi</p>
											</div>
											<div class="row">
												<div class="col-12">
													<div class="card">
														<div class="card-body">
															<input type="hidden" name="anggota" id="anggota">
															<table class="table table-responsive table-striped display" id="divisi">
																<thead>
																	<tr>
																		<th></th>
																		<th>Divisi</th>
																	</tr>
																</thead>
																<tbody>
																	@foreach ($divisi as $d) 
																	  <tr>
																		<td><input type="checkbox" value="{{ $d->id }}"></td>
																		<td>
																			{{ $d->nama_divisi }}</b><br />
																		</td>
																	  </tr> @endforeach
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
											<!-- end form -->
										</div>
									</div>
									<!-- wizard-tab -->
									<div class="wizard-tab">
										<div>
											<div class="text-center mb-4">
												<h5>Dokumen Rapat</h5>
												<p class="card-title-desc">Isi semua informasi dibawah</p>
											</div>
											<div>
												<div class="row" id="fileList">
													
												</div>
												{{-- <div class="row mb-4">
													<button type="button" class="btn btn-primary waves-effect waves-light" id="tambahMateri">Tambah Materi Baru</button>
												</div> --}}
												<div id="formMateriRapat">
												<div class="row mt-2">
													<div class="col-lg-6">
														<div class="mb-3">
															<label for="basicpill-namecard-input" class="form-label">Judul Materi</label>
															<input type="text" class="form-control" placeholder="Masukkan Judul Materi" name="judul_materi" id="judul_materi">
															<div id="judulWarning" style="color: red;"></div>
														</div>
													</div>
													<!-- end col -->
													<div class="col-lg-6">
														<div class="mb-3">
															<label for="basicpill-cardno-input" class="form-label">File Materi</label>
															<input type="file" class="form-control" placeholder="Enter Credit Card Number" id="basicpill-cardno-input" name="file_materi" id="file_materi">
															<div id="fileWarning" style="color: red;"></div>
														</div>
													</div>
													<!-- end col -->
												</div>
												<!-- end row -->
												<div class="row">
													<div class="col-lg-12">
														<div class="mb-3">
															<label for="basicpill-address-input" class="form-label">Deskripsi</label>
															<textarea id="basicpill-address-input" class="form-control" placeholder="Masukkan Deskripsi" rows="2" name="deskripsi_materi" id="deskripsi_materi"></textarea>
															<div id="deskripsiWarning" style="color: red;"></div>
														</div>
													</div>
													<!-- end col -->
												</div>
												<!-- end row -->
												</div>
											</div>
											<!-- end form -->
										</div>
									</div>
									<!-- wizard-tab -->
									<div class="wizard-tab">
										<div>
											<div class="text-center mb-4">
												{{-- <h5>Undangan Rapat</h5> --}}
											</div> @include('Emails.template_email') 
											{{-- <div class="row mt-4">
												<div class="col-lg-6">
													<div class="form-check form-switch" dir="ltr">
														<input type="checkbox" class="form-check-input" id="customSwitch1" checked name="sekarang">
														<label class="form-check-label" for="customSwitch1">Kirim Undangan Sekarang</label>
													</div>
												</div>
											</div>
											<div class="row mt-4" id="jadwal" style="display: none;">
												<div class="col-lg-12">
													<div class="mb-3">
														<label for="basicpill-cardno-input" class="form-label">Jadwalkan Pengiriman</label>
														<input name="jadwal_kirim" type="datetime-local" class="form-control" placeholder="Masukkan Tanggal dan Waktu Penjadwalan" id="basicpill-cardno-input">
													</div>
												</div>
											</div> --}}
											<!-- end form -->
										</div>
									</div>
									<!-- wizard-tab -->
									<div class="d-flex align-items-start gap-3 mt-4">
										<button type="button" class="btn btn-primary w-sm" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
										<button type="button" class="btn btn-primary w-sm ms-auto" id="nextBtn" onclick="nextPrev(1)">Next</button>
										<button type="submit" class="btn btn-primary w-sm ms-auto" id="submitBtn" style="display: none;">Submit Form</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- end col -->
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	// var table = $('#divisi').DataTable({
	// 	'columnDefs': [
	// 		{
	// 			'targets': 0,
	// 			'checkboxes': {
	// 				'selectRow': true
	// 			}
	// 		}
	// 	],
	// 	'select': {
	// 		'style': 'multi'
	// 	},
	// 	'order': [[1, 'asc']]
	// 	});

		// Materi
		

		// $(document).ready(function(){
		// 	$('.tambahMateri').click(function () {
        //     var fileList = document.getElementById('fileList');
        //     fileList.innerHTML = '<h3>Files Selected:</h3>';
            
        //     var inputFiles = document.querySelector('input[type=file]').files;
            
        //     for (var i = 0; i < inputFiles.length; i++) {
        //         var file = inputFiles[i];
        //         fileList.innerHTML += '<p>' + file.name + '</p>';
        //     }
        // });
		// });
		
	
		// Menggunakan jQuery

</script>