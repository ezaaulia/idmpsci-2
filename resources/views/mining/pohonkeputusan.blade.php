@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Pohon Keputusan</h1>
            
            <hr class="mb-4"> {{-- garis panjang --}}

            <div class="tab-content" id="orders-table-tab-content">
              
              <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                  
                  
                  <div class="app-card-body">
                    <div class="table-responsive-lg">
                        
                      <style>
                          pre {
                              white-space: pre-wrap;
                              font-family: Arial, sans-serif;
                          }
                      </style>


                      @if (isset($error))
                          <div class="alert alert-danger" role="alert">
                              {{ $error }}
                          </div>
                      @elseif (empty($stringTree))
                          <div class="alert alert-danger text-center" role="alert">
                              Data Kosong!!
                              <br>
                              Tidak ada data yang dapat ditampilkan. 
                              <br>
                              Silahkan Upload Data Latih terlebih dahulu.
                          </div>
                      @else
                          <pre>{{ $stringTree }}</pre>
                      @endif
                      
                           
                    </div> <!--//table-responsive-->
                  </div> <!--//app-card-body-->
                </div>

              </div>
            </div>
        </div>
    </div>
</div>
@endsection

