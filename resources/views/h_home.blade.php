@extends('layout.login')

@section('isi')

<div class="app-auth"> 
  <div class="auth-background-holder"></div> {{-- ini untuk munculkan background --}}
  
  <div class="auth-background-overlay p-5">
    <div class="d-flex flex-column align-content-center justify-content-center min-vh-10">
      
      <div class="overlay-content p-3 p-4 rounded">
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

          <div class="container overflow-hidden">
              <div class="row justify-content-center gx-5">
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
  </div>
            
</div><!--//row-->

@endsection