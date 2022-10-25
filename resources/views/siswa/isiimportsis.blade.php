@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Import Data Siswa</h1>

            
            
            <hr class="mb-4"> {{-- garis panjang --}}

            <div class=" g-4 mb-4">
                  <div class="app-card  h-100 shadow-sm">
                    <div class="app-card-header p-3">
                      <div class="row justify-content-between align-items-center">
                        
                          <div class="row justify-content-center align-items-center"> {{-- ini untuk ngatur posisi button atas bawah --}}
                               <div class="row justify-content-start"> {{--geser button kanan kiri --}}
                                <div class="col-auto">
                                  <button type="button" class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                      Upload File
                                  </button>
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


        </div>
    </div>
</div>

@endsection

