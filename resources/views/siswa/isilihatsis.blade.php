@extends('layout.main')

@section('isi')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">	    
            <h1 class="app-page-title">Beranda</h1>

            <div class="search-mobile-trigger d-sm-none col">
                <i class="search-mobile-trigger-icon fas fa-search"></i>
            </div>

            <div class="app-search-box col">
                <form class="app-search-form">
                <input type="text" placeholder="Search..." name="search" class="form-control search-input" />
                <button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- <div class="row">
    <div class="col md-6">
        <form class="action">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
              </div>
        </form>
    </div>
</div> --}}

@endsection

