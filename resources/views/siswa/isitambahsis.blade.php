@extends('layout.main')

@section('isi')


<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Form Tambah Data Siswa</h1>

            
            <hr class="mb-4"> {{-- garis panjang --}}

                    <div class="col-auto mb-3 d-grid gap-2 d-md-flex justify-content-md-end ">
                        <a type="button" class="btn app-btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Data</a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload Data Latih</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form action="{{ url('upload')}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <input type="file" name="import_file" >
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn app-btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            
                    <div class="app-card app-card-settings shadow-sm p-3">
                        <div class="app-card-body">
                            <form class="settings-form" enctype="multipart/form-data" method="POST" action="{{ url('/tambahsiswa/save') }}"> {{-- {{ URL::to('save') }} --}}
                                @csrf

                                <h2 class="mb-3">Data Siswa</h2>
                                
                                <div class="mb-3 row"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nis" class="col-sm-2 form-label">NIS</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis') }}" autofocus>
                                        @error('nis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div> 

                                <div class="mb-3 row"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nama" class="col-sm-2 form-label">Nama Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" >
                                        @error('nama')
                                            <div class="invalid-feedback">
                                               {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="asal" class="col-sm-2 form-label">Asal Sekolah</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('asal') is-invalid @enderror" id="asal" name="asal" value="{{ old('asal') }}" >
                                        @error('asal')
                                            <div class="invalid-feedback">
                                                    {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <h2 class="mb-4">Nilai Siswa</h2>

                                <div class="mb-3 row"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nilai_tes_mtk" class="col-sm-2 form-label">Nilai MTK</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nilai_tes_mtk') is-invalid @enderror" id="mtk" name="nilai_tes_mtk" value="{{ old('nilai_tes_mtk') }}" >
                                        @error('nilai_tes_mtk')
                                            <div class="invalid-feedback">
                                                    {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nilai_tes_ipa" class="col-sm-2 form-label">Nilai IPA</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nilai_tes_ipa') is-invalid @enderror" id="ipa" name="nilai_tes_ipa" value="{{ old('nilai_tes_ipa')  }}" >
                                        @error('nilai_tes_ipa')
                                            <div class="invalid-feedback">
                                                    {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nilai_tes_agama" class="col-sm-2 form-label">Nilai Agama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nilai_tes_agama') is-invalid @enderror" id="agama" name="nilai_tes_agama" value="{{ old('nilai_tes_agama') }}" >
                                        @error('nilai_tes_agama')
                                            <div class="invalid-feedback">
                                                    {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nilai_tes_bindo" class="col-sm-2 form-label">Nilai B.I</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nilai_tes_bindo') is-invalid @enderror" id="bindo" name="nilai_tes_bindo" value="{{ old('nilai_tes_bindo') }}" >
                                        @error('nilai_tes_bindo')
                                            <div class="invalid-feedback">
                                                    {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <fieldset class="form-group">
                                    <div class="mb-3 row">
                                        <legend class="col-sm-2 col-form-label fw-bold ">Ket Kelas</legend>
                                        <div class="col-sm-9 @error('status_kelas') is-invalid @enderror">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_kelas" id="reguler" value="reguler">
                                                <label class="form-check-label" for="reguler">
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
