@extends('layout.main')

@section('isi')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">	    
            <h1 class="app-page-title">Cari Siswa</h1>
            
            <hr class="mb-4"> {{-- garis panjang --}}
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-start align-items-center">
                            <div class="col-lg-8">
                                <div class="app-search-box col-md-8">
                                    <form action="{{ url('carisiswa') }}" class="app-search-form">
                                      <input type="text" placeholder="Cari Siswa" name="search" class="form-control search-input" />
                                        <button type="submit" class="btn search-btn btn-primary" value="search">
                                            <i class="fas fa-search">
                                        </i></button>
                                    </form>
                                </div>
                                {{-- <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-lg-8">
                                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Cari" />
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Cari</button>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
                
        </div>
    </div>
</div>

@endsection

