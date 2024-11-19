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
					<li class="breadcrumb-item active">Tabel Karyawan</li>
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
				<h4 class="card-title mb-0">Table Karyawan</h4>
				{{-- <button type="button" class="btn btn-primary w-sm ms-auto float-end" data-bs-toggle="modal" data-bs-target="#modalAdd">
					<i class="fas fa-folder-plus text-white-50"></i> Tambah </a>
				</button> --}}
			</div>
			<!-- end card header -->
			<div class="card-body">
				<table class="hover dataTabel stripe">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Email</th>
							<th>Jabatan</th>
							{{-- <th>Absensi</th> --}}
						</tr>
					</thead>
					<tbody>
						@foreach ($karyawan as $i) 
						  <tr>
							<td>
								{{ $i->nama }}
							</td>
							<td>{{ $i->email }}</td>
							<td>{{ $i->jabatan }}</td>
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
<!-- end row -->@endsection