@extends('page-starter') 
@section('isi')

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="mb-0">Master Data</h4>
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item">
						<a href="javascript: void(0);">Tabel</a>
					</li>
					<li class="breadcrumb-item active">Tabel Rapat</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- end page title -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title mb-0">Table Rapat</h4>
				@if(session('divisi_id') !== 1)
					<button type="button" class="btn btn-primary w-sm ms-auto float-end" data-bs-toggle="modal" data-bs-target="#modalAdd">
						<i class="fas fa-folder-plus text-white-50"></i> Tambah </a>
					</button>
				@endif
			</div>
			<!-- end card header -->
			<div class="card-body">
				<table class="hover dataTabel stripe">
					<thead>
						<tr>
							<th>Rapat</th>
							<th>Waktu</th>
							<th>Tempat</th>
							{{-- @if(session('divisi_id') == 1) 
								<th>Divisi</th>
							@endif  --}}
							<th>QR Code Absensi</th>
							<th>Notulensi</th>
							{{-- <th>Absensi</th> --}}
						</tr>
					</thead>
					<tbody>
						@foreach ($item as $i) 
						  <tr>
							<td>
								<b><a href="/rapat/{{ $i->id }}">{{ $i->judul }}</a></b><br />
								<p>{{ $i->deskripsi }}</p>
								Password : <span style="color: red">{{ $i->password }}</span>
							</td>
							<td>{{ $i->waktu }} WIB <br/>{{ $i->tanggal }}</td>
							<td><b>{{ $i->jenis }}</b><br/>{{ $i->tempat }}</td>
							{{-- @if(session('divisi_id') == 1) 
								<td>{{ $i->divisis }}</td>
							@endif  --}}
							<td>
								<a>
								{!! QrCode::size(200)->generate($i->link_absensi) !!}
								{{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate('http://google.com')) !!} "> --}}
								</a>
							</td>
							<td>
								@if(($i->risalah != null) > 0)
									<a href="/risalah" class="btn btn-primary btn-sm disabled">Sudah Dibuat</a>
								@else
									<a href="/risalah/{{ $i->id }}" class="btn btn-success btn-sm">Buat Baru</a>
								@endif </td>
							{{-- <td><a href="">Absensi</a></td> --}}

						  </tr> @endforeach
						  
					</tbody>
				</table>
			</div>
			<!-- end card body -->
		</div>
		<!-- end card -->
	</div>
	<!-- end col -->
</div>
<!-- end row -->
<!-- end row --> 
@include('Rapat.modal_add') @endsection