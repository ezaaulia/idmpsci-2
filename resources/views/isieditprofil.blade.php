@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Edit Profil</h1>
            
            <hr class="mb-4"> {{-- garis panjang --}}
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            <form class="settings-form" enctype="multipart/form-data" method="post" action="{{ url('editprofil/update/'.$userp->id)}}">
                                @csrf
                                @method('patch')
                                {{-- <input type="hidden" name="_method" value="PATCH"> --}}
                                 
                                <div class="mb-3"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $userp->nama }}">
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $userp->email }}" readonly>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $userp->username }}">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $userp->alamat }}">
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No. HP</label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ $userp->no_hp }}">
                                    @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                

                                <div class="row justify-content-between">
								    <div class="col-auto">
								        <a type="submit" class="btn app-btn-secondary" href="{{ url('lihatprofil') }}">Batal</a>
								    </div>
								    <div class="col-auto">
								        <button type="submit" class="btn app-btn-primary" >Simpan</button>
								    </div>
							    </div>

                            </form>
                        </div><!--//app-card-body-->
                        
                    </div><!--//app-card-->
        </div>
    </div>
</div>

@endsection