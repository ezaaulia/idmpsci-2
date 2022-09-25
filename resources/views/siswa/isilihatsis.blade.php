@extends('layout.main')

@section('isi')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">	    
            <h1 class="app-page-title">Lihat Siswa</h1>
            
            <hr class="mb-4"> {{-- garis panjang --}}

            @if (session('pesan'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session ('pesan') }}
              <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Pesan"></button>
              </div>
            @endif

            

            <div class="tab-content" id="orders-table-tab-content">
              
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                  <div class="app-card app-card-orders-table shadow-sm mb-5">
                    
                    <div class="app-card-body">
                      <div class="table-responsive-lg">
                        <table class="table app-table-hover mb-0 text-left ">
                          <thead>
                            <tr>
                              <th class="cell">No.</th>
                              <th class="cell">NIS</th>
                              <th class="cell col-2">Nama Siswa</th>
                              <th class="cell">Asal Sekolah</th>
                              {{-- <th class="cell">Nilai Tes MTK</th>
                              <th class="cell">Nilai Tes IPA</th>
                              <th class="cell">Nilai Tes Agama</th>
                              <th class="cell">Nilai Tes B.I</th>
                              <th class="cell">Ket</th> --}}
                              <th class="cell">Input Nilai</th>
                              <th class="cell">Aksi</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($siswa as $datas)
                              <tr>
                                  <td class="cell">{{ $loop->iteration }}.</td>
                                  <td class="cell">{{ $datas->nis }}</td>
                                  <td class="cell">{{ $datas->nama }}</td>
                                  <td class="cell">{{ $datas->asal }}</td>
                                  {{-- <td class="cell">{{ $datas->nilai_tes->nilai_tes_mtk }}</td>
                                  <td class="cell">{{ $datas->nilai_tes->nilai_tes_ipa }}</td>
                                  <td class="cell">{{ $datas->nilai_tes->nilai_tes_agama }}</td>
                                  <td class="cell">{{ $datas->nilai_tes->nilai_tes_bindo }}</td>
                                  <td class="cell">{{ $datas->status_kelas }}</td>  --}}
                                  
                                  <td class="cell"> 
                                    <div class="app-card-footer mt-auto">
                                      <a class="btn app-btn-secondary" href="tambahnilai">Tambah Nilai</a>
                                    </div>
                                  </td>
                                  
                                  <td class="cell">  
                                    <a href="/lihatsiswa/detailsiswa/{{ $datas->id }}" class="btn btn-sm btn-primary ">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                        <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                                      </svg>
                                    </a>
                                    
                                    <a href="/lihatsiswa/editsiswa/{{ $datas->id }}" class="btn btn-sm btn-warning" >
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    </a>

                                    <form action="/lihatsiswa/deletesiswa/{{ $datas->id }}" method="post" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button class="btn btn-sm btn-danger border-0" onclick="return confirm ('Anda yakin ingin menghapus data?')"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                          <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 
                                          0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                        </svg>
                                      </button>
                                    </form>
                                  </td>
                              </tr>
                              @endforeach

                          </tbody>
                        </table>

                    {{-- @foreach ($siswa as $datas)
                        <div class="modal modal-danger fade" id="delete{{ $datas->id }}">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">{{ $datas->nama }}</h4>
                              </div>
                              <div class="modal-body">
                                <p>Anda yakin ingin menghapus data?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                                <a href="/lihatsiswa/deletesiswa/{{ $datas->id }}" class="btn btn-outline">Yakin</a>
                              </div>
                            </div> {{-- modal-content --}}
                          {{-- </div> {{-- modal-dialog --}}
                        {{-- </div> --}}
                    {{-- @endforeach --}}


                      </div>
                      <!--//table-responsive-->
                    </div>
                    <!--//app-card-body-->
                  </div>

                  <!--//app-card-->
                  <nav class="app-pagination">
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <a class="page-link" href="#">Selanjutnya</a>
                      </li>
                    </ul>
                  </nav>
                  <!--//app-pagination-->
                </div>
                <!--//tab-pane-->
              </div>
                
        </div>
    </div>
</div>



@endsection

