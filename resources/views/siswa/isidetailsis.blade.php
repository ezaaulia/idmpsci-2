@extends('layout.main')

@section('isi')


<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">	    
            <h1 class="app-page-title">Detail Siswa</h1>
            
            <hr class="mb-4"> {{-- garis panjang --}}
           
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header border-bottom-0">
                    <div class="row align-items-center gx-3">
                    </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body px-4 w-100"> 

            {{-- <div class="item border-bottom py-3"> --}}
            <div class="item border-bottom py-2">
                <div class="row justify-content-between align-items-center">
                      <div class="col-auto">
                          <div class="item-label"><strong>NIS</strong></div>
                          <div class="item-data">{{ $data->nis }}</div>
                      </div><!--//col-->
                </div><!--//row-->
            </div><!--//item-->

            <div class="item border-bottom py-2">
                <div class="row justify-content-between align-items-center">
                      <div class="col-auto">
                          <div class="item-label"><strong>Nama Siswa</strong></div>
                          <div class="item-data">{{$data->nama }}</div>
                      </div><!--//col-->
               </div><!--//row-->
            </div><!--//item-->

            <div class="item border-bottom py-2">
                <div class="row justify-content-between align-items-center">
                      <div class="col-auto">
                          <div class="item-label"><strong>Asal Sekolah</strong></div>
                          <div class="item-data">{{$data->asal }}</div>
                      </div><!--//col-->
                </div><!--//row-->
            </div><!--//item-->


                  <div class="item border-bottom py-2">
                      <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Nilai MTK</strong></div>
                                <div class="item-data">{{ $data->nilai_tes_mtk}}</div>
                            </div><!--//col-->
                      </div><!--//row-->
                  </div><!--//item-->

                  <div class="item border-bottom py-2">
                      <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Nilai IPA</strong></div>
                                <div class="item-data">{{ $data->nilai_tes_ipa}}</div>
                            </div><!--//col-->
                      </div><!--//row-->
                  </div><!--//item-->

                  <div class="item border-bottom py-2">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Nilai Agama</strong></div>
                            <div class="item-data">{{ $data->nilai_tes_agama}}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                  </div><!--//item-->

                  <div class="item border-bottom py-2">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Nilai B.I</strong></div>
                            <div class="item-data">{{ $data->nilai_tes_bindo}}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                  </div><!--//item-->

                  <div class="item border-bottom py-2">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Status Kelas</strong></div>
                            <div class="item-data">{{ $data->kelas}}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                  </div><!--//item-->

                  <div class="item border-bottom py-2">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Kelas Asli</strong></div>
                            <div class="item-data">{{ $data->hasil_mining}}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                  </div><!--//item-->

                  <div class="item border-bottom py-3">
                    <div class="row justify-content-center align-items-center">
                      <div class="justify-content-start">
                        <div class="col-auto">
                            <a type="submit" class="btn app-btn-secondary" href="{{ url('lihatsiswa') }}">Kembali</a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div><!--//app-card-body-->

             
          </div><!--//app-card-->
           
        </div>
    </div>
</div>



@endsection