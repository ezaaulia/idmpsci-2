@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Form Tambah Data Operator</h1>

            
            <hr class="mb-4"> {{-- garis panjang --}}
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            <form class="settings-form" method="POST" action="/kelolaoperator/tambahoperator">
                                @csrf
                                <div class="mb-3"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No. HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>

                                <div class="row justify-content-between">
								    <div class="col-auto">
								        <a type="submit" class="btn app-btn-secondary" href="#">Batal</a>
								    </div>
								    <div class="col-auto">
								        <a type="submit" class="btn app-btn-primary" href="/kelolaoperator/lihatoperator">Simpan</a>
								    </div>
							    </div>

                            </form>
                        </div><!--//app-card-body-->
                        
                    </div><!--//app-card-->
        </div>
    </div>
</div>

@endsection

