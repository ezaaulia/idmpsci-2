@extends('layout.main')

@section('isi')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">	    
            <h1 class="app-page-title">Lihat Nilai</h1>

            <hr class="mb-4"> {{-- garis panjang --}}

            <div class="row justify-content-end mb-3">
              <div class="app-search-box col">
                <form action="{{ url('lihatnilai')}}" class="app-search-form col-5">
                  <input type="text" placeholder="Cari Siswa" name="search" class="form-control search-input" value="{{ request('search') }}"/>
                  <button type="submit" class="btn search-btn btn-primary" value="search">
                    <i class="fas fa-search">
                    </i></button>
                  </form>
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
                              <th class="cell">Nama Siswa</th>
                              <th class="cell">Nilai MTK</th>
                              <th class="cell">Nilai IPA</th>
                              <th class="cell">Nilai Agama</th>
                              <th class="cell">Nilai B.I</th>
                              <th class="cell">Status Kelas</th>
                              <th class="cell">Aksi</th>
                            </tr>
                          </thead>

                          <tbody>
                            @forelse($lhtnilai as $key=>$nilai)
                              <tr>
                                  <td class="cell">{{ $lhtnilai->firstItem() + $key }}.</td>
                                  <td class="cell">{{ $nilai->nama }}</td>
                                  <td class="cell">{{ $nilai->nilai_tes_mtk }}</td>
                                  <td class="cell">{{ $nilai->nilai_tes_ipa }}</td>
                                  <td class="cell">{{ $nilai->nilai_tes_agama }}</td>
                                  <td class="cell">{{ $nilai->nilai_tes_bindo }}</td>
                                  <td class="cell">{{ $nilai->kelas }}</td>

                                  <td class="cell">  

                                    <a href="{{ url('lihatnilai/edit/'.$nilai->id) }}" class="btn btn-sm btn-warning" >
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    </a>

                                  </td>
                              </tr>
                              @empty
                                <tr>
                                  {{-- Pesan jika data kosong --}}
                                  <td colspan="8" class="text-center">
                                      <h2><strong>Data kosong!!</strong></h2>
                                  </td>
                                </tr>
                              @endforelse

                          </tbody>
                        </table>
                       
                      </div>
                      <!--//table-responsive-->
                    </div>
                    <!--//app-card-body-->
                  </div>

                  
                  <nav class="app-pagination">
                    <ul class="pagination justify-content-center">
                      {{ $lhtnilai->links() }}
                    </ul>
                  </nav>
                </div>
                <!--//tab-pane-->
              </div>
                
        </div>
    </div>
</div>



@endsection

