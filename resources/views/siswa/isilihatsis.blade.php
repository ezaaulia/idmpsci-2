@extends('layout.main')

@section('isi')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">	    
            <h1 class="app-page-title">Lihat Siswa</h1>

            <hr class="mb-4"> {{-- garis panjang --}}

            <div class="row justify-content-end mb-3">
              <div class="app-search-box col">
                <form action="{{ url('lihatsiswa')}}" class="app-search-form col-5">
                  <input type="text" placeholder="Cari Siswa" name="search" class="form-control search-input" value="{{ request('search') }}"/>
                  <button type="submit" class="btn search-btn btn-primary" value="search">
                    <i class="fas fa-search">
                    </i></button>
                  </form>
                </div>
              <div class="col-auto">
                <a type="button" class="btn btn-info" href="{{ url('downloadpdf')}}">Unduh Data</a>
                <a type="submit" class="btn app-btn-primary" href="{{ url('tambahsiswa')}}">Tambah Siswa</a>
              </div>
            </div>

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
                              {{-- <th class="cell">Input Nilai</th> --}}
                              <th class="cell">Aksi</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($lhtsiswa as $key=>$datas)
                              <tr>
                                  <td class="cell">{{ $lhtsiswa->firstItem() + $key }}.</td>
                                  <td class="cell">{{ $datas->nis }}</td>
                                  <td class="cell">{{ $datas->nama }}</td>
                                  <td class="cell">{{ $datas->asal }}</td>
                                  
                                  {{-- <td class="cell"> 
                                    <div class="app-card-footer mt-auto"> --}}
                                      {{-- <button type="button" id="Btn" onclick="myFunction()"  >Klik</button> --}}
                                      {{-- <a class="btn app-btn-secondary" href="{{ url('tambahnilai/'.$datas->id) }}">Tambah Nilai</a>
                                    </div>
                                  </td>
                                   --}}
                                  <td class="cell">  
                                    <a href="{{ url('lihatsiswa/detailsiswa/'.$datas->id) }}" class="btn btn-sm btn-primary ">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                        <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                                      </svg>
                                    </a>
                                    
                                    <a href="{{ url('lihatsiswa/editsiswa/'.$datas->id) }}" class="btn btn-sm btn-warning" >
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    </a>

                                    <form action="{{ url('lihatsiswa/deletesiswa/'.$datas->id) }}" method="post" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button class="btn btn-sm btn-danger border-0" onclick="return confirm ('Anda yakin ingin menghapus data?')"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
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
                       
                      </div>
                      <!--//table-responsive-->
                    </div>
                    <!--//app-card-body-->
                  </div>

                  
                  <nav class="app-pagination">
                    <ul class="pagination justify-content-center">
                      {{ $lhtsiswa->links() }}
                    </ul>
                  </nav>
                </div>
                <!--//tab-pane-->
              </div>
                
        </div>
    </div>
</div>



@endsection

