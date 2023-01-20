@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">			    
            <h1 class="app-page-title">Mining Data</h1>

            
            <hr class="mb-4"> {{-- garis panjang --}}
            {{-- <ul>
                 <li>Attribute: {{ $tree['attribute'] }}</li>
                     <ul>
                         @foreach($tree['children'] as $value => $child)
                         <li>value: {{ $value }}</li>
                         <ul> --}}
                             {{-- menampilkan node child secara rekursif --}}
                         {{-- </ul>
                         @endforeach
                    </ul>
             </ul> --}}
             
            <div class="tab-content" id="orders-table-tab-content">

                <p><small> Jumlah Data : </small></p>
                <p><small> Jumlah Lulus CI : </small></p>
                <p><small> Jumlah Reguler : </small></p>
                <p><small> Entropy : </small></p>


                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                  <div class="app-card app-card-orders-table shadow-sm mb-5">

                                        
                    <div class="app-card-body">
                      <div class="table-responsive-lg">
                        <table class="table table-bordered mb-0 text-left ">
                          <thead>
                            <tr>
                              <th class="cell">No.</th>
                              <th class="cell">Atribut</th>
                              <th class="cell">Nilai Atribut</th>
                              <th class="cell">Jumlah Total</th>
                              <th class="cell">Lulus CI</th>
                              <th class="cell">Lulus Reguler</th>
                              <th class="cell">Nilai Entropy</th>
                              <th class="cell">Nilai Gain</th>
                              {{-- <th class="cell">Status Kelas</th> --}}
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($data as $datam)
                              <tr>
                                  <td class="cell">{{ $loop->iteration }}.</td>
                                  <td class="cell">{{ $datam->nis }}</td>
                                  <td class="cell">{{ $datam->nama }}</td>
                                  <td class="cell">{{ $datam->asal }}</td>
                                  <td class="cell">{{ $datam->nilai_tes_mtk }}</td>
                                  <td class="cell">{{ $datam->nilai_tes_ipa }}</td>
                                  <td class="cell">{{ $datam->nilai_tes_agama }}</td>
                                  <td class="cell">{{ $datam->nilai_tes_bindo }}</td>
                                  {{-- <td class="cell">{{ $data->status_kelas }}</td> --}}
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div> <!--//table-responsive-->
                    </div> <!--//app-card-body-->
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection