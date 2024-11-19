@extends('page-starter') 
@section('isi')
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
					<li class="breadcrumb-item active">Detail Rapat</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- end page title -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<!-- end card header -->
			<div class="card-body">
                <div class="pb-3">
                    <a href="/rapat"> < Kembali</a>
                    <h2 class="font-size-18 mb-3 mt-4">Detail Rapat </h2><br/>
                    <div class="product-desc">
                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="deskripsi-tab" data-bs-toggle="tab" href="#deskripsi" role="tab">Deskripsi</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="materi-tab" data-bs-toggle="tab" href="#materi" role="tab"></a>
                              </li> --}}
                            <li class="nav-item">
                              <a class="nav-link" id="anggota-tab" data-bs-toggle="tab" href="#anggota" role="tab">Anggota Rapat</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="risalah-tab" data-bs-toggle="tab" href="#risalah" role="tab">File</a>
                            </li>
                        </ul>
                        <div class="tab-content border border-top-0 p-4">
                            <div class="tab-pane fade show active" id="deskripsi" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 20%;">Judul</th>
                                                <td>{{ $item->judul }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tanggal</th>
                                                <td>{{ $item->tanggal }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Waktu</th>
                                                <td>{{ $item->waktu }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jenis</th>
                                                <td>{{ $item->jenis }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tempat</th>
                                                <td>{{ $item->tempat }}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="risalah" role="tabpanel">
                                <table class="table table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="width: 20%;">Materi Rapat</th>
                                            <td><a target="_blank" href="{{ asset('uploads/dokumen_rapat/'.$item->file_materi) }}">{{ $item['judul_materi'] }}</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Risalah Rapat</th>
                                            <td>
                                                @if(isset($item->risalah))
                                                                <a target="_blank" href="{{ asset('uploads/risalah_rapat/'.$item->risalah->file) }}">{{ $item->risalah->file }}</a>
                                                            @else
                                                                Risalah Belum Dibuat
                                                            @endif
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="anggota" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <th>No</th>
                                                <th>Divisi</th>
                                            </tr>
                                            @foreach($divisi as $d)
                                            
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->nama_divisi }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection