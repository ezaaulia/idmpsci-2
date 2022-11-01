<div class="tab-content" id="orders-table-tab-content">
              
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
      <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                      <div class="table-responsive-lg">
                        <table class="table table-bordered mb-0 text-left ">
                            <thead>
                              <tr>
                                <th class="cell">No.</th>
                                <th class="cell">NIS</th>
                                <th class="cell col-2">Nama Siswa</th>
                                <th class="cell">Asal Sekolah</th>
                                {{-- <th class="cell">Nilai Tes MTK</th>
                                <th class="cell">Nilai Tes IPA</th>
                                <th class="cell">Nilai Tes Agama</th>
                                <th class="cell">Nilai Tes B.I</th>
                                <th class="cell">Status Kelas</th> --}}
                              </tr>
                            </thead>
                            
  
                            <tbody>
                            @php
                                $no=1;
                            @endphp
                              @foreach($datas as $data)
                                <tr>
                                    <td class="cell">{{ $no++ }}.</td>
                                    <td class="cell">{{ $data->nis }}</td>
                                    <td class="cell">{{ $data->nama }}</td>
                                    <td class="cell">{{ $data->asal }}</td>
                                    {{-- <td class="cell">{{ $data->nilai_tes_mtk }}</td>
                                    <td class="cell">{{ $data->nilai_tes_ipa }}</td>
                                    <td class="cell">{{ $data->nilai_tes_agama }}</td>
                                    <td class="cell">{{ $data->nilai_tes_bindo }}</td>
                                    <td class="cell">{{ $data->status_kelas }}</td> --}}
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                       
                      </div>
                      <!--//table-responsive-->
                    </div>
                </div>
    </div>
</div>

