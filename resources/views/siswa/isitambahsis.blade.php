@extends('layout.main')

@section('isi')


<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Form Tambah Data Siswa</h1>

            
            <hr class="mb-4"> {{-- garis panjang --}}
                    <div class="app-card app-card-settings shadow-sm p-3">
                        <div class="app-card-body">
                            <form class="settings-form" enctype="multipart/form-data" method="post" action="{{ URL('tambahsiswa/save') }}"> {{-- {{ URL::to('save') }} --}}
                                @csrf
                                <div class="mb-1"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis') }}" >
                                    @error('nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div> 

                                <div class="mb-1"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nama" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" >
                                    @error('nama')
                                        <div class="invalid-feedback">
                                           {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="asal" class="form-label">Asal Sekolah</label>
                                    <input type="text" class="form-control @error('asal') is-invalid @enderror" id="asal" name="asal" value="{{ old('asal') }}" >
                                    @error('asal')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="row justify-content-between">
								    <div class="col-auto">
								        <a type="submit" class="btn app-btn-secondary" href="{{ url('lihatsiswa') }}">
                                             Batal
                                        </a>
								    </div>
								    <div class="col-auto">
								        <button type="submit" class="btn app-btn-primary">Simpan</button>
								    </div>
							    </div>

                            </form>
                        </div><!--//app-card-body-->
                        
                    </div><!--//app-card-->
        </div>
    </div>
</div>

@endsection
