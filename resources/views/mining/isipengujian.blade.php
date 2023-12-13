@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Pengujian Perhitungan Data</h1>

            
            <hr class="mb-4"> {{-- garis panjang --}}
            
            <div class="col-auto mb-3 d-grid gap-2 d-md-flex justify-content-md-end ">
              <a type="button" class="btn app-btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Data</a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Data Uji</h5>
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

            <div class="tab-content" id="orders-table-tab-content">
              
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                  <div class="app-card app-card-orders-table shadow-sm mb-5">
                    
                    <div class="app-card-body">
                      <div class="table-responsive-lg">
                        <table class="table table-bordered mb-0 text-left ">
                          <thead>
                            <tr>
                              <th class="cell">No.</th>
                              {{-- <th class="cell">NIS</th>
                              <th class="cell col-2">Nama Siswa</th>
                              <th class="cell">Asal Sekolah</th> --}}
                              <th class="cell">Nilai Tes MTK</th>
                              <th class="cell">Nilai Tes IPA</th>
                              <th class="cell">Nilai Tes Agama</th>
                              <th class="cell">Nilai Tes B.I</th>
                              <th class="cell">Status Kelas</th>
                              {{-- <th class="cell">Kelas Akhir</th> --}}
                              <th class="cell">Ketepatan</th>
                            </tr>
                          </thead>

                          <tbody>
                            @forelse($tes as $data)
                              <tr>
                                  <td class="cell">{{ $loop->iteration }}.</td>
                                  {{-- <td class="cell">{{ $data->nis }}</td>
                                  <td class="cell">{{ $data->nama }}</td>
                                  <td class="cell">{{ $data->asal }}</td> --}}
                                  <td class="cell">{{ $data->nilai_tes_mtk }}</td>
                                  <td class="cell">{{ $data->nilai_tes_ipa }}</td>
                                  <td class="cell">{{ $data->nilai_tes_agama }}</td>
                                  <td class="cell">{{ $data->nilai_tes_bindo }}</td>
                                  {{-- <td class="cell">{{ $data->status_kelas }}</td> --}}
                                  <td class="cell">{{ $data->hasil_mining }}</td>
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
@endsection