@extends('layout.main')

@section('isi')


<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Form Tambah Data Siswa</h1>

            
            <hr class="mb-4"> {{-- garis panjang --}}
                    <div class="app-card app-card-settings shadow-sm p-3">
                        <div class="app-card-body">
                            <form class="settings-form" enctype="multipart/form-data" method="post" action="{{ url('tambahsiswa/save') }}"> {{-- {{ URL::to('save') }} --}}
                                @csrf
                                {{-- <h3 class="mb-3"><strong>Data Siswa</strong></h3> --}}
                                <h2 class="mb-4">Data Siswa</h2>
                                
                                <div class="mb-3 row"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nis" class="col-sm-2 form-label">NIS</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis') }}" >
                                    </div>
                                    @error('nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div> 

                                <div class="mb-3 row"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nama" class="col-sm-2 form-label">Nama Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" >
                                    </div>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                           {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-4 row">
                                    <label for="asal" class="col-sm-2 form-label">Asal Sekolah</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('asal') is-invalid @enderror" id="asal" name="asal" value="{{ old('asal') }}" >
                                    </div>
                                    @error('asal')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <h2 class="mb-4">Nilai Siswa</h2>

                                <div class="mb-3 row"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nilai_tes_mtk" class="col-sm-2 form-label">Nilai MTK</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nilai_tes_mtk') is-invalid @enderror" id="mtk" name="nilai_tes_mtk" value="{{ old('nilai_tes_mtk') }}" >
                                    </div>
                                    @error('nilai_tes_mtk')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label for="nilai_tes_ipa" class="col-sm-2 form-label">Nilai IPA</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nilai_tes_ipa') is-invalid @enderror" id="ipa" name="nilai_tes_ipa" value="{{ old('nilai_tes_ipa')  }}" >
                                    </div>
                                    @error('nilai_tes_ipa')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label for="nilai_tes_agama" class="col-sm-2 form-label">Nilai Agama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nilai_tes_agama') is-invalid @enderror" id="agama" name="nilai_tes_agama" value="{{ old('nilai_tes_agama') }}" >
                                    </div>
                                    @error('nilai_tes_agama')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label for="nilai_tes_bindo" class="col-sm-2 form-label">Nilai B.I</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nilai_tes_bindo') is-invalid @enderror" id="bindo" name="nilai_tes_bindo" value="{{ old('nilai_tes_bindo') }}" >
                                    </div>
                                    @error('nilai_tes_bindo')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Ket Kelas</legend>
                                        <div class="col-sm-9 @error('jenis_kelamin') is-invalid @enderror">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_kelas" id="reg" value="reguler">
                                                <label class="form-check-label" for="reg">
                                                    Reguler
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_kelas" id="ci" value="ci">
                                                <label class="form-check-label" for="ci">
                                                    Class International
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>


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
