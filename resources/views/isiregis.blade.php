@extends('layout.login')

@section('isi')

<div class="row g-0 app-auth-wrapper"> {{-- untuk bagi dua tampilan antara login dan gambar --}}
    
    {{-- BACKGROUND --}}
    
    <div class="col-12 col-md-6 col-lg-6 h-100 auth-background-col"> {{--  ini biar background di samping dan dibagi rata --}}
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
    
    {{-- REGISTRASI --}}
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5"> {{-- biar gambar naik sejajar dengan tampilan login dan tidak di bawah, ukurn gmbr udh sesuai --}}
        <div class="d-flex flex-column align-content-"> {{-- gambar dibawah tampilan login --}}
            <div class="card border-primary mb-3 shadow-sm p-3">
                <div class="app-card-body">	
                    <div class="app-auth-branding mb-4 "><a class="app-logo" href="#"><img class="logo-icon me-2" src="assets/images/smp.png" alt="logo" ></a></div>
                        <h2 class="auth-heading text-center mb-3 ">REGISTRASI</h2>

                    <div class="auth-form-container text-start"> 
                        <form class="auth-form signup-form" action="/registrasi" method="POST">
                        @csrf
                            <div class="nama mb-1">
                                <label class="sr-only" for="nama">Nama</label>
                                <input id="nama" name="nama" type="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" required="required" value="{{ old('nama') }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                @enderror
                            </div><!--//form-group-->
                            
                            <div class="email mb-1">
                                <label class="sr-only" for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required="required" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--//form-group-->

                            
                            <div class="username mb-1">
                                <label class="sr-only" for="username">Username</label>
                                <input id="username" name="username" type="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required="required" value="{{ old('username') }}">
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--//form-group-->
                            

                            <div class="alamat mb-1">
                                <label class="sr-only" for="alamat">Alamat</label>
                                <input id="alamat" name="alamat" type="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" required="required" value="{{ old('alamat') }}">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--//form-group-->

                            <div class="no_hp mb-1">
                                <label class="sr-only" for="no_hp">No.Hp</label>
                                <input id="no_hp" name="no_hp" type="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="No.Hp" required="required" value="{{ old('no_hp') }}">
                                @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--//form-group-->

                            <div class="password mb-4">
                                <label class="sr-only" for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="required" value="{{ old('password') }}">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--//form-group-->

                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary  theme-btn mx-auto">Daftar</button>
                            </div>
                        </form>
                    </div><!--//auth-form-container-->
                </div>
            </div>	
            
            <div class="auth-option text-center pt-2">Sudah registrasi? Login <a class="text-link" href="/login">disini</a>.</div>
           
        </div><!--//flex-column-->   
    </div><!--//auth-main-col-->
    
    
    

</div><!--//row-->

@endsection