@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Lihat Data Operator</h1>
                </div>
            </div><!--//row-->
            
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">No</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">Nama</th>
                                            <th class="cell">Username</th>
                                            <th class="cell">Alamat</th>
                                            <th class="cell">No.HP</th>
                                            <th class="cell">Role</th>
                                            <th class="cell">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                            @forelse($opere as $data)
                                              <tr>
                                                  <td>{{ $loop->iteration }}</td>
                                                  <td class="cell">{{ $data->nama }}</td>
                                                  <td class="cell">{{ $data->email }}</td>
                                                  <td class="cell">{{ $data->username }}</td>
                                                  <td class="cell">{{ $data->alamat }}</td>
                                                  <td class="cell">{{ $data->no_hp }}</td>
                                                  <td class="cell">{{ $data->role }}</td>
                
                                                <td class="cell">  

                                                    <!-- Form hapus siswa -->
                                                    <form action="{{ url('lihatoperator/deleteoperator/'.$data->id) }}" method="post" class="d-inline">
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
                                            @empty
                                              <!-- Pesan ketika data kosong -->
                                              <tr>
                                                <td colspan="6" class="text-center">
                                                    <h2><strong>Data kosong!!</strong></h2>
                                                </td>
                                              </tr>
                                            @endforelse
                
                                          </tbody>
                                        
                                        
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->
                </div><!--//tab-pane-->
            </div><!--//tab-content-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->

@endsection

