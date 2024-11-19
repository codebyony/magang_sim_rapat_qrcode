@extends('page-starter') 
@section('isi')
<div class="row">
    <div class="col-lg-12">
        <div class="justify-content-between d-flex align-items-center mt-4 mb-3">
            <h5 class="mb-0 pb-1 text-decoration-underline">Notulensi</h5>
        </div>
        <div class="card">
            <form id="notes-form">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Notulensi Rapat</h4>
                <button type="submit" class="btn btn-primary">Simpan</button>
                
            </div>
            <div class="card-body">
                    <input name="notulensi" type="hidden"/>
                <div id="snow-editor" style="height: 300px;">
                    <h3><span class="ql-size-large">Ini adalah contoh notulensi</span></h3>
                    <p><br></p>
                    <h3>Anda bisa mencatat hasil-hasil rapat disini</h3>
                    <p><br></p>
                    <ul>
                        <li>
                            Select a text to reveal the toolbar.
                        </li>
                        <li>
                            Edit rich document on-the-fly, so elastic!
                        </li>
                    </ul>
                    <p><br></p>
                    <p>
                        End of simple area
                    </p>

                </div> <!-- end Snow-editor-->
            </div> <!-- end card-body-->
        </form>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>
<script type="text/javascript">
    var form = document.querySelector('#notes-form');
                    form.onsubmit = function() {
                      // Populate hidden form on submit
                      var comment = document.querySelector('input[name=notulensi]');
                     
                      //comment.value = JSON.stringify(quill.getContents());
                      comment.value = document.getElementById('snow-editor').innerHTML;
                      console.log(comment.value);
                      alert('a');
                     
                      // console.log("Submitted", $(form).serialize(), $(form).serializeArray());
                      
                      // No back end to actually submit to!
                      // alert('Open the console to see the submit data!')
                      // return false;
                      
                    };
</script>
@endsection