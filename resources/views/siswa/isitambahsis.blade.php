@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Form Tambah Data Siswa</h1>

            <picture>
                <source srcset="assets/images/users/user-9.jpg" type="image/svg+xml">
                <img src="assets/images/users/user-9.jpg" class="img-fluid img-thumbnail" alt="...">
            </picture>
            
            <hr class="mb-4"> {{-- garis panjang --}}
                    <div class="app-card app-card-settings shadow-sm p-3">
                        <div class="app-card-body">
                            <form class="settings-form" method="POST" action="/kelolaoperator/tambahoperator">
                                @csrf
                                <div class="mb-1"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nama" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="mb-1"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" class="form-control" id="nis" name="nis">
                                </div>
                                <div class="mb-1"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="asalsekolah" class="form-label">Asal Sekolah</label>
                                    <input type="text" class="form-control" id="asalsekolah" name="asalsekolah">
                                </div>
                                <div class="mb-1">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                </div>
                                <div class="mb-1">
                                    <label for="mtk" class="form-label">Nilai tes MTK</label>
                                    <input type="text" class="form-control" id="mtk" name="mtk">
                                </div>
                                <div class="mb-1">
                                    <label for="ipa" class="form-label">Nlai Tes IPA</label>
                                    <input type="text" class="form-control" id="ipa" name="ipa">
                                </div>
                                <div class="mb-1">
                                    <label for="bi" class="form-label">Nilai Tes B.I</label>
                                    <input type="text" class="form-control" id="bi" name="bi">
                                </div>
                                <div class="mb-1">
                                    <label for="agama" class="form-label">Nilai Tes Agama</label>
                                    <input type="email" class="form-control" id="agama" name="agama">
                                </div>
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Ket Kelas</label>
                                    <select class="form-select" name="kelas_id" >
                                        <option value="1">Reguler</option>
                                        <option value="2">CI</option>
                                    </select>
                                </div>

                                <div class="row justify-content-between">
								    <div class="col-auto">
								        <a type="submit" class="btn app-btn-secondary" href="#">Batal</a>
								    </div>
								    <div class="col-auto">
								        <a type="submit" class="btn app-btn-primary" href="#">Simpan</a>
								    </div>
							    </div>

                            </form>
                        </div><!--//app-card-body-->
                        
                    </div><!--//app-card-->
        </div>
    </div>
</div>

@endsection

