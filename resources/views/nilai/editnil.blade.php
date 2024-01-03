@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Form Edit Nilai</h1>

            
            <hr class="mb-4"> {{-- garis panjang --}}
                    <div class="app-card app-card-settings shadow-sm p-3">
                        <div class="app-card-body">
                            <form class="settings-form" enctype="multipart/form-data" method="post" action="{{ url('lihatnilai/update/'.$nilai->id)}}">
                                @csrf
                                @method('put')

                                <div class="mb-1"> {{-- jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nama" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $nilai->nama }}" readonly>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                           {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                 <div class="mb-1"> {{--jarak antara form 1 dan tulisan contact name --}}
                                    <label for="nilai_tes_mtk" class="form-label">Nilai MTK</label>
                                    <input type="text" class="form-control @error('nilai_tes_mtk') is-invalid @enderror" id="mtk" name="nilai_tes_mtk" value="{{ $nilai->nilai_tes_mtk }}" >
                                    @error('nilai_tes_mtk')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="nilai_tes_ipa" class="form-label">Nilai IPA</label>
                                    <input type="text" class="form-control @error('nilai_tes_ipa') is-invalid @enderror" id="ipa" name="nilai_tes_ipa" value="{{ $nilai->nilai_tes_ipa }}" >
                                    @error('nilai_tes_ipa')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="nilai_tes_agama" class="form-label">Nilai Agama</label>
                                    <input type="text" class="form-control @error('nilai_tes_agama') is-invalid @enderror" id="agama" name="nilai_tes_agama" value="{{ $nilai->nilai_tes_agama }}" >
                                    @error('nilai_tes_agama')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="nilai_tes_bindo" class="form-label">Nilai B.I</label>
                                    <input type="text" class="form-control @error('nilai_tes_bindo') is-invalid @enderror" id="bindo" name="nilai_tes_bindo" value="{{ $nilai->nilai_tes_bindo }}" >
                                    @error('nilai_tes_bindo')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Ket Kelas</label>
                                    <div class="col-auto">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_kelas" id="reg" value="reguler">
                                            <label class="form-check-label" for="reg">Reguler</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_kelas" id="ci" value="ci">
                                            <label class="form-check-label" for="ci">CI</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-between">
								    <div class="col-auto">
								        <a type="submit" class="btn app-btn-secondary"  href="{{ url('lihatnilai') }}">Batal</a>
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

