@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Import Data Siswa</h1>

            
            
            <hr class="mb-4"> {{-- garis panjang --}}

            @if (session('pesan'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session ('pesan') }}
              <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Pesan"></button>
              </div>
            @endif

            <div class=" g-4 mb-4">
                  <div class="app-card  h-100 shadow-sm">
                    <div class="app-card-header p-3">
                      <div class="row justify-content-between align-items-center">
                        
                          <div class="row justify-content-center align-items-center"> {{-- ini untuk ngatur posisi button atas bawah --}}
                               <div class="row justify-content-start"> {{--geser button kanan kiri --}}
                                <div class="col-">
                                  <button type="button" class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                      Upload File
                                  </button>
                                  <form action="{{ url('import-data/hapus-data') }}"  class="d-inline">
                                    {{-- @method('delete') --}}
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm ('Anda yakin ingin menghapus data?')"> 
                                      Hapus File
                                    </button>
                                  </form>
                                  {{-- <a type="button" class="btn btn-danger" href="{{ url('import-data/hapus-data') }}">
                                    Hapus File
                                  </a> --}}
                                </div>
                              </div>
                          </div>

                      </div>
                      <!--//row-->
                    </div>
                    <!--//app-card-header-->
                  </div>
                  <!--//app-card-->
            </div>
            <!--//row-->


  
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form action="{{ url('import-data')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="modal-body">
                                    <div class="form-group">
                                        <input type="file" name="file" >
                                    </div>
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn app-btn-primary">Import Data</button>
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
                              <th class="cell">NIS</th>
                              <th class="cell col-2">Nama Siswa</th>
                              <th class="cell">Asal Sekolah</th>
                              <th class="cell">Nilai Tes MTK</th>
                              <th class="cell">Nilai Tes IPA</th>
                              <th class="cell">Nilai Tes Agama</th>
                              <th class="cell">Nilai Tes B.I</th>
                              <th class="cell">Status Kelas</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($datas as $data)
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
                              </tr>
                            @endforeach
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

