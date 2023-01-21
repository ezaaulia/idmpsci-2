@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Mining Data</h1>

            
            <hr class="mb-4"> {{-- garis panjang --}}
            
            <div class="tab-content" id="orders-table-tab-content">
              
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                  <div class="app-card app-card-orders-table shadow-sm mb-5">
                    
                    <div class="app-card-body">
                      <div class="table-responsive-lg">
                        <table class="table table-bordered mb-0 text-left ">
                          <thead>
                            <tr>
                              <th class="cell">No.</th>
                              <th class="cell">Nama Siswa</th>
                              <th class="cell">Nilai Tes MTK</th>
                              <th class="cell">Nilai Tes IPA</th>
                              <th class="cell">Nilai Tes Agama</th>
                              <th class="cell">Nilai Tes B.I</th>
                              <th class="cell">Status Kelas</th>
                              <th>Hasil C4.5</th>
                              
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($data as $datas)
                              <tr>
                                  <td class="cell">{{ $loop->iteration }}.</td>
                                  <td class="cell">{{ $datas->nama }}</td>
                                  <td class="cell">{{ $datas->nilai_tes_mtk }}</td>
                                  <td class="cell">{{ $datas->nilai_tes_ipa }}</td>
                                  <td class="cell">{{ $datas->nilai_tes_agama }}</td>
                                  <td class="cell">{{ $datas->nilai_tes_bindo }}</td>
                                  <td class="cell">{{ $datas->status_kelas }}</td>
                                  <td>{{ $c45->classify($student) }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>

                        <p>Jumlah data sebelum proses: {{$before}}</p>
                        <p>Jumlah data sesuai setelah proses: {{$after}}</p>
                        <p>Akurasi: {{$accuracy}}%</p>

                      </div> <!--//table-responsive-->
                    </div> <!--//app-card-body-->
                  </div>
                </div>
            </div>
             
            
              
            </div>
        </div>
    </div>
</div>
@endsection