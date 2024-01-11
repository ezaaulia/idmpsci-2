@extends('layout.main')

@section('isi')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
          <h1 class="app-page-title">Hasil Pengujian Data</h1>

            
          <hr class="mb-4"> {{-- garis panjang --}}

            <div class="row justify-content-end mb-3">
              <div class="col-auto">
                <a type="button" class="btn app-btn-primary" href="{{ url('download')}}">Unduh Data</a>
              </div>
            </div>
            <h2 class="mb-3 text-center">Daftar Data Tidak Akurat</h2>
            <div class="tab-content" id="orders-table-tab-content">
              <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    @if ($incorrectPredictions > 0)
                      <div class="app-card-body">
                        <div class="table-responsive-lg">
                          <table class="table table-bordered mb-0 text-left ">
                            <thead>
                              <tr>
                                <th class="cell">No.</th>
                                <th class="cell">NIS</th>
                                <th class="cell">Nama Siswa</th>
                                <th class="cell">Asal Sekolah</th>
                                <th class="cell">Nilai Tes MTK</th>
                                <th class="cell">Nilai Tes IPA</th>
                                <th class="cell">Nilai Tes Agama</th>
                                <th class="cell">Nilai Tes B.I</th>
                                <th class="cell">Status Kelas</th>
                                <th class="cell">Hasil Kelas</th>
                              </tr>
                            </thead>

                            <tbody>
                              @forelse($incorrectData as $data)
                                <tr>
                                    <td class="cell">{{ $loop->iteration }}.</td>
                                    <td class="cell">{{ $data->nis }}</td>
                                    <td class="cell">{{ $data->nama }}</td>
                                    <td class="cell">{{ $data->asal }}</td>
                                    <td class="cell">{{ $data->nilai_tes_mtk }}</td>
                                    <td class="cell">{{ $data->nilai_tes_ipa }}</td>
                                    <td class="cell">{{ $data->nilai_tes_agama }}</td>
                                    <td class="cell">{{ $data->nilai_tes_bindo }}</td>
                                    <td class="cell">{{ $data->kelas }}</td>
                                    <td class="cell">{{ $data->hasil_mining }}</td>
                                </tr>
                              @empty
                                <!-- Pesan ketika data kosong -->
                                <tr>
                                  <td colspan="3" class="text-center">
                                      <h2><strong>Data kosong atau tidak ada prediksi yang tidak tepat!!</strong></h2>
                                  </td>
                                </tr>
                              @endforelse
                            </tbody>
                          </table>
                        </div> <!--//table-responsive-->
                      </div> <!--//app-card-body-->
                    
                    @endif
                </div>
              </div>
            </div>

                  <!-- Menampilkan metrik kinerja -->
                  <div class="text-center">
                      <h1>Hasil Uji Prediksi <span class="badge bg-secondary"></span></h1>
                      <div class="alert alert-warning" role="alert">
                        Total Jumlah Prediksi : {{ $totalCount }}
                      </div>
                  </div>

                  <div class="text-center">
                    <div class="alert alert-success" role="alert">
                     Jumlah Tepat : {{ $correctPredictions }}
                    </div>
                  </div>

                  <div class="text-center">
                    <div class="alert alert-secondary" role="alert">
                      Jumlah Tidak Tepat : {{ $incorrectPredictions }}
                    </div>
                  </div>

                  <div class="text-center">
                    <div class="alert alert-info" role="alert">
                      Nilai Akurasi : {{  $accuracy . "%"}}
                    </div>
                  </div>

                  <div class="text-center">
                    <div class="alert alert-danger" role="alert">
                      Tidak Akurat : {{  $errorRate . "%"}}
                    </div>
                  </div>
        </div>
    </div>
</div>
@endsection