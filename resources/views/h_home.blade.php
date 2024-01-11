@extends('layout.login')

@section('isi')

<div class="row g-0 app-auth-wrapper"> {{-- untuk bagi dua tampilan antara login dan gambar --}}
    
    {{-- BACKGROUND --}}
    
    
        <div class="auth-background-holder"> {{-- ini untuk munculkan background --}}</div>
        
        <div class="auth-background-overlay p-lg-5">
          <div class="d-flex flex-column align-content-center">

            <div class="h-100"></div>

            
            <div class="overlay-content p-3 p-lg-4 rounded">
                <h1 class="fs-1 overlay-title text-center mb-5">Selamat Datang</h1>
                <div class="text-center fs-3 mb-5">
                    Sistem Pemilihan Siswa Kelas Cerdas Istimewa
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <div class="container overflow-hidden ">
                    <div class="row justify-content-center gx-5 ">
                      <div class="col-auto ">
                       <a type="button" class="rounded text-center btn app-btn-primary p-3 border bg-light" href="{{ url('login')}}">Login</a>
                      </div>
                      <div class="col-auto">
                        <a type="button" class="rounded text-center btn app-btn-primary p-3 border bg-light" href="{{ url('register')}}">Registrasi</a>
                      </div>
                    </div>
                </div>

          </div>
        </div>
        
    
</div><!--//row-->

@endsection