@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Hasil Mining</h1>
            
            <hr class="mb-4"> {{-- garis panjang --}}

            
            <div class="tab-content" id="orders-table-tab-content">
              
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                  <div class="app-card app-card-orders-table shadow-sm mb-5">
                    
                    <div class="app-card-body">
                      <div class="table-responsive-lg">
                        <table class="table table-bordered mb-0 text-left ">
                          <thead>

                            {{-- <pre>
                                {{ print_r($arrayTree) }}
                            </pre> --}}

                            {{-- <h2>Decision Tree as String</h2>
                            <pre>
                                {{ $stringTree }}
                            </pre> --}}

                            {{-- <script>
                              // Kodingan JavaScript untuk menggambar decision tree menggunakan D3.js
                              // Sesuaikan dengan struktur dan data decision tree Anda
                              const decisionTreeData = @json($arrayTree);
                              // ... (kodingan D3.js)
                           </script> --}}
                           
                            <tr>
                              <th class="cell">No.</th>
                              <th class="cell">Nama Siswa</th>
                              <th class="cell">Nilai MTK</th>
                              <th class="cell">Nilai IPA</th>
                              <th class="cell">Nilai Agama</th>
                              <th class="cell">Nilai B.I</th>
                              <th class="cell">Status Kelas</th>
                              <th class="cell">Kelas Akhir</th>
                            </tr>
                          </thead>

                          <tbody>
                            @forelse ($status as $datas)    
                              <tr>
                                  <td class="cell">{{ $loop->iteration }}.</td>
                                  <td class="cell">{{ $datas->nama }}</td>
                                  <td class="cell">{{ $datas->nilai_tes_mtk }}</td>
                                  <td class="cell">{{ $datas->nilai_tes_ipa }}</td>
                                  <td class="cell">{{ $datas->nilai_tes_agama }}</td>
                                  <td class="cell">{{ $datas->nilai_tes_bindo }}</td>
                                  <td class="cell">{{ $datas->status_kelas }}</td>
                                  <td class="cell">{{ $datas->hasil_mining }}</td>
                              </tr>
                            @empty
                                <!-- Pesan ketika data kosong -->
                                <tr>
                                  <td colspan="6" class="text-center">
                                      <h2><strong>Data kosong!!</strong></h2>
                                  </td>
                                </tr>
                            @endforelse
                          </tbody>
                        </table>
                        
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