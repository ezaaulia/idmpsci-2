@extends('layout.login')

@section('isi')

<div class=" app-auth-wrapper"> {{-- untuk bagi dua tampilan antara login dan gambar --}}
    

    
    {{-- REGISTRASI --}}
    <div class="auth-main-col text-center p-4"> {{-- biar gambar naik sejajar dengan tampilan login dan tidak di bawah, ukurn gmbr udh sesuai --}}
        <div class="d-flex flex-column align-content-"> {{-- gambar dibawah tampilan login --}}
            <div class="app-auth-body mx-auto">
                <div class="card border-primary mb-2 shadow-sm p-3">
                    <div class="app-card-body">	
                        <div class="app-auth-branding mb-1 "><a class="app-logo" href="#"><img class="logo-icon me-2" src="{{asset('assets/images/smp.png')}}" alt="logo" ></a></div>
                            <h3 class="auth-heading text-center mb-3 ">REGISTRASI</h3>

                        <div class="auth-form-container text-start"> 
                            <form class="auth-form signup-form" action={{ route('register') }} method="POST">
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

                                <div class="password mb-1">
                                    <label class="sr-only" for="password">Password</label>
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="required" value="{{ old('password') }}">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div><!--//form-group-->

                                <div class="form-group mb-3 {{ $errors->has('role') ? 'has-error' : null }}">
                                    <label class="sr-only col-md-4 col-form-label text-md-right" for="role">Role</label>
                                    <div class="col-md">
                                        <select class="form-select fw-light" name="role" id="">
                                            <option hidden selected> --- Pilih Role ---</option>
                                            <option value="admin">Admin</option>
                                            <option value="operator">Operator</option>
                                          </select>
                                    </div>
                                    @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div><!--//form-group-->

                                <div class="text-center">
                                    <button type="submit" neme="proses" class="btn app-btn-primary  theme-btn mx-auto">Daftar</button>
                                </div>
                            </form>
                        </div><!--//auth-form-container-->
                    </div>
                </div>	
                
                <div class="auth-option text-center pt-2">Sudah registrasi? Login <a class="text-link" href="/login">disini</a>.</div>
            </div>
        </div><!--//flex-column-->   
    </div><!--//auth-main-col-->
    
    
    

</div><!--//row-->

@endsection