        <div class="container-fluid py-2">  {{-- biar tidak nempel k atas headernya --}}
            <div class="app-header-content"> 
                <div class="row justify-content-between align-items-center"> {{-- untuk semua menu di header letaknya sejajar --}}
                
                {{-- Ini untuk icon menu ketika web tampilannya menjadi lebih kecil --}}
                <div class="col-auto">
                    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
                    </a>
                </div>

                
                <div class="app-utilities col-auto">
                        <a class="btn btn-outline-success" href="lihatprofil/" role="button">{{ auth()->user()->nama }}</a>
                </div><!--//app-utilities-->
            </div><!--//row-->
            </div><!--//app-header-content-->
        </div><!--//container-fluid-->

        {{-- <h3 class="mb-3">Selamat Datang  {{ auth()->user()->nama }}</h3> --}}