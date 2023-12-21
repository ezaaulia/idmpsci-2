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
        
    


                        {{-- <div class="card border-primary mb-3 shadow-sm p-4">
                            <div class="app-card-body">	
                                <div class="app-auth-branding mb-4 "><a class="app-logo" href="#"><img class="logo-icon me-2" src="assets/images/smp.png" alt="logo" ></a></div>
                                <h2 class="auth-heading text-center mb-5 ">LOGIN</h2>
                                <div class="auth-form-container text-start">
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form class="auth-form login-form" action="/login" method="POST">
                                        @csrf         
                                        <div class="email mb-3">
                                            <label class="sr-only" for="email">Email</label>
                                            <input id="email" name="email" type="email" class="form-control" placeholder="Email " autofocus value="{{ old('email') }}">
                                        </div><!--//form-group-->
                                        <div class="password mb-3">
                                            <label class="sr-only" for="password">Password</label>
                                            <input id="password" name="password" type="password" class="form-control " placeholder="Password">
                                        </div><!--//form-group-->

                                        <div class="text-center">
                                            <button type="submit" class="btn app-btn-primary  theme-btn mx-auto">Login</button>
                                        </div>
                                    </form>
                                </div><!--//auth-form-container-->
                            </div>
                        </div>	
                        <div class="auth-option text-center pt-2">Belum punya akun? Daftar <a class="text-link" href="/registrasi">disini</a>.</div> --}}


    

</div><!--//row-->

@endsection