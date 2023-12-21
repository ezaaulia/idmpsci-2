@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Pengujian Perhitungan Data</h1>

            
            <hr class="mb-4"> {{-- garis panjang --}}
            
            {{-- <div class="row justify-content-end mb-3">
              <div class="col-auto">
                <a type="submit" class="btn app-btn-primary" href="{{ url('hasilmining')}}">Hasil Mining</a> --}}
                {{-- <a type="button" class="btn btn-info" href="{{ url('downloadpdf')}}">Unduh Data</a> --}}
              {{-- </div>
            </div> --}}

            <div class="tab-content" id="orders-table-tab-content">
              
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                  <div class="app-card app-card-orders-table shadow-sm mb-5">
                    
                    <div class="app-card-body">
                      <div class="table-responsive-lg">
                        <table class="table table-bordered mb-0 text-left ">
                          <thead>
                            <tr>
                              <th class="cell">No.</th>
                              <th class="cell">NIS</th>
                              <th class="cell col-2">Nama Siswa</th>
                              <th class="cell">Asal Sekolah</th>
                              <th class="cell">Nilai Tes MTK</th>
                              <th class="cell">Nilai Tes IPA</th>
                              <th class="cell">Nilai Tes Agama</th>
                              <th class="cell">Nilai Tes B.I</th>
                              <th class="cell">Status Kelas</th>
                              <th class="cell">Kelas Akhir</th>
                              <th class="cell">Ketepatan</th>
                            </tr>
                          </thead>

                          <tbody>
                            @forelse($tes as $data)
                              <tr>
                                  <td class="cell">{{ $loop->iteration }}.</td>
                                  <td class="cell">{{ $data->nis }}</td>
                                  <td class="cell">{{ $data->nama }}</td>
                                  <td class="cell">{{ $data->asal }}</td>
                                  <td class="cell">{{ $data->nilai_tes_mtk }}</td>
                                  <td class="cell">{{ $data->nilai_tes_ipa }}</td>
                                  <td class="cell">{{ $data->nilai_tes_agama }}</td>
                                  <td class="cell">{{ $data->nilai_tes_bindo }}</td>
                                  <td class="cell">{{ $data->status_kelas }}</td>
                                  <td class="cell">{{ $data->hasil_mining }}</td>
                              </tr>
                            @empty
                              <!-- Pesan ketika data kosong -->
                              <tr>
                                <td colspan="11" class="text-center">
                                    <h2><strong>Data kosong!!</strong></h2>
                                </td>
                              </tr>
                            @endforelse
                          </tbody>

                        
                        </table>

{{--                         
                        <h1>Confusion Matrix</h1>
                        <table class="table">
                          <thead>
                            <tr>
                                <th></th>
                                <th>Actual Positive</th>
                                <th>Actual Negative</th>
                            </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <th>Predicted Positive</th>
                                  <td>{{ $truePositive }}</td>
                                  <td>{{ $falsePositive }}</td>
                              </tr>
                              <tr>
                                  <th>Predicted Negative</th>
                                  <td>{{ $falseNegative }}</td>
                                  <td>{{ $trueNegative }}</td>
                              </tr>
                          </tbody>
                        </table> --}}


                      </div> <!--//table-responsive-->
                    </div> <!--//app-card-body-->
                  </div>

                  <div class="text-center">
                      <h1>Hasil Uji Prediksi <span class="badge bg-secondary"></span></h1>
                      <div class="alert alert-info" role="alert">
                        Total Jumlah Prediksi : 
                      </div>
                  </div>

                  <div class="text-center">
                    <div class="alert alert-success" role="alert">
                     Jumlah Tepat :
                    </div>
                  </div>

                <div class="text-center">
                  <div class="alert alert-danger" role="alert">
                    Jumlah Tidak Tepat :
                  </div>
                </div>

                <div class="text-center">
                  <div class="alert alert-secondary" role="alert">
                    Nilai Akurasi : {{ $accuracy . "%"}}
                  </div>
                </div>

                <div class="text-center">
                  <div class="alert alert-secondary" role="alert">
                    Nilai Precision : {{ $precision }}
                  </div>
                </div>

                <div class="text-center">
                  <div class="alert alert-secondary" role="alert">
                    Nilai recall : {{ $recall }}
                  </div>
                </div>

                <div class="text-center">
                  <div class="alert alert-secondary" role="alert">
                    Nilai Specificity : {{ $specificity }}
                  </div>
                </div>

                <div class="text-center">
                  <div class="alert alert-secondary" role="alert">
                    Nilai F1Score : {{ $f1Score }}
                  </div>
                </div>

                </div>
            </div>


        </div>
    </div>
</div>
@endsection