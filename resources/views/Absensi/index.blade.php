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
                                    <p class="text-muted">Silahkan tekan tombol Hadir apabila Anda menghadiri rapat ini</p>
                                    @if(session()->get('absen_sukses'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-check-all me-2"></i>
                                        {{ session()->get('absen_sukses') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="https://themesdesign.in/symox-laravel/layouts/index.html">
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
                                        <div class="mb-3 mt-5">
                                            
                                            <p><b>File rapat dapat diakses <a href="/absensi/{{ $rapat['id'] }}/edit">disini</a></b><p><br />
                                            <table class="hover dataTabel stripe">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Jabatan</th>
                                                        <th>Divisi / Instansi</th>
                                                        <th>Pihak</th>
                                                        {{-- <th>Absensi</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($item as $i) 
                                                      <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $i->nama }}</td>
                                                        <td>{{ $i->jabatan }}</td>
                                                        <td>{{ $i->divisi_instansi }}</td>
                                                        <td>{{ $i->in_eks_pal }}</td>
                                                      </tr> @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        {{-- <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Login</button>
                                        </div> --}}
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
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js')}}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery_3.6.4_jquery.min.js')}}"></script>
        {{-- Datatable  --}}
        <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.css')}}" />
        <script src="{{ asset('assets/js/jquery.dataTables.js')}}"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('.dataTabel').DataTable();
            } );
        </script>
    </body>

<!-- Mirrored from themesdesign.in/symox-laravel/layouts/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jul 2022 07:12:00 GMT -->
</html>
