@extends('layout.main')

@section('isi')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">	    
            <h1 class="app-page-title">Lihat Siswa</h1>
            
            <hr class="mb-4"> {{-- garis panjang --}}

            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
                {{ session ('success') }}
              <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="success"></button>
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
                              <th class="cell col-2">Nama Siswa</th>
                              <th class="cell">NIS</th>
                              {{-- <th class="cell">Asal Sekolah</th> --}}
                              {{-- <th class="cell">Alamat</th> --}}
                              <th class="cell">Nilai Tes MTK</th>
                              <th class="cell">Nilai Tes IPA</th>
                              <th class="cell">Nilai Tes Agama</th>
                              <th class="cell">Nilai Tes B.I</th>
                              <th class="cell">Ket</th>
                              <th class="cell">Aksi</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($data_siswas as $datas)
                              <tr>
                                  <td class="cell">{{ $loop->iteration }}.</td>
                                  <td class="cell">{{ $datas->nama }}</td>
                                  <td class="cell">{{ $datas->nis }}</td>
                                  <td class="cell">{{ $datas->nilai_tes->nilai_tes_mtk }}
                                  <td class="cell">{{ $datas->nilai_tes->nilai_tes_ipa }}</td>
                                  <td class="cell">{{ $datas->nilai_tes->nilai_tes_agama }}</td>
                                  <td class="cell">{{ $datas->nilai_tes->nilai_tes_bindo }}</td>
                                  <td class="cell">{{ $datas->status_kelas }}</td> 
                                  <td class="cell">
                                    <a href="/inputsiswa/lihatsiswa/detailsiswa/{nis,id}" class="btn btn-sm btn-primary ">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                        <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                                      </svg>
                                    </a>
                                    
                                    <a href="" class="btn btn-sm btn-warning" >
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg></a>
                                    
                                    <a href="" class="btn btn-sm btn-danger" >
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg></a>

                                    {{-- <form action="/inputsiswa/lihatsiswa/" method="post">
                                      @method('delete')
                                      @csrf
                                      <button class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                      </button>
                                    </form> --}}
                                  </td>
                              </tr>
                              @endforeach

                          </tbody>
                        </table>
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

