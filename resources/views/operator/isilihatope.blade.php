@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Lihat Data Operator</h1>
                </div>
            </div><!--//row-->
            
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">No</th>
                                            <th class="cell">Nama</th>
                                            <th class="cell">Alamat</th>
                                            <th class="cell">No.HP</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($operators as $operator)
                                        <tr>
                                            <td class="cell">{{ $loop->iteration }}</td>
                                            <td class="cell">{{  }}</td>
                                            <td class="cell">John Sanders</td>
                                            <td class="cell"><span>17 Oct</span><span class="note">2:16 PM</span></td>
                                            <td class="cell"><span class="badge bg-success">Paid</span></td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                        @endforeach
                                        
                                        
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->
                </div><!--//tab-pane-->
            </div><!--//tab-content-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->

@endsection

