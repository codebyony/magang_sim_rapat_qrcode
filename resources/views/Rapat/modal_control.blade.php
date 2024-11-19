<script type="text/javascript">
    $(document).ready(function() {
    $('input[type="checkbox"]').on('change', function() {
        var checkedValues = [];
        var i;
        $('input[type="checkbox"]:checked').each(function() {
            checkedValues.push($(this).val());
            $("#anggota").val(checkedValues);
        });
		// $("#anggota").val(checkedValues.slice(0,-1));
        // console.log($('#anggota').val());
    });
});
</script>
{{-- <script type="text/javascript">
    // Memanggil server menggunakan AJAX
    function getDataKaryawan() {
        $.ajax({
            url: '/get_karyawan', // Endpoint yang telah Anda buat di Laravel
            method: 'GET',
            success: function(response) {
                // Variabel response berisi data yang diambil dari server (JSON)
                // Ubah response menjadi format data yang diharapkan oleh GridJS
                const data = response.map(item => [item.NIP, item.nama, item.email, item.jabatan, item.divisi, item.departemen]);

                // Gunakan data untuk menginisialisasi tabel GridJS
                new gridjs.Grid({
                    columns: ['NIP', 'Nama', 'Email', 'Jabatan', 'Divisi','Departemen','Aksi'],
                    data: data,
                    sort: !0,
	                search: !0,
                    pagination: {
                        limit: 5
                    },
                }).render(document.getElementById('table-karyawan'));
            },
            error: function(err) {
                console.error('Error fetching data:', err);
            }
        });
    }
    $(document).ready(function() {
        const judul=[];
        const file=[];
        const deskripsi=[];

        // Fungsi untuk menambahkan data materi ke dalam array
        // function tambahMateriRapat() {
        //     const judulInputs = document.getElementsByName('judul_materi[]');
        //     const fileInputs = document.getElementsByName('file_materi[]');
        //     const deskripsiInputs = document.getElementsByName('deskripsi_materi[]');
            
        //     judul.push(judulInputs[0].value);
        //     judulInputs.value = judul;

        //     file.push(fileInputs[0].value);
        //     fileInputs.value = judul;

        //     deskripsi.push(deskripsiInputs[0].value);
        //     deskripsiInputs.value = judul;

        //     // for (let i = 0; i < judulInputs.length; i++) {
        //     //     judul.push(judulInputs[i].value);
        //     //     judulInputs.value = judul;
        //     //     console.log(judulInputs[i].value);
        //     // }
        // }

        function loadMateriRapat(inputJudul){
            if(judul.length != 0){
                $('#fileList').append('<div class="alert alert-info alert-dismissible fade show" role="alert"><b>'+inputJudul+'</b></div>');
                // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            }
        }

        function tambahMateriRapat(){
            // var inputFiles = document.querySelector('input[type=file]').files;
            var inputFile = document.querySelector('input[name=file_materi]').files;
            var inputJudul = document.querySelector('input[name=judul_materi]').value;
            var inputDeskripsi = document.querySelector('textarea[name=deskripsi_materi]').value;

            // Menghapus pesan peringatan sebelum memeriksa validasi
            // document.getElementById('fileWarning').innerHTML = '';
            // document.getElementById('judulWarning').innerHTML = '';
            // document.getElementById('deskripsiWarning').innerHTML = '';

            // if (inputFile.length === 0) {
            //     document.getElementById('fileWarning').innerHTML = 'Silakan pilih file materi.';
            //     return; // Berhenti jika input file kosong
            // }

            // if (inputJudul.trim() === "") {
            //     document.getElementById('judulWarning').innerHTML = 'Judul materi tidak boleh kosong.';
            //     return; // Berhenti jika input judul kosong
            // }

            // if (inputDeskripsi.trim() === "") {
            //     document.getElementById('deskripsiWarning').innerHTML = 'Deskripsi materi tidak boleh kosong.';
            //     return; // Berhenti jika input deskripsi kosong
            // }
            
            file.push(inputFile);
            judul.push(inputJudul);
            deskripsi.push(inputDeskripsi);
            loadMateriRapat(inputJudul);
        }

        // Control Materi
        document.getElementById('tambahMateri').addEventListener('click', function() {
            const formMateriRapat = document.getElementById('formMateriRapat');
                if (formMateriRapat.style.display === "none") {
                    document.getElementById('tambahMateri').setAttribute('class','btn btn-primary waves-effect waves-light tambahMateri');
                    document.getElementById('tambahMateri').innerHTML = 'Save';
                    formMateriRapat.style.display = "block";
                } 
                // else {
                //     formMateriRapat.style.display = "none";
                //     tambahMateriRapat();
                //     document.getElementById('tambahMateri').setAttribute('class','btn btn-primary waves-effect waves-light');
                //     document.getElementById('tambahMateri').innerHTML = 'Tambah Materi Baru';
                //     document.getElementById('tambahMateri').style.display = 'none';
                    
                    
                // }
        });

        // Control Undangan
        const checkbox = document.getElementById('customSwitch1');
        const jadwal = document.getElementById('jadwal');
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                jadwal.style.display = 'none';
            } else {
                jadwal.style.display = 'block';
            }
        });

    //     if ($('#DivID').length){
    //     alert('Found with Length');
    // }
    
    }); --}}
</script>
