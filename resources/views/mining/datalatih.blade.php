@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Upload Data Latih</h1>
            
            <hr class="mb-4"> {{-- garis panjang --}}

            <div class="card text-center" style="margin-bottom: 20px;">
              <div class="card-body">
                <p class="card-text">Silahkan download template dibawah ini untuk menginputkan data latih sesuai ketentuan</p>
                <a href="{{ route('downloadtemplate')}}" class="btn app-btn-primary">Download Template Latih</a>
              </div>
            </div>

            
            <div class="col-auto mb-3 d-grid gap-2 d-md-flex justify-content-md-end ">
              <a type="button" class="btn app-btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Data Latih</a>
            </div>


            <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Data Latih</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <form action="{{ url()->route('import_latih')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" id="file" >
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



            <div class="tab-content " id="orders-table-tab-content">
              
              <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm">
                  
                  <div class="app-card-body ">
                    <div class="table-responsive-lg">
                      <table class="table table-bordered mb-0 text-left ">


                        <thead>
                          <tr>
                            <th class="cell">No.</th>
                            <th class="cell">Nilai Tes MTK</th>
                            <th class="cell">Nilai Tes IPA</th>
                            <th class="cell">Nilai Tes Agama</th>
                            <th class="cell">Nilai Tes B.I</th>
                            <th class="cell">Hasil Kelas</th>
                          </tr>
                        </thead>

                        <tbody>
                          @forelse($latih as $data)
                            <tr>
                                <td class="cell">{{ $loop->iteration }}.</td>
                                <td class="cell">{{ $data->nilai_tes_mtk }}</td>
                                <td class="cell">{{ $data->nilai_tes_ipa }}</td>
                                <td class="cell">{{ $data->nilai_tes_agama }}</td>
                                <td class="cell">{{ $data->nilai_tes_bindo }}</td>
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
                    </div> <!--//table-responsive-->
                  </div> <!--//app-card-body-->
                </div>

              </div>
            </div>
        </div>
    </div>
</div>
@endsection

