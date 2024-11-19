<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesdesign.in/symox-laravel/layouts/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jul 2022 07:12:00 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>{{ $judul }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-layout="horizontal" data-topbar="dark">

    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-10 col-lg-8 col-xl-7">

                        <div class="text-center mb-4">
                            <a href="index.html">
                                <img src="{{ asset('assets/images/logo-sm.svg')}}" alt="" height="22"> <span class="logo-txt">MR. Rapat</span>
                            </a>
                       </div>

                        <div class="card">
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    {{-- <h5 class="text-primary">Rapat</h5> --}}
                                    <p class="text-muted">Silahkan mengisi formulir absensi terlebih dahulu</p>
                                    @if(session()->get('masuk_salah_password'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-chevron-double-right me-2"></i>
                                        {{ session()->get('masuk_salah_password') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="/absensi" method="post"> @csrf
                                        <div class="table-responsive">
                                            <table class="table  mb-0">
        
                                                <tbody>
                                                    <tr>
                                                        <th>Pokok Bahasan</th>
                                                        <td>{{ $rapat['judul'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal</th>
                                                        <td>{{ $rapat['tanggal'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tempat</th>
                                                        <td>{{ $rapat['tempat'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Penyelenggara</th>
                                                        <td>{{ $divisi['nama_divisi'] }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-5">
                                            <p><b>Absensi anggota rapat dapat dilihat <a href="/showAbsensi/{{ $rapat['id'] }}">disini</a></b><p><br />
                                            {{-- <div class="card"> --}}
                                                
                                                {{-- <div class="card-body"> --}}
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                        <li class="nav-item waves-effect waves-light">
                                                            <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab" menu="Internal PAL">
                                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                                <span class="d-none d-sm-block">Internal PAL</span> 
                                                            </a>
                                                        </li>
                                                        <li class="nav-item waves-effect waves-light">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab" menu="Eksternal PAL">
                                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                                <span class="d-none d-sm-block">Eksternal PAL</span> 
                                                            </a>
                                                        </li>
                                                    </ul>
                    
                                                    <!-- Tab panes -->
                                                    <div class="tab-content p-3 text-muted">
                                                            <input type="hidden" value="Internal PAL" name="in_eks_pal">
                                                            <input type="hidden" value="{{ $id }}" name="rapat_id">
                                                            <div class="tab-pane active internal" id="home-1" role="tabpanel">
                                                                <p class="mb-0">
                                                                    <div class="row mt-4">
                                                                        <div class="col-12">
                                                                                    <div class="mb-3 row">
                                                                                        <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                                                                                        <div class="col-md-10">
                                                                                            <input class="form-control" type="text" placeholder="Masukkan Nama" id="example-text-input" name="nama">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="example-search-input" class="col-md-2 col-form-label">Jabatan</label>
                                                                                        <div class="col-md-10">
                                                                                            <input class="form-control" type="text" placeholder="Masukkan Jabatan" id="example-search-input" name="jabatan">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label class="col-md-2 col-form-label">Divisi</label>
                                                                                        <div class="col-md-10">
                                                                                            <select class="form-select" name="divisi">
                                                                                                @foreach($list_divisi as $l)
                                                                                                    <option value="{{ $l->nama_divisi }}">{{ $l->nama_divisi }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                {{-- </div> --}}
                                                                            {{-- </div> --}}
                                                                        </div> <!-- end col -->
                                                                    </div>
                                                                </p>
                                                            </div>
                                                            <div class="tab-pane eksternal" id="profile-1" role="tabpanel">
                                                                <p class="mb-0">
                                                                    <div class="row mt-4">
                                                                        <div class="col-12">
                                                                                    <div class="mb-3 row">
                                                                                        <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                                                                                        <div class="col-md-10">
                                                                                            <input class="form-control" type="text" placeholder="Masukkan Nama" id="example-text-input" name="nama_eks">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="example-search-input" class="col-md-2 col-form-label">Jabatan</label>
                                                                                        <div class="col-md-10">
                                                                                            <input class="form-control" type="text" placeholder="Masukkan Jabatan" id="example-search-input" name="jabatan_eks">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="example-search-input" class="col-md-2 col-form-label">Instansi</label>
                                                                                        <div class="col-md-10">
                                                                                            <input class="form-control" type="text" placeholder="Masukkan Instansi" id="example-search-input" name="instansi">
                                                                                        </div>
                                                                                    </div>
                                                                                {{-- </div> --}}
                                                                            {{-- </div> --}}
                                                                        </div> <!-- end col -->
                                                                    </div>
                                                                </p>
                                                            </div>
                                                    </div>
                                                {{-- </div><!-- end card-body --> --}}
                                            {{-- </div><!-- end card --> --}}
                                        </div>
                                        {{-- <div class="mb-3 mt-5">
                                            <label class="form-label" for="userpassword">Nama</label>
                                            <input type="text" class="form-control" id="userpassword" placeholder="Enter password" name="password">
                                            <input type="hidden" name="rapat_id" value="{{ $rapat['id'] }}">
                                        </div> --}}
                                        
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Submit</button>
                                        </div>
                                        
                                        
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center text-muted p-4">
                            <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script> MR. Rapat by Kelompok Magang</p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/js/jquery_3.6.4_jquery.min.js')}}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js')}}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js')}}"></script>
        <script type="text/javascript">
            $(function(){
                $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                    var target = $(e.target).attr("menu") // activated tab
                    $('input[name="in_eks_pal"]').val(target);
                });
            });
        </script>

    </body>

<!-- Mirrored from themesdesign.in/symox-laravel/layouts/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jul 2022 07:12:00 GMT -->
</html>
