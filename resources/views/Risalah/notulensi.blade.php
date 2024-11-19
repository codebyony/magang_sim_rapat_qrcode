@extends('page-starter') 
@section('isi')
<div class="row">
    <div class="col-lg-12">
        <div class="justify-content-between d-flex align-items-center mt-4 mb-3">
            <h5 class="mb-0 pb-1 text-decoration-underline">Notulensi</h5>
        </div>
        <div class="card">
            <form action="/risalah" method="post" enctype="multipart/form-data"> @csrf 
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Notulensi Rapat</h4>
                
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <input type="hidden" value="{{ $rapat_id }}" name="rapat_id">
                        <label for="basicpill-firstname-input" class="form-label">File Notulensi</label>
                        <input type="file" class="form-control" id="basicpill-firstname-input" name="file">
                        @error('file')
                        <code>
                          {{ $message }}
                        </code>
                          @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="basicpill-firstname-input" class="form-label">Catatan</label>
                        <input type="text" class="form-control" id="basicpill-firstname-input" name="catatan">
                        @error('catatan')
                        <code>
                          {{ $message }}
                        </code>
                          @enderror
                    </div>
                </div>
                </div>
            </div> <!-- end card-body-->
            <div class="card-footer" style="display: flex; justify-content: space-between;">
                <a href="/rapat" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>
@endsection