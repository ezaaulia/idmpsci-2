@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Lihat Profil</h1>
            
            <hr class="mb-4"> {{-- garis panjang --}}
            
            @if (session('pesan'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session ('pesan') }}
              <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Pesan"></button>
              </div>
            @endif

            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header border-bottom-0">
                    <div class="row align-items-center gx-3">
                    </div><!--//row-->
                </div><!--//app-card-header-->
                
                @foreach ($profil as $user)
                <div class="app-card-body px-4 w-100"> 
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Nama</strong></div>
                                <div class="item-data">{{ $user->nama }}</div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->

                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Email</strong></div>
                                <div class="item-data">{{ $user->email }}</div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->

                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Username</strong></div>
                                <div class="item-data">{{ $user->username }}</div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->

                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Alamat</strong></div>
                                <div class="item-data">{{ $user->alamat }}</div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->

                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>No. HP</strong></div>
                                <div class="item-data">{{ $user->no_hp }}</div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->
                @endforeach

                    <div class="item border-bottom py-3">
                        <div class="row justify-content-center align-items-center">
                          <div class="row justify-content-end">
                            <div class="col-auto">
                                <a type="submit" class="btn btn-warning" href="/editprofil">Edit</a>
                            </div>
                          </div>
                        </div>
                    </div>

                </div><!--//app-card-body-->

               
            </div><!--//app-card-->
        </div>
    </div>
</div>

@endsection