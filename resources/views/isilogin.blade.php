@extends('layout.login')

@section('isi')

<div class="row g-0 app-auth-wrapper"> {{-- untuk bagi dua tampilan antara login dan gambar --}}
    
    {{-- BACKGROUND --}}
    
    <div class="col-12 col-md-5 col-lg-7 h-100 auth-background-col"> {{--  ini biar background di samping dan dibagi rata --}}
        <div class="auth-background-holder"> {{-- ini untuk munculkan background --}}
        </div>
        <div class="auth-background-mask"></div>
        <div class="auth-background-overlay p-3 p-lg-5">
          <div class="d-flex flex-column align-content-end h-100">
            <div class="h-100"></div>
            <div class="overlay-content p-3 p-lg-4 rounded">
              <h5 class="mb-3 overlay-title">Selamat Datang</h5>
              <div>
                Sistem Pemilihan Siswa Siswa Kelas Cerdas Istimewa
              </div>
            </div>
          </div>
        </div>
        
    </div><!--//auth-background-col-->
    
    {{-- LOGIN --}}
    <div class="col-12 col-md-7 col-lg-5 auth-main-col text-center p-5"> {{-- biar gambar naik sejajar dengan tampilan login dan tidak di bawah, ukurn gmbr udh sesuai --}}
        <div class="d-flex flex-column align-content-"> {{-- gambar dibawah tampilan login --}}
            <div class="app-auth-body mx-auto">                
                <br>
                <br>


                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session ('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session ('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                        <div class="card border-primary mb-3 shadow-sm p-4">
                            <div class="app-card-body">	
                                <div class="app-auth-branding mb-4 "><a class="app-logo" href="#"><img class="logo-icon me-2" src="assets/images/smp.png" alt="logo" ></a></div>
                                <h2 class="auth-heading text-center mb-5 ">LOGIN</h2>
                                <div class="auth-form-container text-start">
                                    {{-- <form method="POST" action="{{ route('login') }}">
                                        @csrf --}}
                                    <form class="auth-form login-form" action="/login" method="POST">
                                        @csrf         
                                        <div class="email mb-3">
                                            <label class="sr-only" for="email">Email</label>
                                            <input id="email" name="email" type="email" class="form-control @error('email')  is-invalid @enderror" placeholder="Email " required="required" autofocus value="{{ old('email') }}">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div><!--//form-group-->
                                        <div class="password mb-3">
                                            <label class="sr-only" for="password">Password</label>
                                            <input id="password" name="password" type="password" class="form-control " placeholder="Password" required="required">
                                        </div><!--//form-group-->

                                        <div class="text-center">
                                            <button type="submit" class="btn app-btn-primary  theme-btn mx-auto">Login</button>
                                        </div>
                                    </form>
                                </div><!--//auth-form-container-->
                            </div>
                        </div>	
                        <div class="auth-option text-center pt-2">Belum punya akun? Daftar <a class="text-link" href="/registrasi">disini</a>.</div>
            </div><!--//auth-body-->
        </div><!--//flex-column-->   
    </div><!--//auth-main-col-->
    
    
    

</div><!--//row-->

@endsection