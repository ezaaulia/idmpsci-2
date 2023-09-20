@extends('layout.main')

@section('isi')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">	    
            <h1 class="app-page-title">Hasil Mining Siswa</h1>

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
                              {{-- <th class="cell">NIS</th>
                              <th class="cell">Nama Siswa</th>
                              <th class="cell">Asal Sekolah</th> --}}
                              <th class="cell">Kelas Asli</th>
                              <th class="cell">Kelas Mining</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($data as $datas)
                              <tr>
                                  <td class="cell">{{ $loop->iteration }}.</td>
                                  {{-- <td class="cell">{{ $datas->nis }}</td> --}}
                                  <td class="cell">{{ $datas->nama }}</td>
                                  {{-- <td class="cell">{{ $datas->asal }}</td> --}}
                                  <td class="cell">{{ $datas->status_kelas }}</td>
                                  <td class="cell">{{ $datas->hasilmd }}</td>
                              </tr>
                              @endforeach

                          </tbody>
                        </table>
                       
                      </div>
                      <!--//table-responsive-->
                    </div>
                    <!--//app-card-body-->
                  </div>

                  
                  {{-- <nav class="app-pagination">
                    <ul class="pagination justify-content-center">
                      {{ $lhtsiswa->links() }}
                    </ul>
                  </nav> --}}
                </div>
                <!--//tab-pane-->
              </div>
                
        </div>
    </div>
</div>



@endsection

