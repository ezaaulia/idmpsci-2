@extends('layout.main')

@section('isi')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">	    
            <h1 class="app-page-title">Beranda</h1>
            
            <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                <div class="inner">
                    <div class="app-card-body p-3 p-lg-4">
                       <h3 class="mb-3">Selamat Datang  {{ auth()->user()->nama }}</h3>
                        <div class="row gx-5 gy-3">
                            <div class="col-12 col-lg-9"> {{-- u/ ngatur jarak antar tulisan --}}
                                <div>Sistem Informasi Pemilihan Siswa Kelas Cerdas Istimewa</div>
                                <div>SMP Muhammadiyah 1 Pontianak</div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-body-->
                </div><!--//inner-->
            </div><!--//app-card-->


        </div>
    </div>     
</div>

@endsection

