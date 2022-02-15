@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Edit Profil</h1>
            <picture>
                <source srcset="assets/images/users/user-9.jpg" type="image/svg+xml">
                <img src="assets/images/users/user-9.jpg" class="img-fluid img-thumbnail" alt="...">
            </picture>
            
            <hr class="mb-4"> {{-- garis panjang --}}
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            <form class="settings-form">
                                <div class="mb-3"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="setting-input-1" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="setting-input-1">
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-2" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="setting-input-2">
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-3" class="form-label">No. HP</label>
                                    <input type="text" class="form-control" id="setting-input-3">
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="setting-input-4">
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