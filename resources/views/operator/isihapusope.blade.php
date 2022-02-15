@extends('layout.main')

@section('isi')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Hapus Data Operator</h1>
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
                                        <tr>
                                            <td class="cell">#15346</td>
                                            <td class="cell"><span class="truncate">Lorem ipsum dolor sit amet eget volutpat erat</span></td>
                                            <td class="cell">John Sanders</td>
                                            <td class="cell"><span>17 Oct</span><span class="note">2:16 PM</span></td>
                                            <td class="cell"><span class="badge bg-success">Paid</span></td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                        <tr>
                                            <td class="cell">#15345</td>
                                            <td class="cell"><span class="truncate">Consectetur adipiscing elit</span></td>
                                            <td class="cell">Dylan Ambrose</td>
                                            <td class="cell"><span class="cell-data">16 Oct</span><span class="note">03:16 AM</span></td>
                                            <td class="cell"><span class="badge bg-warning">Pending</span></td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                        <tr>
                                            <td class="cell">#15344</td>
                                            <td class="cell"><span class="truncate">Pellentesque diam imperdiet</span></td>
                                            <td class="cell">Teresa Holland</td>
                                            <td class="cell"><span class="cell-data">16 Oct</span><span class="note">01:16 AM</span></td>
                                            <td class="cell"><span class="badge bg-success">Paid</span></td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="cell">#15343</td>
                                            <td class="cell"><span class="truncate">Vestibulum a accumsan lectus sed mollis ipsum</span></td>
                                            <td class="cell">Jayden Massey</td>
                                            <td class="cell"><span class="cell-data">15 Oct</span><span class="note">8:07 PM</span></td>
                                            <td class="cell"><span class="badge bg-success">Paid</span></td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="cell">#15342</td>
                                            <td class="cell"><span class="truncate">Justo feugiat neque</span></td>
                                            <td class="cell">Reina Brooks</td>
                                            <td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23 PM</span></td>
                                            <td class="cell"><span class="badge bg-danger">Cancelled</span></td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="cell">#15341</td>
                                            <td class="cell"><span class="truncate">Morbi vulputate lacinia neque et sollicitudin</span></td>
                                            <td class="cell">Raymond Atkins</td>
                                            <td class="cell"><span class="cell-data">11 Oct</span><span class="note">11:18 AM</span></td>
                                            <td class="cell"><span class="badge bg-success">Paid</span></td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
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

