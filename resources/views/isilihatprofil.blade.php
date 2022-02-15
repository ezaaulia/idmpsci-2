@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Lihat Profil</h1>
            <picture>
                <source srcset="assets/images/users/user-9.jpg" type="image/svg+xml">
                <img src="assets/images/users/user-9.jpg" class="img-fluid img-thumbnail" alt="...">
            </picture>
            
            <hr class="mb-4"> {{-- garis panjang --}}
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header border-bottom-0">
                    <div class="row align-items-center gx-3">
                        
                    </div><!--//row-->
                </div><!--//app-card-header-->
                
                <div class="app-card-body px-4 w-100"> 
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Nama</strong></div>
                                <div class="item-data">Eza</div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Alamat</strong></div>
                                <div class="item-data">Kota Baru</div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>No. HP</strong></div>
                                <div class="item-data">0878xxxxxxxx</div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Email</strong></div>
                                <div class="item-data">Eza@gmail.com</div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->
                </div><!--//app-card-body-->

               
            </div><!--//app-card-->
        </div>
    </div>
</div>

@endsection