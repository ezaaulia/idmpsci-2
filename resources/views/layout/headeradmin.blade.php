        <div class="container-fluid py-2">  {{-- biar tidak nempel k atas headernya --}}
            <div class="app-header-content"> 
                <div class="row justify-content-between align-items-center"> {{-- untuk semua menu di header letaknya sejajar --}}


                {{-- Ini untuk icon menu ketika web tampilannya menjadi lebih kecil --}}
                <div class="col-auto">
                    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
                    </a>
                </div>



                {{-- Dropdown --}}

                <div class="nav justify-content-end dropdown gap-2">
                    <a class="btn btn-success dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      Profil {{ Auth::user()->nama}}
                    </a>
                  
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li>
                        <a class="dropdown-item" href="{{ route('lihatprofil') }}">
                          Lihat Profil
                        </a>
                      </li>

                      <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                          <button type="submit" class="btn btn-default">Logout</button>
                        </form>
                      </li>
                    </ul>
                </div>