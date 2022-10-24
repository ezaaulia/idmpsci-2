@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Import Data Siswa</h1>

            
            
            <hr class="mb-4"> {{-- garis panjang --}}
            
            <div class="row justify-content-center align-items-center">
                <div class="row justify-content-start">
                  <div class="col-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Upload File
                    </button>
                  </div>
                </div>
            </div>

  
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form enctype="multipart/form-data" method="post" action="{{ url('importdata')}}"  >
                            @csrf
                            <div class="modal-body">
                                    <div class="form-group">
                                        <input type="file" name="file" class="form-control" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection

