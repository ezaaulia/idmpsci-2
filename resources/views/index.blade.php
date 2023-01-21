@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Edit Profil</h1>
            
            <hr class="mb-4"> {{-- garis panjang --}}
            <ul>
                <li>Attribute: {{ $tree['attribute'] }}</li>
                    <ul>
                        @foreach($tree['children'] as $value => $child)
                        <li>value: {{ $value }}</li>
                        <ul>
                            {{-- menampilkan node child secara rekursif --}}
                        </ul>
                        @endforeach
                   </ul>
            </ul>
        </div>
    </div>
@endsection