@extends('layout.main')

@section('isi')


<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Form Tambah Nilai Siswa</h1>

            
            <hr class="mb-4"> {{-- garis panjang --}}
                    <div class="app-card app-card-settings shadow-sm p-3">
                        <div class="app-card-body">
                            <form class="settings-form" method="post" action="{{ URL::to('save') }}">
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

                                <div class="mb-1">
                                    <label for="nilai_tes_mtk" class="form-label">Nilai tes MTK</label>
                                    <input type="text" class="form-control @error('nilai_tes_mtk') is-invalid @enderror" id="mtk" name="nilai_tes_mtk" value="{{ old('nilai_tes_mtk') }}" >
                                    @error('nilai_tes_mtk')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="nilai_tes_ipa" class="form-label">Nilai Tes IPA</label>
                                    <input type="text" class="form-control @error('nilai_tes_ipa') is-invalid @enderror" id="ipa" name="nilai_tes_ipa" value="{{ old('nilai_tes_ipa') }}" >
                                    @error('nilai_tes_ipa')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="nilai_tes_agama" class="form-label">Nilai Tes Agama</label>
                                    <input type="text" class="form-control @error('nilai_tes_agama') is-invalid @enderror" id="agama" name="nilai_tes_agama" value="{{ old('nilai_tes_agama') }}" >
                                    @error('nilai_tes_agama')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="nilai_tes_bindo" class="form-label">Nilai Tes B.I</label>
                                    <input type="text" class="form-control @error('nilai_tes_bindo') is-invalid @enderror" id="bindo" name="nilai_tes_bindo" value="{{ old('nilai_tes_bindo') }}" >
                                    @error('nilai_tes_bindo')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Ket Kelas</label>
                                    <div class="col-auto">
                                        <select class="form-select" name="status_kelas" orto-label="Default select example">
                                            <option selected>Pilih kelas</option>
                                            <option value="reguler" selected>Reguler</option>
                                            <option value="ci" selected>CI</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row justify-content-between">
								    <div class="col-auto">
								        <button type="submit" class="btn app-btn-secondary">Batal</button>
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
